<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded-lg">
                <h2 class="text-2xl font-bold mb-6">Ajouter une nouvelle offre</h2>
                
                <form action="{{ route('job_offers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <x-input-label for="titre" value="Titre de l'offre" />
                        <x-text-input id="titre" name="titre" type="text" class="block mt-1 w-full" required />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="entreprise" value="Nom de l'entreprise" />
                        <x-text-input id="entreprise" name="entreprise" type="text" class="block mt-1 w-full" required />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="type_contrat" value="Type de contrat" />
                        <select name="type_contrat" class="border-gray-300 rounded-md w-full">
                            <option value="CDI">CDI</option>
                            <option value="CDD">CDD</option>
                            <option value="Freelance">Freelance</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <x-input-label for="description" value="Description" />
                        <textarea name="description" class="border-gray-300 rounded-md w-full" rows="4"></textarea>
                    </div>

                    <div class="mb-4">
                        <x-input-label for="image" value="Logo de l'entreprise (Optionnel)" />
                        <input type="file" name="image" class="mt-1 block w-full">
                    </div>

                    <x-primary-button>Publier l'offre</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>