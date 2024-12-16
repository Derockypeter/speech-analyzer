<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WhisperService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\SpeechAnalyzerService;
use Illuminate\Support\Facades\Storage;

class SpeechController extends Controller
{
    protected $whisper;
    protected $speechAnalyzer;

    public function __construct(WhisperService $whisper, SpeechAnalyzerService $speechAnalyzer)
    {
        $this->whisper = $whisper;
        $this->speechAnalyzer = $speechAnalyzer;
    }

    public function transcribe(Request $request)
    {
        try {
            // Validate request first
            $validator = validator($request->all(), [
                'audio' => 'required|mimes:webm,mp3,wav,m4a|max:51200'
            ], [
                'audio.required' => 'No audio file was provided.',
                'audio.mimes' => 'Invalid audio format. Supported formats: WebM, MP3, WAV, M4A.',
                'audio.max' => 'Audio file size must not exceed 50MB.'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => 'Validation failed',
                    'messages' => $validator->errors()
                ], 422); // Use 422 Unprocessable Entity for validation errors
            }

            $audioPath = $request->file('audio')->store('audio', 'public');

            Log::info('Starting transcription for file: ' . $audioPath);

            $transcription = $this->whisper->transcribeAudio(storage_path("app/public/{$audioPath}"));

            // Clean up the file after transcription
            Storage::disk('public')->delete($audioPath);

            if (empty($transcription)) {
                throw new \Exception('Transcription result is empty');
            }

            return response()->json([
                'success' => true,
                'transcription' => $transcription
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error: ' . $e->getMessage());
            return response()->json([
                'error' => 'Validation failed',
                'messages' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            Log::error('Transcription error: ' . $e->getMessage());

            $statusCode = 500;
            $message = 'An error occurred during transcription.';

            // Handle specific error cases
            if (str_contains($e->getMessage(), 'storage')) {
                $statusCode = 500;
                $message = 'File storage error occurred.';
            } elseif (str_contains($e->getMessage(), 'empty')) {
                $statusCode = 422;
                $message = 'Could not generate transcription from the provided audio.';
            }

            return response()->json([
                'error' => $message,
                'debug' => config('app.debug') ? $e->getMessage() : null
            ], $statusCode);
        }
    }

    public function analyze(Request $request)
    {
        try {
            $validator = validator($request->all(), [
                'transcription' => 'required|string|min:1'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => 'Validation failed',
                    'messages' => $validator->errors()
                ], 422);
            }

            $result = $this->speechAnalyzer->calculateScore(
                $request->input('transcription'),
                $request->input('expected_text', '') // Optional, can be empty for free speech
            );

            return response()->json($result);

        } catch (\Exception $e) {
            Log::error('Speech analysis failed', ['error' => $e->getMessage()]);
            
            return response()->json([
                'error' => 'Analysis failed',
                'message' => config('app.debug') ? $e->getMessage() : 'An error occurred during analysis.'
            ], 500);
        }
    }

}
