<x-app-layout>
    <div class="container mx-auto px-4">


        <form action="/profile/{{ $user->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="grid grid-cols-1 gap-6 max-w-2xl mx-auto mt-8">

                <div>
                    <x-input-label for="title" :value="__('TITLE')" class="text-black" />
                    <x-text-input id="title" class="block mt-1 w-full bg-white text-black" type="text" name="title" :value="old('title') ?? $user->profile->title" autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="description" :value="__('DESCRIPTION')" class="text-black" />
                    <x-text-input id="description" class="block mt-1 w-full bg-white text-black" type="text" name="description" :value="old('description') ?? $user->profile->description" autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="url" :value="__('URL')" class="text-black" />
                    <x-text-input id="url" class="block mt-1 w-full bg-white text-black" type="text" name="url" :value="old('url') ?? $user->profile->url" autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('url')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="image" :value="__('Profile Image')" class="text-black" />
                    <input type="file" class="mt-1 block w-full text-black bg-white border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" id="image" name="image">
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <button class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white text-sm uppercase tracking-widest shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                        {{ __('Save Profile') }}
                    </button>
                </div>
            </div>
        </form>


    </div>
</x-app-layout>








