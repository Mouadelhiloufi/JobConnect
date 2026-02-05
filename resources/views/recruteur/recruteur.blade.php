<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-900 leading-tight">
            {{ __('Espace Entreprise / Recruteur') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow border-b-4 border-green-500">
                    <p class="text-gray-500 font-medium uppercase text-xs">Offres Actives</p>
                    <p class="text-3xl font-bold text-gray-800">5</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow border-b-4 border-blue-500">
                    <p class="text-gray-500 font-medium uppercase text-xs">Candidatures reçues</p>
                    <p class="text-3xl font-bold text-gray-800">124</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow border-b-4 border-orange-500 text-center flex items-center justify-center">
                    <a href="{{ route('job_offers.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
                    Ajouter une offre
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <h4 class="font-bold text-gray-800 italic uppercase">Dernières candidatures reçues</h4>
                </div>
                <div class="p-6">
                    <p class="text-gray-500 italic">Aucune candidature pour le moment.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>