<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Services\OpenAIService;

class SmartStudyPlanner extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'PromptForge AI Toolkit';
    protected static ?string $title = 'Smart Study Planner';

    protected static string $view = 'filament.pages.smart-study-planner';

    public string $userInput = '';
    public ?string $result = null;

    public function submit(): void
    {
        $prompt = <<<PROMPT
You are an expert academic coach. Based on the student's input, generate a personalized study plan with daily breakdowns:

{$this->userInput}

Include time slots, subject focus, and strategies for retention.
PROMPT;

        $this->result = app(OpenAIService::class)->chat($prompt, 'You are a supportive academic coach who creates efficient study schedules.');
    }
}
