<?php

namespace App\Services;

use OpenAI;
use Illuminate\Support\Facades\Log;

class SpeechAnalyzerService
{
    // IELTS-like scoring bands
    public const SCORING_BANDS = [
        9 => ['min' => 95, 'description' => 'Expert'],
        8 => ['min' => 87, 'description' => 'Very Good'],
        7 => ['min' => 80, 'description' => 'Good'],
        6 => ['min' => 73, 'description' => 'Competent'],
        5 => ['min' => 65, 'description' => 'Modest'],
        4 => ['min' => 57, 'description' => 'Limited'],
        3 => ['min' => 50, 'description' => 'Extremely Limited'],
        2 => ['min' => 40, 'description' => 'Intermittent'],
        1 => ['min' => 0,  'description' => 'Non-User']
    ];

    // Pronunciation features to analyze
    public const PHONEME_FEATURES = [
        'vowels' => 0.3,
        'consonants' => 0.3,
        'stress' => 0.2,
        'intonation' => 0.2
    ];

    // Speaking assessment criteria
    public const ASSESSMENT_CRITERIA = [
        'pronunciation' => 0.25,
        'fluency' => 0.25,
        'vocabulary' => 0.25,
        'grammar' => 0.25
    ];

    protected $client;
    protected $textToSpeech;

    public function __construct(TextToSpeechService $textToSpeech)
    {
        $apiKey = config('services.openai.api_key');
        
        if (empty($apiKey)) {
            throw new \RuntimeException('OpenAI API key is not configured');
        }

        $this->client = OpenAI::client($apiKey);
        $this->textToSpeech = $textToSpeech;
    }

    public function calculateScore($transcription)
    {
        try {
            // First, analyze the speech
            $analysis = $this->analyzeTranscription($transcription);
            
            // Then, generate corrected speech with proper stress and intonation
            $correctedAudioUrl = $this->textToSpeech->convertToSpeech(
                $transcription,
                'nova' // Using a natural-sounding voice
            );

            return [
                'ielts_band' => [
                    'band' => $analysis['band'] ?? 0,
                    'description' => $this->getBandDescription($analysis['band'] ?? 0)
                ],
                'breakdown' => [
                    'phoneme_analysis' => [
                        'details' => [
                            'pronunciation' => $analysis['pronunciation_issues'] ?? [],
                            'intonation' => $analysis['intonation_issues'] ?? [],
                            'stress' => $analysis['stress_issues'] ?? [],
                            'phonemes' => $analysis['phoneme_details'] ?? []
                        ]
                    ],
                    'speaking_assessment' => [
                        'details' => [
                            'feedback' => [
                                'fluency' => $analysis['fluency_feedback'] ?? '',
                                'vocabulary' => $analysis['vocabulary_feedback'] ?? '',
                                'grammar' => $analysis['grammar_feedback'] ?? '',
                                'coherence' => $analysis['coherence_feedback'] ?? ''
                            ]
                        ]
                    ]
                ],
                'recommendations' => $analysis['recommendations'] ?? [],
                'corrected_audio' => [
                    'url' => $correctedAudioUrl,
                    'description' => 'Listen to this native pronunciation for reference'
                ]
            ];

        } catch (\Exception $e) {
            Log::error('Speech analysis failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            throw new \RuntimeException('Score calculation failed: ' . $e->getMessage());
        }
    }

    protected function analyzeTranscription($transcription)
    {
        $prompt = $this->buildAnalysisPrompt($transcription);

        $response = $this->client->chat()->create([
            'model' => 'gpt-4',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are an expert IELTS examiner and phonetics specialist. Analyze the speech providing detailed phonetic analysis and feedback.'
                ],
                [
                    'role' => 'user',
                    'content' => $prompt
                ]
            ],
            'temperature' => 0.3
        ]);

        if (empty($response->choices[0]->message->content)) {
            throw new \RuntimeException('Empty response from OpenAI');
        }

        return json_decode($response->choices[0]->message->content, true);
    }

    protected function buildAnalysisPrompt($transcription)
    {
        return <<<EOT
Analyze the following speech transcription, focusing on pronunciation, phonemes, stress, and intonation.
Provide a comprehensive assessment in JSON format.

Speech: "{$transcription}"

Provide your analysis in the following JSON structure:
{
    "band": number (0-9),
    "pronunciation_issues": ["specific pronunciation error 1", "error 2", ...],
    "intonation_issues": ["intonation pattern issue 1", "issue 2", ...],
    "stress_issues": ["word stress error 1", "sentence stress issue 2", ...],
    "phoneme_details": {
        "problematic_sounds": ["specific phoneme 1", "phoneme 2"],
        "suggested_practice": ["practice word 1", "word 2"],
        "ipa_transcription": "IPA transcription of key problematic words"
    },
    "fluency_feedback": "detailed feedback about speech flow and natural delivery",
    "vocabulary_feedback": "detailed feedback about word choice and range",
    "grammar_feedback": "detailed feedback about grammatical accuracy",
    "coherence_feedback": "detailed feedback about organization and connection of ideas",
    "recommendations": [
        "specific improvement suggestion 1",
        "suggestion 2",
        "suggestion 3"
    ]
}

Include specific examples and detailed phonetic analysis where relevant.
EOT;
    }

    protected function getBandDescription($band)
    {
        return match ((int)$band) {
            9 => 'Expert User',
            8 => 'Very Good User',
            7 => 'Good User',
            6 => 'Competent User',
            5 => 'Modest User',
            4 => 'Limited User',
            3 => 'Extremely Limited User',
            2 => 'Intermittent User',
            1 => 'Non User',
            default => 'Not Assessable',
        };
    }
}
