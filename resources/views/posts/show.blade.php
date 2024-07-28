<x-app-layout>
    <div class="container mx-auto px-4">
        <div class="flex justify-center items-center min-h-screen"> <!-- Koristi min-h-screen za vertikalno centriranje -->
            <div class="w-full p-5">
                <div class="flex justify-center">
                    <img src="/storage/{{ $post->image }}" class="w-1/2 max-w-[50vw] h-auto rounded-lg shadow-lg"> <!-- Postavi širinu na 50% ekrana -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

