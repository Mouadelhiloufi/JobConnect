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
                    <div class="bg-white p-6 rounded-lg shadow-sm border text-center">
                        <img src="{{ $user->photo ? asset('storage/' . $user->photo) : 'https://ui-avatars.com/api/?name='.$user->name }}" 
                             class="h-20 w-20 rounded-full mx-auto mb-4 object-cover border">
                        
                        <h3 class="font-bold text-lg">{{ $user->name }}</h3>
                        <p class="text-indigo-600 text-sm mb-4">{{ $user->speciality ?? 'Sans spécialité' }}</p>


            <div class="mt-4">
    <a href="{{ route('profile.show', $user->id) }}" 
       class="inline-flex items-center px-6 py-2 bg-indigo-600 border border-transparent rounded-md font-bold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 transition ease-in-out duration-150 shadow-md">
        Voir le Profil
    </a>
</div>
                        
                        
                    </div>
                @empty
                    <div class="col-span-3 text-center py-10 text-gray-500">
                        Aucun résultat trouvé pour votre recherche.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>