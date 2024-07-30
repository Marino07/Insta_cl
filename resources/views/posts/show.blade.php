<x-app-layout>
    <div class="container mx-auto px-4">
        <div class="flex justify-center items-center min-h-screen">
            <div class="w-full p-5 max-w-3xl">
                <div class="flex items-start gap-6 mb-6">
                    <!-- Profilna slika pomaknuta lijevo za 100px -->
                    <div class="flex-shrink-0" style="margin-left: -100px;">
                        <img src="/storage/{{ $post->user->profile->image }}" class="w-24 h-24 rounded-full object-cover shadow-lg" alt="Profile Picture">
                    </div>

                    <!-- Slika posta s opisom -->
                    <div class="flex flex-col flex-grow">
                        <img src="/storage/{{ $post->image }}" class="w-full max-w-[50vw] h-auto rounded-lg shadow-lg mb-4" alt="Post Image">
                        <p class="text-lg text-center">{{ $post->caption }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
