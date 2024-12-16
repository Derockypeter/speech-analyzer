# Speech Analysis with IELTS-like Scoring

<p align="center">
<img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

A Laravel application that provides real-time speech recording, transcription, and detailed IELTS-like analysis with AI-powered feedback and native pronunciation reference.

## Features

- Real-time speech recording
- Speech-to-text transcription using OpenAI Whisper
- IELTS-like scoring and analysis
- Detailed phoneme analysis
- AI-generated native pronunciation reference
- Comprehensive feedback on:
  - Pronunciation
  - Fluency
  - Grammar
  - Vocabulary
  - Coherence
- Dark mode support
- Mobile-responsive design

## Prerequisites

- PHP 8.1 or higher
- Composer
- Node.js & NPM
- OpenAI API key
- Laravel requirements (BCMath, Ctype, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML)

## Installation

1. Clone the repository:
```bash
git clone <repository-url>
cd <project-folder>
```

2. Install PHP dependencies:
```bash
composer install
```
#### Skip this 3. Install and compile frontend assets:

```bash
npm install
npm run build
```

4. Create environment file:
```bash
cp .env.example .env
```

5. Generate application key:
```bash
php artisan key:generate
```

6. Configure your `.env` file:
```env
APP_URL=http://your-domain.com
OPENAI_API_KEY=your-api-key-here
```

7. Create storage symbolic link:
```bash
php artisan storage:link
```

8. Set up storage directories:
```bash
mkdir -p storage/app/public/generated_speech
chmod -R 775 storage/app/public
```

## Usage

1. Start the development server:
```bash
php artisan serve
```

2. Access the application at `http://localhost:8000`

3. Using the Speech Analyzer:
   - Click "Start Recording" to begin
   - Speak into your microphone
   - Click "Stop Recording" when finished
   - Click "Transcribe & Analyze" to process your speech
   - Review your detailed analysis results

## Features in Detail

### Speech Recording
- Maximum recording time: 5 minutes
- Minimum recording time: 30 seconds
- Supported audio format: WebM
- Maximum file size: 50MB

### Analysis Components
1. **IELTS Band Score**
   - Score range: 1-9
   - Detailed band descriptions

2. **Pronunciation Analysis**
   - Phoneme accuracy
   - Stress patterns
   - Intonation
   - IPA transcription

3. **Speaking Assessment**
   - Fluency
   - Vocabulary usage
   - Grammatical accuracy
   - Coherence and cohesion

4. **AI Reference Audio**
   - Native pronunciation
   - Proper stress and intonation
   - Multiple voice options

## Troubleshooting

### Common Issues

1. **403 Error on Audio Files**
   - Check storage permissions
   - Verify symbolic link exists
   - Confirm proper server configuration

2. **Transcription Fails**
   - Verify OpenAI API key
   - Check audio file format
   - Check internet connection

3. **Audio Recording Issues**
   - Allow microphone permissions in browser
   - Check SSL certificate if using HTTPS
   - Verify browser compatibility

## Security

- CSRF protection enabled
- Input validation
- File type restrictions
- Size limitations
- Automatic file cleanup

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Acknowledgments

- OpenAI for Whisper and GPT APIs
- Laravel framework
