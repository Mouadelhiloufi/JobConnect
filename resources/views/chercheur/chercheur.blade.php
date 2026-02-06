<x-app-layout>
    <div class="min-h-screen bg-slate-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                
                {{-- Colonne de Gauche : Profil --}}
                <div class="lg:col-span-4">
                    <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">
                        <div class="h-24 bg-gradient-to-r from-blue-600 to-indigo-700"></div>
                        <div class="px-6 pb-6">
                            <div class="relative -mt-12 mb-4 flex justify-center">
                                <img class="h-24 w-24 rounded-2xl border-4 border-white object-cover shadow-md" 
                                     src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : 'https://ui-avatars.com/api/?name='.Auth::user()->name }}" 
                                     alt="Profil">
                            </div>
                            <div class="text-center">
                                <h2 class="text-xl font-bold text-slate-800">{{ Auth::user()->firstname }} {{ Auth::user()->name }}</h2>
                                <p class="text-blue-600 font-medium text-sm">{{ Auth::user()->specialite ?? 'Spécialité non définie' }}</p>
                            </div>
                            
                            <div class="mt-6 p-4 bg-slate-50 rounded-2xl border border-slate-100">
                                <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Ma Bio</h4>
                                <p class="text-sm text-slate-600 leading-relaxed italic">
                                    "{{ Auth::user()->bio ?? 'Aucune biographie ajoutée pour le moment.' }}"
                                </p>
                            </div>

                            <div class="mt-6">
                                <a href="{{ route('profile.edit') }}" class="flex items-center justify-center w-full px-4 py-3 bg-slate-900 text-white text-sm font-semibold rounded-xl hover:bg-slate-800 transition">
                                    Modifier le Profil
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Colonne de Droite : Liste des Offres --}}
                <div class="lg:col-span-8 space-y-6">
                    

                    {{-- --- DÉBUT DE LA BOUCLE --- --}}
                    @forelse($offres as $offre)
                        <div class="group bg-white p-6 rounded-3xl shadow-sm border border-slate-200 hover:border-blue-400 transition-all duration-300">
                            <div class="flex items-start justify-between">
                                <div class="flex gap-4">
                                    {{-- Logo dynamique --}}
                                    <div class="h-12 w-12 bg-slate-100 rounded-xl flex items-center justify-center font-bold text-blue-600 overflow-hidden">
                                        @if($offre->image)
                                            <img src="{{ asset('storage/' . $offre->image) }}" class="object-cover h-full w-full">
                                        @else
                                            {{ substr($offre->entreprise, 0, 2) }}
                                        @endif
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-bold text-slate-800 group-hover:text-blue-600 transition">
                                            {{ $offre->titre }}
                                        </h4>
                                        <p class="text-slate-500 text-sm">{{ $offre->entreprise }} • Casablanca</p>
                                        <div class="mt-2 flex gap-2">
                                            <span class="text-xs bg-slate-100 px-2 py-1 rounded text-slate-600 font-medium italic">
                                                {{ $offre->type_contrat }}
                                            </span>
                                            <span class="text-xs bg-green-50 px-2 py-1 rounded text-green-600 font-medium italic">Urgent</span>
                                        </div>
                                    </div>
                                </div>

                                {{-- Lien vers la page de détails --}}
                                <a href="{{ route('job_offers.show', $offre->id) }}" 
                                   class="px-5 py-2 bg-blue-50 text-blue-600 text-sm font-bold rounded-xl hover:bg-blue-600 hover:text-white transition">
                                    Détails
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="bg-white p-12 rounded-3xl text-center border border-dashed border-slate-300">
                            <p class="text-slate-500">Aucune offre disponible pour le moment.</p>
                        </div>
                    @endforelse

                    {{-- Section des Invitations --}}
@if(auth()->user()->friendOf()->wherePivot('status', 'en attente')->count() > 0)
    <div class="mb-8">
        <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center">
            <span class="flex h-3 w-3 mr-2">
                <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-blue-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-blue-500"></span>
            </span>
            Invitations en attente
        </h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach(auth()->user()->friendOf()->wherePivot('status', 'en attente')->get() as $request)
                <div class="bg-white p-4 rounded-2xl border border-blue-100 shadow-sm flex items-center justify-between group hover:shadow-md transition">
                    <div class="flex items-center gap-3">
                        <img class="h-10 w-10 rounded-xl object-cover" 
                             src="https://ui-avatars.com/api/?name={{ $request->name }}&background=DBEAFE&color=2563EB" alt="">
                        <div>
                            <p class="text-sm font-bold text-slate-800">{{ $request->name }}</p>
                            <p class="text-xs text-slate-500">Souhaite se connecter</p>
                        </div>
                    </div>
                    
                    <div class="flex gap-2">
                        {{-- Bouton Accepter --}}
                        <form action="{{ route('friends.accept', $request->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="p-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                </svg>
                            </button>
                        </form>
                        
                        {{-- Bouton Refuser --}}
                        <form action="{{ route('friends.reject', $request->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="p-2 bg-slate-100 text-slate-400 rounded-lg hover:bg-red-50 hover:text-red-500 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <hr class="border-slate-200 mb-8">
@endif
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>