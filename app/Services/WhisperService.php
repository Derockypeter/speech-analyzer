<?php

namespace App\Services;

use OpenAI;
use Illuminate\Support\Facades\Log;

class WhisperService
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

    public function transcribeAudio($audioFilePath)
    {
        $file = null;
        
        try {
            // Validate file exists
            if (!file_exists($audioFilePath)) {
                throw new \RuntimeException('Audio file not found');
            }

            // Validate file is readable
            if (!is_readable($audioFilePath)) {
                throw new \RuntimeException('Audio file is not readable');
            }

            // Get file size
            $fileSize = filesize($audioFilePath);
            if ($fileSize > 25 * 1024 * 1024) { // 25MB limit for Whisper API
                throw new \RuntimeException('Audio file exceeds maximum size of 25MB');
            }

            $file = fopen($audioFilePath, 'rb');
            if ($file === false) {
                throw new \RuntimeException('Failed to open audio file');
            }

            Log::info('Sending audio file to Whisper API', [
                'file_path' => $audioFilePath,
                'file_size' => $fileSize
            ]);

            $response = $this->client->audio()->transcribe([
                'model' => 'whisper-1',
                'file' => $file,
                'language' => 'en',
                'response_format' => 'text'
            ]);

            if (empty($response->text)) {
                throw new \RuntimeException('Received empty transcription from API');
            }

            Log::info('Successfully transcribed audio', [
                'length' => strlen($response->text)
            ]);

            return $response->text;

        } catch (\OpenAI\Exceptions\ErrorException $e) {
            Log::error('OpenAI API Error', [
                'message' => $e->getMessage(),
                'code' => $e->getCode()
            ]);
            throw new \RuntimeException('OpenAI API Error: ' . $e->getMessage());

        } catch (\OpenAI\Exceptions\TransporterException $e) {
            Log::error('OpenAI Connection Error', [
                'message' => $e->getMessage(),
                'code' => $e->getCode()
            ]);
            throw new \RuntimeException('Failed to connect to OpenAI API. Please check your internet connection.');

        } catch (\Exception $e) {
            Log::error('Transcription Error', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'file' => $audioFilePath
            ]);
            throw new \RuntimeException('Transcription failed: ' . $e->getMessage());

        } finally {
            // Only close if it's a valid resource
            if ($file && is_resource($file)) {
                fclose($file);
            }
        }
    }
}
