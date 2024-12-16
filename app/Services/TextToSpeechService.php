<?php

namespace App\Services;

use OpenAI;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TextToSpeechService
{
    protected $client;

    public function __construct()
    {
        $apiKey = config('services.openai.api_key');
        
        if (empty($apiKey)) {
            throw new \RuntimeException('OpenAI API key is not configured');
        }

        $this->client = OpenAI::client($apiKey);
    }

    public function convertToSpeech($text, $voice = 'alloy')
    {
        try {
            // Get the response as a stream
            $response = $this->client->audio()->speech([
                'model' => 'tts-1',
                'input' => $text,
                'voice' => $voice,
                'response_format' => 'mp3'
            ]);

            // Generate unique filename
            $filename = 'speech_' . uniqid() . '.mp3';
            
            // Store in the public disk directly
            Storage::disk('public')->put('generated_speech/' . $filename, $response);

            // Return the public URL
            return asset('storage/generated_speech/' . $filename);

        } catch (\Exception $e) {
            Log::error('Text to speech conversion failed', [
                'error' => $e->getMessage(),
                'text' => $text
            ]);
            throw new \RuntimeException('Failed to convert text to speech: ' . $e->getMessage());
        }
    }
}