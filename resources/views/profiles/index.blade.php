<x-app-layout>
    <div class="container mx-auto px-4">
        <div class="flex items-center"> <!-- Dodano items-center za vertikalno poravnanje -->
            <div class="w-1/4 mt-4 p-5">
                <div class="flex justify-center">
                    <img class="w-1/2 h-auto rounded-full object-cover" src="{{ $user->profile->profileImage() }}" alt="Slika">
                </div>
            </div>
            <div class="w-3/4 pt-5">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4"> <!-- Grupe koje drže korisničko ime i Follow dugme -->
                        <h1 class="text-xl font-bold">{{ $user->username }}</h1>
                        <div id="app">
                            <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                        </div>
                    </div>
                    @if(Auth::id() === $user->id)
                        <a href="/p/create/{{ $user->profile->id }}" class="text-blue-500 hover:underline">Add new post</a>
                    @endif
                </div>
                @can('update',$user->profile)
                    <a href="/profile/{{ $user->id }}/edit" class="text-blue-500 hover:underline">Edit profile</a>
                @endcan

                <div class="flex space-x-4 items-center mt-4">
                    <div><strong>{{$postCount}}</strong> posts</div>
                    <div><strong>{{ $user->profile->followers->count() }}</strong> followers</div>
                    <div><strong>{{ $user->following->count() }}</strong> following</div>
                </div>
                <div class="pt-4 font-bold">{{ $user->profile->title }}</div>
                <div>{{ $user->profile->description }}</div>
                <div><a href="#" class="text-blue-500 hover:underline">{{ $user->profile->url ?? 'N/A' }}</a></div>
            </div>
        </div>
        <div class="container mx-auto px-4 pt-5">
            <div class="grid grid-cols-3 gap-4">
                @foreach($user->posts as $post)
                    <div class="col-span-1 pb-3">
                        <a href="/p/{{ $post->id }}">
                            <img src="/storage/{{ $post->image }}" class="w-full">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
