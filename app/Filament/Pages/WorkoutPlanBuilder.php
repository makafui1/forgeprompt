<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Services\OpenAIService;

class WorkoutPlanBuilder extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-heart';
    protected static ?string $navigationGroup = 'PromptForge AI Toolkit';
    protected static ?string $title = 'Workout Plan Builder';

    protected static string $view = 'filament.pages.workout-plan-builder';

    public string $userInput = '';
    public ?string $result = null;

    public function submit(): void
    {
        $prompt = <<<PROMPT
You are a professional fitness trainer. Based on the following goals, fitness level, and any constraints, create a full weekly workout plan:

{$this->userInput}

Include rest days, types of workouts, and tips. Format as a 7-day schedule.
PROMPT;

        $this->result = app(OpenAIService::class)->chat(
            $prompt,
            'You are a certified fitness coach who builds safe and effective workout plans.'
        );
    }
}