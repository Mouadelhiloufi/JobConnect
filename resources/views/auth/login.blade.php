<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'identifier | Jobly</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">

    <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
        <div class="mt-8 mb-6">
            <h1 class="text-3xl font-bold text-blue-700">Jobly<span class="text-blue-500 text-4xl">.</span></h1>
        </div>

        <div class="w-full sm:max-w-md bg-white shadow-xl rounded-lg px-8 py-10 border border-gray-100">
            <h2 class="text-3xl font-semibold mb-2">S'identifier</h2>
            <p class="text-sm text-gray-600 mb-8">Tirez le meilleur parti de votre vie professionnelle</p>

            @if ($errors->any())
                <div class="mb-4 text-red-600 text-sm bg-red-50 p-3 rounded">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-5">
                    <label for="email" class="block text-sm text-gray-700 mb-1">E-mail</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                        class="w-full px-4 py-3 border border-gray-400 rounded focus:ring-2 focus:ring-blue-600 focus:outline-none text-lg">
                </div>

                <div class="mb-5 relative">
                    <label for="password" class="block text-sm text-gray-700 mb-1">Mot de passe</label>
                    <input id="password" type="password" name="password" required 
                        class="w-full px-4 py-3 border border-gray-400 rounded focus:ring-2 focus:ring-blue-600 focus:outline-none text-lg">
                    <button type="button" class="absolute right-4 bottom-3 text-blue-600 font-semibold hover:underline">Afficher</button>
                </div>

                <div class="flex items-center mb-6">
                    <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500 h-5 w-5">
                    <label for="remember_me" class="ml-2 text-sm text-gray-600 font-medium">Se souvenir de moi</label>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 rounded-full hover:bg-blue-700 transition text-lg mb-6 shadow-md">
                    S'identifier
                </button>

                <div class="flex items-center space-x-2 mb-6">
                    <div class="flex-1 h-px bg-gray-300"></div>
                    <span class="text-gray-500 text-sm">ou</span>
                    <div class="flex-1 h-px bg-gray-300"></div>
                </div>

                <button type="button" class="w-full flex items-center justify-center space-x-3 border border-gray-400 py-3 rounded-full hover:bg-gray-50 transition font-semibold text-gray-700 mb-4">
                    <img src="https://www.svgrepo.com/show/355037/google.svg" class="h-5 w-5" alt="">
                    <span>Continuer avec Google</span>
                </button>
            </form>

            <div class="text-center mt-6">
                <p class="text-gray-600">Nouveau sur Jobly ? 
                    <a href="{{ route('register') }}" class="text-blue-600 font-bold hover:underline">S'inscrire</a>
                </p>
            </div>
        </div>
        
        <div class="mt-8 flex space-x-4 text-xs text-gray-500">
            <a href="#" class="hover:underline">Contrat d’utilisation</a>
            <a href="#" class="hover:underline">Politique de confidentialité</a>
            <a href="#" class="hover:underline">Aide</a>
        </div>
    </div>

</body>
</html>