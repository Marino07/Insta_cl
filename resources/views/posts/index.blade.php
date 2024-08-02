<x-app-layout>
    <div class="container mx-auto px-4">
        @foreach($posts as $post)
            <div class="flex justify-center items-center mb-6"> <!-- Smanjiti marginu između postova -->
                <div class="w-full p-5 max-w-3xl">
                    <div class="flex items-start gap-6 mb-6">
                        <!-- Profilna slika i opis -->
                        <div class="flex-shrink-0 flex items-start" style="margin-left: -100px;">
                            <img src="{{ $post->user->profile->ProfileImage() }}" style="max-width: 50px" class="rounded-full" alt="Profile Picture">
                            <div class="ml-3 max-w-xs">
                                <div class="flex items-center gap-2"> <!-- Omot za username i follow dugme -->
                                    <a href="/profile/{{ $post->user->id }}">
                                        <p class="font-bold">{{ $post->user->username }}</p>
                                    </a>
                                    <a href="#" class="bg-blue-500 text-white px-1 py-0 rounded-full hover:bg-blue-300 focus:outline-none">
                                        Follow
                                    </a>
                                </div>
                                <p class="mt-1 break-words"><strong>Caption:</strong> {{ $post->caption }}</p>
                            </div>
                        </div>

                        <!-- Slika posta -->
                        <div class="flex flex-col flex-grow">
                            <img src="/storage/{{ $post->image }}" class="w-full max-w-[50vw] h-auto rounded-lg shadow-lg" alt="Post Image">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
