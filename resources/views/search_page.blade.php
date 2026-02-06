<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recherche des Chercheurs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-sm mb-6">
                <form action="{{ route('search_page') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                    
                    <select name="search_type" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500">
                        <option value="name" {{ request('search_type') == 'name' ? 'selected' : '' }}>Par Nom</option>
                        <option value="speciality" {{ request('search_type') == 'speciality' ? 'selected' : '' }}>Par Spécialité</option>
                    </select>

                    <input type="text" name="query" value="{{ request('query') }}" 
                           placeholder="Entrez votre recherche..." 
                           class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500">
                    
                    <x-primary-button>
                        {{ __('Rechercher') }}
                    </x-primary-button>
                </form>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
               @forelse($users as $user)
    <div class="group bg-white rounded-3xl p-6 shadow-sm border border-slate-100 hover:shadow-md hover:border-indigo-200 transition-all duration-300 relative overflow-hidden">
        {{-- Décoration de fond subtile --}}
        <div class="absolute top-0 right-0 -mt-4 -mr-4 h-16 w-16 bg-indigo-50 rounded-full opacity-50 group-hover:scale-150 transition-transform duration-500"></div>

        <div class="relative">
            {{-- Avatar avec badge de statut --}}
            <div class="relative inline-block mb-4">
                <img src="{{ $user->photo ? asset('storage/' . $user->photo) : 'https://ui-avatars.com/api/?name='.$user->name.'&background=6366f1&color=fff' }}" 
                     class="h-24 w-24 rounded-2xl mx-auto object-cover border-4 border-white shadow-sm ring-1 ring-slate-100">
            </div>
            
            <h3 class="font-bold text-slate-800 text-lg mb-1">{{ $user->name }}</h3>
            <p class="text-indigo-600 text-sm font-medium mb-4 italic">{{ $user->speciality ?? 'Explorateur de talents' }}</p>

            <div class="flex flex-col gap-3 mt-6">
                {{-- Logique du bouton Ajouter / Déjà envoyé --}}
                @php
                    $isFriend = auth()->user()->friends()->where('friend_id', $user->id)->first();
                @endphp

                @if(!$isFriend && auth()->id() !== $user->id)
                    <form action="{{ route('friends.add', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center gap-2 py-2.5 bg-indigo-600 text-white text-xs font-bold uppercase tracking-wider rounded-xl hover:bg-indigo-700 shadow-indigo-100 shadow-lg transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Ajouter
                        </button>
                    </form>
                @elseif(auth()->id() !== $user->id)
                    <button disabled class="w-full py-2.5 bg-slate-100 text-slate-400 text-xs font-bold uppercase rounded-xl cursor-not-allowed flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Envoyée
                    </button>
                @endif

                <a href="{{ route('profile.show', $user->id) }}" 
                   class="w-full py-2.5 bg-white border border-slate-200 text-slate-600 text-xs font-bold uppercase rounded-xl hover:bg-slate-50 transition text-center">
                    Voir le Profil
                </a>
            </div>
        </div>
    </div>
@empty
    <div class="col-span-1 md:col-span-3 bg-slate-50 border-2 border-dashed border-slate-200 rounded-3xl p-12 text-center">
        <div class="text-slate-400 mb-2">🔍</div>
        <p class="text-slate-500 font-medium">Aucun chercheur ne correspond à votre recherche.</p>
    </div>
@endforelse
            </div>
        </div>
    </div>
</x-app-layout>