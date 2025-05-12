<x-filament::page>
    <form wire:submit="submit">
        <div class="space-y-6">
            <!-- PDF Upload Section -->
            <div class="p-6 bg-white rounded-xl shadow dark:bg-gray-800">
                <div class="space-y-4">
                    <!-- PDF Upload -->
                    <div>
                        <label class="inline-block text-sm font-medium leading-6 text-gray-950 dark:text-white">
                            Upload PDF
                        </label>
                        <div class="mt-2">
                            <input
                                type="file"
                                wire:model="pdf"
                                accept=".pdf"
                                required
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            >
                            @error('pdf') <span class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Question Input -->
                    <div>
                        <label for="question" class="inline-block text-sm font-medium leading-6 text-gray-950 dark:text-white">
                            Ask a question about the PDF
                        </label>
                        <div class="mt-2">
                            <textarea
                                id="question"
                                wire:model.defer="question"
                                rows="4"
                                class="block w-full rounded-lg border-gray-300 shadow-sm outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-500 dark:border-gray-700 dark:bg-gray-700 dark:text-white dark:focus:border-primary-500"
                                placeholder="e.g. What are the contract obligations?"
                            ></textarea>
                        </div>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button
                            type="submit"
                            class="inline-flex items-center justify-center py-2 px-4 font-medium rounded-lg text-white bg-primary-600 hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 dark:bg-primary-500 dark:hover:bg-primary-400 dark:focus:ring-offset-gray-800"
                        >
                            Ask the PDF
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Results Section -->
            @if ($result)
                <div class="p-6 bg-white rounded-xl shadow dark:bg-gray-800">
                    <h2 class="text-lg font-bold text-gray-950 dark:text-white">Answer</h2>
                    <div class="prose max-w-none mt-4 dark:prose-invert">
                        {!! \Illuminate\Support\Str::markdown($result) !!}
                    </div>
                </div>
            @endif
        </div>
    </form>
</x-filament::page>