<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord des Offres') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
                <form action="{{ route('job_offers.index') }}" method="GET" class="flex flex-wrap gap-4 items-end">
                    <div class="flex-1 min-w-[200px]">
                        <x-input-label for="query" :value="__('Rechercher par titre')" />
                        <x-text-input id="query" name="query" type="text" class="mt-1 block w-full" :value="request('query')" placeholder="ex: Développeur PHP..." />
                    </div>

                    <div class="flex-1 min-w-[200px]">
                        <x-input-label for="type_contrat" :value="__('Type de contrat')" />
                        <select name="type_contrat" id="type_contrat" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                            <option value="">{{ __('Tous') }}</option>
                            <option value="CDI" {{ request('type_contrat') == 'CDI' ? 'selected' : '' }}>CDI</option>
                            <option value="CDD" {{ request('type_contrat') == 'CDD' ? 'selected' : '' }}>CDD</option>
                            <option value="Freelance" {{ request('type_contrat') == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                        </select>
                    </div>

                    <x-primary-button>
                        {{ __('Filtrer') }}
                    </x-primary-button>
                    
                    <a href="{{ route('job_offers.index') }}" class="text-sm text-gray-600 underline ml-2">Effacer</a>
                </form>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($offers as $offer)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-indigo-500">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-bold text-gray-900">{{ $offer->titre }}</h3>
                                <p class="text-indigo-600 font-medium">{{ $offer->entreprise }}</p>
                            </div>
                            <span class="px-2 py-1 bg-indigo-100 text-indigo-800 text-xs font-semibold rounded uppercase">
                                {{ $offer->type_contrat }}
                            </span>
                        </div>
                        
                        <p class="mt-4 text-gray-600 text-sm line-clamp-3">
                            {{ $offer->description }}
                        </p>

                        <div class="mt-6 flex justify-between items-center">
                            <span class="text-gray-400 text-xs">Posté par: {{ $offer->user->name }}</span>
                            <a href="#" class="text-indigo-600 hover:text-indigo-900 font-semibold text-sm">Voir détails →</a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full bg-white p-12 text-center shadow-sm sm:rounded-lg">
                        <p class="text-gray-500 italic">{{ __('Aucune offre ne correspond à votre recherche.') }}</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>