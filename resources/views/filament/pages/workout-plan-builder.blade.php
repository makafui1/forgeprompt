<x-filament::page>
    <form wire:submit="submit">
        {{ $this->form }}

        <x-filament::button type="submit" class="mt-4">
            Generate Workout Plan
        </x-filament::button>
    </form>

    @if ($result)
        <div class="mt-6 p-6 bg-white rounded-xl shadow dark:bg-gray-800 dark:text-white">
            <h2 class="text-lg font-semibold">Your AI-Powered Workout Plan</h2>
            <div class="prose max-w-none mt-2 dark:prose-invert">
                {!! nl2br(e($result)) !!}
            </div>
        </div>
    @endif
</x-filament::page>