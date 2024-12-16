<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /* ! tailwindcss v3.4.1 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}:host,html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-feature-settings:normal;font-variation-settings:normal;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.absolute{position:absolute}.relative{position:relative}.-left-20{left:-5rem}.top-0{top:0px}.-bottom-16{bottom:-4rem}.-left-16{left:-4rem}.-mx-3{margin-left:-0.75rem;margin-right:-0.75rem}.mt-4{margin-top:1rem}.mt-6{margin-top:1.5rem}.flex{display:flex}.grid{display:grid}.hidden{display:none}.aspect-video{aspect-ratio:16 / 9}.size-12{width:3rem;height:3rem}.size-5{width:1.25rem;height:1.25rem}.size-6{width:1.5rem;height:1.5rem}.h-12{height:3rem}.h-40{height:10rem}.h-full{height:100%}.min-h-screen{min-height:100vh}.w-full{width:100%}.w-\[calc\(100\%\+8rem\)\]{width:calc(100% + 8rem)}.w-auto{width:auto}.max-w-\[877px\]{max-width:877px}.max-w-2xl{max-width:42rem}.flex-1{flex:1 1 0%}.shrink-0{flex-shrink:0}.grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.flex-col{flex-direction:column}.items-start{align-items:flex-start}.items-center{align-items:center}.items-stretch{align-items:stretch}.justify-end{justify-content:flex-end}.justify-center{justify-content:center}.gap-2{gap:0.5rem}.gap-4{gap:1rem}.gap-6{gap:1.5rem}.self-center{align-self:center}.overflow-hidden{overflow:hidden}.rounded-\[10px\]{border-radius:10px}.rounded-full{border-radius:9999px}.rounded-lg{border-radius:0.5rem}.rounded-md{border-radius:0.375rem}.rounded-sm{border-radius:0.125rem}.bg-\[\#FF2D20\]\/10{background-color:rgb(255 45 32 / 0.1)}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gradient-to-b{background-image:linear-gradient(to bottom, var(--tw-gradient-stops))}.from-transparent{--tw-gradient-from:transparent var(--tw-gradient-from-position);--tw-gradient-to:rgb(0 0 0 / 0) var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-white{--tw-gradient-to:rgb(255 255 255 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #fff var(--tw-gradient-via-position), var(--tw-gradient-to)}.to-white{--tw-gradient-to:#fff var(--tw-gradient-to-position)}.stroke-\[\#FF2D20\]{stroke:#FF2D20}.object-cover{object-fit:cover}.object-top{object-position:top}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.py-10{padding-top:2.5rem;padding-bottom:2.5rem}.px-3{padding-left:0.75rem;padding-right:0.75rem}.py-16{padding-top:4rem;padding-bottom:4rem}.py-2{padding-top:0.5rem;padding-bottom:0.5rem}.pt-3{padding-top:0.75rem}.text-center{text-align:center}.font-sans{font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji}.text-sm{font-size:0.875rem;line-height:1.25rem}.text-sm\/relaxed{font-size:0.875rem;line-height:1.625}.text-xl{font-size:1.25rem;line-height:1.75rem}.font-semibold{font-weight:600}.text-black{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-\[0px_14px_34px_0px_rgba\(0\2c 0\2c 0\2c 0\.08\)\]{--tw-shadow:0px 14px 34px 0px rgba(0,0,0,0.08);--tw-shadow-colored:0px 14px 34px 0px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.ring-transparent{--tw-ring-color:transparent}.ring-white\/\[0\.05\]{--tw-ring-color:rgb(255 255 255 / 0.05)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.06\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.06));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.25\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.25));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.transition{transition-property:color, background-color, border-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.duration-300{transition-duration:300ms}.selection\:bg-\[\#FF2D20\] *::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-\[\#FF2D20\]::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-black:hover{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.hover\:text-black\/70:hover{color:rgb(0 0 0 / 0.7)}.hover\:ring-black\/20:hover{--tw-ring-color:rgb(0 0 0 / 0.2)}.focus\:outline-none:focus{outline:2px solid transparent;outline-offset:2px}.focus-visible\:ring-1:focus-visible{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}@media (min-width: 640px){.sm\:size-16{width:4rem;height:4rem}.sm\:size-6{width:1.5rem;height:1.5rem}.sm\:pt-5{padding-top:1.25rem}}@media (min-width: 768px){.md\:row-span-3{grid-row:span 3 / span 3}}@media (min-width: 1024px){.lg\:col-start-2{grid-column-start:2}.lg\:h-16{height:4rem}.lg\:max-w-7xl{max-width:80rem}.lg\:grid-cols-3{grid-template-columns:repeat(3, minmax(0, 1fr))}.lg\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.lg\:flex-col{flex-direction:column}.lg\:items-end{align-items:flex-end}.lg\:justify-center{justify-content:center}.lg\:gap-8{gap:2rem}.lg\:p-10{padding:2.5rem}.lg\:pb-10{padding-bottom:2.5rem}.lg\:pt-0{padding-top:0px}.lg\:text-\[\#FF2D20\]{--tw-text-opacity:1;color:rgb(255 45 32 / var(--tw-text-opacity))}}@media (prefers-color-scheme: dark){.dark\:block{display:block}.dark\:hidden{display:none}.dark\:bg-black{--tw-bg-opacity:1;background-color:rgb(0 0 0 / var(--tw-bg-opacity))}.dark\:bg-zinc-900{--tw-bg-opacity:1;background-color:rgb(24 24 27 / var(--tw-bg-opacity))}.dark\:via-zinc-900{--tw-gradient-to:rgb(24 24 27 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #18181b var(--tw-gradient-via-position), var(--tw-gradient-to)}.dark\:to-zinc-900{--tw-gradient-to:#18181b var(--tw-gradient-to-position)}.dark\:text-white\/50{color:rgb(255 255 255 / 0.5)}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-white\/70{color:rgb(255 255 255 / 0.7)}.dark\:ring-zinc-800{--tw-ring-opacity:1;--tw-ring-color:rgb(39 39 42 / var(--tw-ring-opacity))}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:hover\:text-white\/70:hover{color:rgb(255 255 255 / 0.7)}.dark\:hover\:text-white\/80:hover{color:rgb(255 255 255 / 0.8)}.dark\:hover\:ring-zinc-700:hover{--tw-ring-opacity:1;--tw-ring-color:rgb(63 63 70 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-white:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 255 255 / var(--tw-ring-opacity))}}
            </style>
        @endif
        <style>
            #results {
                color: #030712;
            }
        </style>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="max-w-4xl mx-auto p-6">
            <!-- Recording Controls -->
            <div class="flex flex-wrap gap-2 mb-4">
                <button id="startRecord" class="bg-[#FF2D20] text-white px-4 py-2 rounded-md hover:bg-red-700 transition-colors">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="6"/>
                        </svg>
                        Start Recording
                    </span>
                </button>
                <button id="stopRecord" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition-colors" disabled>
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <rect x="8" y="8" width="8" height="8"/>
                        </svg>
                        Stop Recording
                    </span>
                </button>
                <button id="transcribe" class="bg-[#FF2D20] text-white px-4 py-2 rounded-md hover:bg-red-700 transition-colors" disabled>
                    <span class="flex items-center">
                        <svg id="transcribeSpinner" class="w-5 h-5 mr-2 animate-spin hidden" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Transcribe & Analyze
                    </span>
                </button>
            </div>

            <!-- Timer and Status -->
            <div class="mb-4">
                <div id="timer" class="text-lg font-semibold">Recording time: 0:00</div>
                <div id="status" class="text-sm text-gray-600 dark:text-gray-400"></div>
            </div>

            <!-- Results Section -->
            <div id="results" class="hidden space-y-6">
                <!-- Transcription Result -->
                <div class="bg-white dark:bg-zinc-800 rounded-lg p-4">
                    <h2 class="text-lg font-semibold mb-2">Transcription</h2>
                    <div id="transcriptionText" class="text-gray-700 dark:text-gray-300"></div>
                </div>

                <!-- Analysis Result -->
                <div class="bg-white dark:bg-zinc-800 rounded-lg p-4">
                    <h2 class="text-lg font-semibold mb-2">Analysis</h2>
                    
                    <!-- IELTS Score -->
                    <div class="mb-4">
                        <div class="text-xl font-bold text-[#FF2D20]">
                            IELTS Band: <span id="ieltsBand"></span>
                        </div>
                        <div id="ieltsDescription" class="text-sm text-gray-600 dark:text-gray-400"></div>
                    </div>

                    <!-- Detailed Scores -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div class="space-y-2">
                            <h3 class="font-semibold">Pronunciation Analysis</h3>
                            <div id="phonemeAnalysis" class="text-sm"></div>
                        </div>
                        <div class="space-y-2">
                            <h3 class="font-semibold">Speaking Assessment</h3>
                            <div id="speakingAssessment" class="text-sm"></div>
                        </div>
                    </div>

                    <!-- Recommendations -->
                    <div class="mt-4">
                        <h3 class="font-semibold">Recommendations</h3>
                        <div id="recommendations" class="text-sm mt-2"></div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            let mediaRecorder;
            let audioChunks = [];
            let timerInterval;
            let startTime;
            const MAX_RECORDING_TIME = 5 * 60 * 1000; // 5 minutes in milliseconds
            const MIN_RECORDING_TIME = 30 * 1000; // 30 seconds in milliseconds

            document.getElementById('startRecord').addEventListener('click', startRecording);
            document.getElementById('stopRecord').addEventListener('click', stopRecording);
            document.getElementById('transcribe').addEventListener('click', transcribe);

            async function startRecording() {
                try {
                    const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
                    mediaRecorder = new MediaRecorder(stream);
                    audioChunks = [];

                    mediaRecorder.ondataavailable = (event) => {
                        audioChunks.push(event.data);
                    };

                    mediaRecorder.start();
                    startTime = Date.now();
                    
                    // Update UI
                    document.getElementById('startRecord').disabled = true;
                    document.getElementById('stopRecord').disabled = false;
                    document.getElementById('transcribe').disabled = true;

                    // Start timer
                    updateTimer();
                    timerInterval = setInterval(updateTimer, 1000);

                    // Auto-stop after MAX_RECORDING_TIME
                    setTimeout(() => {
                        if (mediaRecorder.state === 'recording') {
                            stopRecording();
                        }
                    }, MAX_RECORDING_TIME);

                } catch (err) {
                    console.error('Error accessing microphone:', err);
                    alert('Error accessing microphone. Please ensure you have given permission.');
                }
            }

            function stopRecording() {
                const recordingTime = Date.now() - startTime;
                
                if (recordingTime < MIN_RECORDING_TIME) {
                    alert('Recording must be at least 30 seconds long');
                    return;
                }

                mediaRecorder.stop();
                clearInterval(timerInterval);
                
                // Update UI
                document.getElementById('startRecord').disabled = false;
                document.getElementById('stopRecord').disabled = true;
                document.getElementById('transcribe').disabled = false;
            }

            function updateTimer() {
                const elapsed = Math.floor((Date.now() - startTime) / 1000);
                const minutes = Math.floor(elapsed / 60);
                const seconds = elapsed % 60;
                document.getElementById('timer').textContent = 
                    `Recording time: ${minutes}:${seconds.toString().padStart(2, '0')}`;
            }

            async function transcribe() {
                try {
                    updateStatus('Processing...', 'transcribing');
                    const audioBlob = new Blob(audioChunks, { type: 'audio/webm' });
                    const formData = new FormData();
                    formData.append('audio', audioBlob);

                    // Show spinner
                    document.getElementById('transcribeSpinner').classList.remove('hidden');
                    document.getElementById('transcribe').disabled = true;

                    // First, get transcription
                    const transcriptionResponse = await fetch('api/transcribe', {
                        method: 'POST',
                        body: formData,
                    });

                    if (!transcriptionResponse.ok) {
                        throw new Error(`HTTP error! status: ${transcriptionResponse.status}`);
                    }

                    const transcriptionResult = await transcriptionResponse.json();
                    
                    if (!transcriptionResult.success) {
                        throw new Error(transcriptionResult.error || 'Transcription failed');
                    }

                    // Show results section and display transcription
                    document.getElementById('results').classList.remove('hidden');
                    document.getElementById('transcriptionText').textContent = transcriptionResult.transcription;
                    
                    // Now, analyze the transcription
                    updateStatus('Analyzing speech...');
                    const analysisResponse = await fetch('api/analyze', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            transcription: transcriptionResult.transcription
                        })
                    });

                    if (!analysisResponse.ok) {
                        throw new Error(`HTTP error! status: ${analysisResponse.status}`);
                    }

                    const analysisResult = await analysisResponse.json();
                    
                    // Display analysis results
                    displayAnalysisResults(analysisResult);
                    updateStatus('Analysis complete');

                } catch (error) {
                    console.error('Error:', error);
                    updateStatus(`Error: ${error.message}`, 'error');
                } finally {
                    // Hide spinner and reset UI
                    document.getElementById('transcribeSpinner').classList.add('hidden');
                    document.getElementById('transcribe').disabled = false;
                }
            }

            function displayAnalysisResults(analysis) {
                // Update IELTS band and description
                document.getElementById('ieltsBand').textContent = analysis.ielts_band.band;
                document.getElementById('ieltsDescription').textContent = analysis.ielts_band.description;

                // Update phoneme analysis
                const phonemeHTML = Object.entries(analysis.breakdown.phoneme_analysis.details)
                    .map(([category, issues]) => `
                        <div class="mb-2">
                            <div class="font-medium">${category.charAt(0).toUpperCase() + category.slice(1)}</div>
                            <div class="text-gray-600 dark:text-gray-400">${Array.isArray(issues) ? issues.join(', ') : issues}</div>
                        </div>
                    `).join('');
                document.getElementById('phonemeAnalysis').innerHTML = phonemeHTML;

                // Update speaking assessment
                const speakingHTML = Object.entries(analysis.breakdown.speaking_assessment.details.feedback)
                    .map(([criterion, feedback]) => `
                        <div class="mb-2">
                            <div class="font-medium">${criterion.charAt(0).toUpperCase() + criterion.slice(1)}</div>
                            <div class="text-gray-600 dark:text-gray-400">${feedback}</div>
                        </div>
                    `).join('');
                document.getElementById('speakingAssessment').innerHTML = speakingHTML;

                // Update recommendations
                const recommendations = Array.isArray(analysis.recommendations) 
                    ? analysis.recommendations 
                    : analysis.recommendations.split('\n');
                    
                document.getElementById('recommendations').innerHTML = recommendations
                    .map(rec => `<li class="mb-1">• ${rec}</li>`)
                    .join('');

                // Add audio playback section
                if (analysis.corrected_audio && analysis.corrected_audio.url) {
                    const audioHTML = `
                        <div class="mt-4">
                            <h3 class="font-semibold">Native Pronunciation Reference</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                                    ${analysis.corrected_audio.description}
                                </p>
                                <audio controls class="w-full">
                                    <source src="${analysis.corrected_audio.url}" type="audio/mp3">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                        </div>
                    `;
                    document.getElementById('results').insertAdjacentHTML('beforeend', audioHTML);
                }

                // Display phoneme details
                if (analysis.breakdown.phoneme_analysis.details.phonemes) {
                    const phonemeDetails = analysis.breakdown.phoneme_analysis.details.phonemes;
                    const phonemeHTML = `
                        <div class="mt-4">
                            <h4 class="font-medium">Phonetic Analysis</h4>
                            <div class="text-sm">
                                <p><strong>Problematic Sounds:</strong> ${phonemeDetails.problematic_sounds.join(', ')}</p>
                                <p><strong>Practice Words:</strong> ${phonemeDetails.suggested_practice.join(', ')}</p>
                                <p><strong>IPA Transcription:</strong> <span class="font-mono">${phonemeDetails.ipa_transcription}</span></p>
                            </div>
                        </div>
                    `;
                    document.getElementById('phonemeAnalysis').insertAdjacentHTML('beforeend', phonemeHTML);
                }
            }

            function updateStatus(message, type = 'info') {
                const status = document.getElementById('status');
                status.textContent = message;
                status.className = `text-sm ${
                    type === 'error' ? 'text-red-500' :
                    type === 'transcribing' ? 'text-blue-500' :
                    'text-gray-600 dark:text-gray-400'
                }`;
            }
        </script>
    </body>
</html>
