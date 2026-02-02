<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier mon Profil Professionnel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                {{-- Message de succès --}}
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600 bg-green-100 p-3 rounded">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('cv.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="photo" :value="__('Photo de profil')" />
                        @if($profile->photo)
                            <div class="mt-2 mb-2">
                                <img src="{{ asset('storage/' . $profile->photo) }}" class="w-20 h-20 rounded-full object-cover border">
                            </div>
                        @endif
                        <input type="file" name="photo" id="photo" class="block mt-1 w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
                        <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="titre" :value="__('Titre Professionnel (ex: Développeur PHP)')" />
                        <x-text-input id="titre" name="titre" type="text" class="mt-1 block w-full" :value="old('titre', $profile->titre)" required />
                        <x-input-error :messages="$errors->get('titre')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="formation" :value="__('Formation / Études')" />
                        <textarea id="formation" name="formation" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" rows="3">{{ old('formation', $profile->formation) }}</textarea>
                        <x-input-error :messages="$errors->get('formation')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="experiences" :value="__('Expériences Professionnelles')" />
                        <textarea id="experiences" name="experiences" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" rows="4">{{ old('experiences', $profile->experiences) }}</textarea>
                        <x-input-error :messages="$errors->get('experiences')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="competences" :value="__('Compétences (séparez par des virgules)')" />
                        <x-text-input id="competences" name="competences" type="text" class="mt-1 block w-full" :value="old('competences', $profile->competences)" placeholder="Laravel, React, SQL..." />
                        <x-input-error :messages="$errors->get('competences')" class="mt-2" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Enregistrer les modifications') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>