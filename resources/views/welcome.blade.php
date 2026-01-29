<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobly - Bienvenue dans votre communauté professionnelle</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white font-sans text-gray-900">

    <nav class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <div class="flex items-center space-x-2">
            <h1 class="text-3xl font-bold text-blue-700">Jobly<span class="text-blue-500 text-4xl">.</span></h1>
        </div>
        <div class="flex items-center space-x-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-gray-600 font-semibold hover:bg-gray-100 px-4 py-2 rounded-full transition">Dashboard</a>
                @else
                
                    <a href="{{ route('login') }}" class="text-gray-600 font-semibold hover:bg-gray-100 px-4 py-2 rounded-full transition">S'identifier</a>
                    <a href="{{ route('register') }}" class="border-2 border-blue-600 text-blue-600 font-semibold px-6 py-2 rounded-full hover:bg-blue-50 transition">S'inscrire</a>
                @endauth
            @endif
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 items-center py-12">
        
        <div class="space-y-8">
            <h2 class="text-5xl md:text-6xl font-light leading-tight text-brown-800">
                Bienvenue dans votre <br> 
                <span class="text-blue-700 font-normal">communauté professionnelle</span>
            </h2>

            <div class="space-y-4 max-w-sm">
                <button class="w-full flex items-center justify-center space-x-3 border border-gray-400 py-3 rounded-full hover:bg-gray-50 transition">
                    <img src="https://www.svgrepo.com/show/355037/google.svg" class="h-5 w-5" alt="">
                    <span>Continuer avec Google</span>
                </button>

                <button class="w-full flex items-center justify-center space-x-3 border border-gray-400 py-3 rounded-full hover:bg-gray-50 transition">
                    <img src="https://www.svgrepo.com/show/354068/microsoft.svg" class="h-5 w-5" alt="">
                    <span>Continuer avec Microsoft</span>
                </button>

                <div class="flex items-center space-x-2 py-2">
                    <div class="flex-1 h-px bg-gray-300"></div>
                    <span class="text-gray-500 text-sm">ou</span>
                    <div class="flex-1 h-px bg-gray-300"></div>
                </div>

                <a href="{{ route('register') }}" class="w-full flex items-center justify-center bg-blue-600 text-white font-bold py-3 rounded-full hover:bg-blue-700 transition">
                    S'identifier avec un e-mail
                </a>

                <p class="text-xs text-gray-500 text-center px-4">
                    En cliquant sur Continuer, vous acceptez les <span class="text-blue-600 font-semibold cursor-pointer">Conditions d'utilisation</span> de Jobly.
                </p>
            </div>
        </div>

        <div class="hidden md:block">
            <img src="https://static.licdn.com/aero-v1/sc/h/dxf91bd6z70rn8pa7p7gt9bh" class="w-full h-auto" alt="Illustration">
        </div>

    </main>

    <footer class="bg-gray-100 mt-20 py-10">
        <div class="max-w-7xl mx-auto px-6 text-sm text-gray-600 flex flex-wrap gap-6">
            <p>&copy; 2025 Jobly Corporation</p>
            <a href="#" class="hover:underline">À propos</a>
            <a href="#" class="hover:underline">Accessibilité</a>
            <a href="#" class="hover:underline">Politique de confidentialité</a>
        </div>
    </footer>

</body>
</html>