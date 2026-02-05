<x-app-layout>
    <div class="max-w-4xl mx-auto py-12 px-4">
        <div class="bg-white shadow-xl rounded-3xl overflow-hidden border border-slate-200">
            
            {{-- 1. Bannière de fond (Couleur unie ou dégradé) --}}
            <div class="h-32 bg-gradient-to-r from-slate-100 to-slate-200 relative"></div>

            <div class="px-8 pb-8">
                {{-- 2. Image Circulaire qui chevauche la bannière --}}
                <div class="relative -mt-16 mb-6 flex justify-start">
                    <div class="h-48 w-48 rounded-full border-4 border-white shadow-md bg-white overflow-hidden flex items-center justify-center">
                        @if($job_offer->image)
                            <img src="{{ asset('storage/' . $job_offer->image) }}" 
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-blue-600 text-white text-3xl font-bold">
                                {{ substr($job_offer->entreprise, 0, 2) }}
                            </div>
                        @endif
                    </div>
                </div>

                {{-- 3. Infos de l'offre --}}
                <div class="flex flex-col md:flex-row justify-between items-start mb-8">
                    <div>
                        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">{{ $job_offer->titre }}</h1>
                        <p class="text-xl text-blue-600 font-semibold">{{ $job_offer->entreprise }}</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <span class="px-4 py-2 bg-blue-50 text-blue-700 rounded-xl font-bold text-xs uppercase tracking-widest border border-blue-100">
                            {{ $job_offer->type_contrat }}
                        </span>
                    </div>
                </div>

                {{-- Description --}}
                <div class="prose max-w-none text-slate-600 mb-8 bg-slate-50 p-6 rounded-2xl border border-slate-100">
                    <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-4">Description du poste</h3>
                    <p class="leading-relaxed whitespace-pre-line text-slate-700">
                        {{ $job_offer->description }}
                    </p>
                </div>

                {{-- Boutons --}}
                <div class="flex gap-4">
                    <a href="{{ route('chercheur.index') }}" class="px-6 py-3 bg-white text-slate-600 font-bold rounded-xl border border-slate-200 hover:bg-slate-50 transition">
                        Retour
                    </a>    
            <form action="{{ route('applications.store', $job_offer->id) }}" method="POST" class="flex-1">
                @csrf
                <button type="submit" class="w-full px-6 py-3 bg-slate-900 text-white font-bold rounded-xl hover:bg-black shadow-lg transition">
                        Postuler maintenant
                </button>
            </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>