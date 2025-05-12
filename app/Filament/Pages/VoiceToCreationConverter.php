<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Services\OpenAIService;

class VoiceToCreationConverter extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-microphone';
    protected static ?string $navigationGroup = 'PromptForge AI Toolkit';
    protected static ?string $title = 'Voice-to-Creation Converter';

    protected static string $view = 'filament.pages.voice-to-creation-converter';

    public $audio;
    public ?string $result = null;

    public function submit(): void
    {
        $path = $this->audio->store('audio');

        $response = Http::withToken(env('OPENAI_API_KEY'))->attach(
            'file', file_get_contents(Storage::path($path)), basename($path)
        )->post('https://api.openai.com/v1/audio/transcriptions', [
            'model' => 'whisper-1',
        ]);

        $transcript = $response->json('text') ?? 'Unable to transcribe.';

        $prompt = <<<PROMPT
You are a creative assistant. Based on this transcribed idea:

{$transcript}

Generate a structured version, such as a blog post outline, short story, or plan.
PROMPT;

        $this->result = app(OpenAIService::class)->chat($prompt);
    }
}

