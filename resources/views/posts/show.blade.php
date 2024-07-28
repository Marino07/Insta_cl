<x-app-layout>
    <div class="container mx-auto px-4">
        <div class="flex justify-center items-center min-h-screen"> <!-- Koristi min-h-screen za vertikalno centriranje -->
            <div class="w-full p-5 max-w-3xl"> <!-- Dodaj max-w-3xl za ograničenje širine -->
                <div class="flex justify-center mb-6">
                    <img src="/storage/{{ $post->image }}" class="w-1/2 max-w-[50vw] h-auto rounded-lg shadow-lg"> <!-- Postavi širinu na 50% ekrana -->
                </div>
                <div class="flex flex-col items-center"> <!-- Koristi flex-col za vertikalno poravnanje -->
                    <h3 class="text-xl font-semibold mb-2">{{ $post->user->username }}</h3> <!-- Dodaj marginu s donje strane -->
                    <p class="text-lg text-center">{{ $post->caption }}</p> <!-- Dodaj marginu s donje strane i centriraj tekst -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


