<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Services\OpenAIService;

class RecipeGenerator extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $navigationGroup = 'PromptForge AI Toolkit';
    protected static ?string $title = 'Recipe Generator';

    protected static string $view = 'filament.pages.recipe-generator';

    public string $userInput = '';
    public ?string $result = null;

    public function submit(): void
    {
        $prompt = <<<PROMPT
You're an expert chef. Based on the following ingredients, dietary preferences, or cravings, generate a full recipe:

{$this->userInput}

Include ingredients, steps, and helpful tips.
PROMPT;

        $this->result = app(OpenAIService::class)->chat($prompt, 'You are a creative and helpful recipe assistant.');
    }
}
