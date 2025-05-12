<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Services\OpenAIService;

class RelationshipAdvisor extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'PromptForge AI Toolkit';
    protected static ?string $title = 'Relationship Advisor';

    protected static string $view = 'filament.pages.relationship-advisor';

    public string $userInput = '';
    public ?string $result = null;

    public function submit(): void
    {
        $prompt = <<<PROMPT
You are a compassionate and insightful relationship advisor. Help the user with the following issue or question:

{$this->userInput}

Provide emotionally intelligent, non-judgmental advice in a warm tone.
PROMPT;

        $this->result = app(OpenAIService::class)->chat($prompt, 'You are a therapist and relationship coach.');
    }
}
