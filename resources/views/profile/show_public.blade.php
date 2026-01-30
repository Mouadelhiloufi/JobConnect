<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profil de ') }} {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <div class="text-center">
                    <img src="{{ $user->photo ? asset('storage/' . $user->photo) : 'https://ui-avatars.com/api/?name='.urlencode($user->name) }}" 
     style="width: 60px !important; height: 60px !important;"
     class="rounded-full mx-auto border-2 border-indigo-50 shadow-md object-cover">
                    
                    <h1 class="mt-4 text-3xl font-bold text-gray-900">{{ $user->name }}</h1>
                    <p class="text-indigo-600 font-semibold text-lg">{{ $user->speciality ?? 'Chercheur' }}</p>
                </div>

                <div class="mt-8 border-t pt-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">À propos / Bio</h3>
                    <p class="text-gray-600 leading-relaxed bg-gray-50 p-4 rounded-lg">
                        {{ $user->bio ?? "Cet utilisateur n'a pas encore rédigé de biographie." }}
                    </p>
                </div>

                <div class="mt-6 border-t pt-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Contact</h3>
                    <div class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <span>{{ $user->email }}</span>
                    </div>
                </div>

                <div class="mt-10 text-center">
                    <a href="{{ route('search_page') }}" class="text-sm text-gray-500 hover:text-indigo-600">
                        ← Retour à la recherche
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>