<x-app-layout>
    <div class="container mx-auto px-4">
        <form action="/p" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-6 max-w-2xl mx-auto mt-8">

                <div>
                    <x-input-label for="caption" :value="__('Caption')" class="text-black" />
                    <x-text-input id="caption" class="block mt-1 w-full bg-white text-black" type="text" name="caption" :value="old('caption')" autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('caption')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="image" :value="__('Post Image')" class="text-black" />
                    <input type="file" class="mt-1 block w-full text-black bg-white border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" id="image" name="image">
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <button class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white text-sm uppercase tracking-widest shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                        {{ __('Add new post') }}
                    </button>
                </div>

            </div>
        </form>
    </div>
</x-app-layout>
