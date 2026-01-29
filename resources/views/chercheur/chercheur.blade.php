<x-app-layout>
    <div class="min-h-screen bg-slate-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                
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

                <div class="lg:col-span-8 space-y-6">
                    <div class="flex items-center justify-between">
                        <h3 class="text-2xl font-extrabold text-slate-800 tracking-tight">Offres Recommandées</h3>
                        <span class="bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-full uppercase">Nouveau</span>
                    </div>

                    <div class="group bg-white p-6 rounded-3xl shadow-sm border border-slate-200 hover:border-blue-400 transition-all duration-300">
                        <div class="flex items-start justify-between">
                            <div class="flex gap-4">
                                <div class="h-12 w-12 bg-slate-100 rounded-xl flex items-center justify-center font-bold text-blue-600">TS</div>
                                <div>
                                    <h4 class="text-lg font-bold text-slate-800 group-hover:text-blue-600 transition">Développeur Fullstack Laravel</h4>
                                    <p class="text-slate-500 text-sm">TechSol Morocco • Casablanca</p>
                                    <div class="mt-2 flex gap-2">
                                        <span class="text-xs bg-slate-100 px-2 py-1 rounded text-slate-600 font-medium italic">CDI</span>
                                        <span class="text-xs bg-green-50 px-2 py-1 rounded text-green-600 font-medium italic">Urgent</span>
                                    </div>
                                </div>
                            </div>
                            <button class="px-5 py-2 bg-blue-50 text-blue-600 text-sm font-bold rounded-xl hover:bg-blue-600 hover:text-white transition">Postuler</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>