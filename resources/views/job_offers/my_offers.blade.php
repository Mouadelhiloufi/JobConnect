<x-app-layout>
    <div class="max-w-7xl mx-auto py-10">
        <h2 class="text-2xl font-bold mb-6">Mes Offres Publiées</h2>

        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Titre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($offres as $offre)
                    <tr>
                        <td class="px-6 py-4">{{ $offre->titre }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded text-sm {{ $offre->status === 'ouvert' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ ucfirst($offre->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            @if($offre->status === 'ouvert')
                                <form action="{{ route('job_offers.fermer', $offre->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-red-600 hover:text-red-900 font-bold">
                                        Clôturer
                                    </button>
                                </form>
                            @else
                                <span class="text-gray-400 italic">Déjà clôturée</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>