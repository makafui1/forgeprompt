<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Services\OpenAIService;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;

class PersonalFinanceCoach extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationGroup = 'PromptForge AI Toolkit';
    protected static string $view = 'filament.pages.personal-finance-coach';

    public ?string $userInput = '';
    public ?string $result = null;

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Textarea::make('userInput')
                    ->label('Your Financial Question')
                    ->placeholder('e.g., How can I start investing with $1000?')
                    ->required()
                    ->rows(3),
            ]);
    }

    public function submit(): void
    {
        $data = $this->form->getState();
        
        $prompt = <<<PROMPT
You are a professional personal finance coach. Help the user with the following query:

{$data['userInput']}

Provide practical, detailed advice in bullet points.
PROMPT;

        $this->result = app(OpenAIService::class)->chat($prompt, 'You are a helpful finance assistant.');
    }
}