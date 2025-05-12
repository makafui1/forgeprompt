<x-filament::page>
    <form wire:submit="submit">
        <div class="space-y-6">
            <!-- Relationship Advice Input Section -->
            <div class="p-6 bg-white rounded-xl shadow dark:bg-gray-800">
                <div class="space-y-4">
                    <div>
                        <label for="userInput" class="inline-block text-sm font-medium leading-6 text-gray-950 dark:text-white">
                            Describe your relationship question or challenge:
                        </label>
                        <div class="mt-2">
                            <textarea
                                id="userInput"
                                wire:model.defer="userInput"
                                rows="5"
                                class="block w-full rounded-lg border-gray-300 shadow-sm outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-500 dark:border-gray-700 dark:bg-gray-700 dark:text-white dark:focus:border-primary-500"
                                placeholder="e.g. I'm struggling to communicate with my partner effectively..."
                            ></textarea>
                        </div>
                    </div>
                    
                    <div class="flex justify-end">
                        <button
                            type="submit"
                            class="inline-flex items-center justify-center py-2 px-4 font-medium rounded-lg text-white bg-primary-600 hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 dark:bg-primary-500 dark:hover:bg-primary-400 dark:focus:ring-offset-gray-800"
                        >
                            Get Advice
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Results Section -->
            @if ($result)
                <div class="p-6 bg-white rounded-xl shadow dark:bg-gray-800">
                    <h2 class="text-lg font-bold text-gray-950 dark:text-white">AI Relationship Guidance</h2>
                    <div class="prose max-w-none mt-4 dark:prose-invert">
                        {!! \Illuminate\Support\Str::markdown($result) !!}
                    </div>
                </div>
            @endif
        </div>
    </form>
</x-filament::page>