<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Services\OpenAIService;
use Illuminate\Support\Facades\Storage;
use Smalot\PdfParser\Parser;

class AskMyPdfTool extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document';
    protected static ?string $navigationGroup = 'PromptForge AI Toolkit';
    protected static ?string $title = 'Ask My PDF Tool';

    protected static string $view = 'filament.pages.ask-my-pdf-tool';

    public $pdf;
    public string $question = '';
    public ?string $result = null;

    public function submit(): void
    {
        $path = $this->pdf->store('pdfs');
        $pdfContent = (new Parser())->parseFile(Storage::path($path))->getText();

        $prompt = <<<PROMPT
You are a document assistant. Based on the following PDF content:

---
{$pdfContent}
---

Answer this question clearly and concisely:

{$this->question}
PROMPT;

        $this->result = app(OpenAIService::class)->chat($prompt, 'You help users understand documents.');
    }
}
