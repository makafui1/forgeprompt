<x-filament::page>
    <form wire:submit="submit">
        <div class="space-y-6">
            <!-- Voice Recording Upload Section -->
            <div class="p-6 bg-white rounded-xl shadow dark:bg-gray-800">
                <div class="space-y-4">
                    <!-- Audio Upload -->
                    <div>
                        <label class="inline-block text-sm font-medium leading-6 text-gray-950 dark:text-white">
                            Upload Voice Recording
                        </label>
                        <div class="mt-2">
                            <input
                                type="file"
                                wire:model="audio"
                                accept="audio/*"
                                required
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            >
                            @error('audio') <span class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Supported formats: MP3, WAV, AAC, etc.</p>
                        </div>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button
                            type="submit"
                            class="inline-flex items-center justify-center py-2 px-4 font-medium rounded-lg text-white bg-primary-600 hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 dark:bg-primary-500 dark:hover:bg-primary-400 dark:focus:ring-offset-gray-800"
                        >
                            Convert to Creative Output
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Results Section -->
            @if ($result)
                <div class="p-6 bg-white rounded-xl shadow dark:bg-gray-800">
                    <h2 class="text-lg font-bold text-gray-950 dark:text-white">Generated Output</h2>
                    <div class="prose max-w-none mt-4 dark:prose-invert">
                        {!! \Illuminate\Support\Str::markdown($result) !!}
                    </div>
                </div>
            @endif
        </div>
    </form>
</x-filament::page>