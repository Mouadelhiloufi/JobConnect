<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire | Jobly</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">

    <div class="min-h-screen flex flex-col items-center py-12">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-blue-700">Jobly<span class="text-blue-500 text-4xl">.</span></h1>
        </div>

        <div class="w-full sm:max-w-2xl bg-white shadow-xl rounded-lg px-8 py-10 border border-gray-100">
            <h2 class="text-3xl font-semibold mb-2 text-center">S'inscrire</h2>
            <p class="text-sm text-gray-600 mb-8 text-center">Rejoignez votre communauté professionnelle dès aujourd'hui</p>

            @if ($errors->any())
                <div class="mb-4 text-red-600 text-sm bg-red-50 p-3 rounded">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm text-gray-700 mb-1 font-medium">Nom</label>
                        <input type="text" name="name" value="{{ old('name') }}" required 
                            class="w-full px-4 py-2 border border-gray-400 rounded focus:ring-2 focus:ring-blue-600 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-700 mb-1 font-medium">Prénom</label>
                        <input type="text" name="lastname" value="{{ old('firstname') }}" required 
                            class="w-full px-4 py-2 border border-gray-400 rounded focus:ring-2 focus:ring-blue-600 focus:outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm text-gray-700 mb-1 font-medium">E-mail</label>
                        <input type="email" name="email" value="{{ old('email') }}" required 
                            class="w-full px-4 py-2 border border-gray-400 rounded focus:ring-2 focus:ring-blue-600 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-700 mb-1 font-medium">Téléphone</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" 
                            class="w-full px-4 py-2 border border-gray-400 rounded focus:ring-2 focus:ring-blue-600 focus:outline-none">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-sm text-gray-700 mb-1 font-medium">Je suis un :</label>
                    <select name="role" class="w-full px-4 py-2 border border-gray-400 rounded focus:ring-2 focus:ring-blue-600 focus:outline-none bg-white font-semibold text-blue-700">
                        <option value="chercheur">Chercheur d'emploi (Spécialiste)</option>
                        <option value="recruteur">Recruteur (Entreprise)</option>
                    </select>
                </div>

                

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-sm text-gray-700 mb-1 font-medium">Mot de passe</label>
                        <input type="password" name="password" required 
                            class="w-full px-4 py-2 border border-gray-400 rounded focus:ring-2 focus:ring-blue-600 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-700 mb-1 font-medium">Confirmer le mot de passe</label>
                        <input type="password" name="password_confirmation" required 
                            class="w-full px-4 py-2 border border-gray-400 rounded focus:ring-2 focus:ring-blue-600 focus:outline-none">
                    </div>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 rounded-full hover:bg-blue-700 transition text-lg shadow-md mb-4">
                    Accepter et s'inscrire
                </button>

                <p class="text-xs text-gray-500 text-center px-4">
                    En cliquant sur Accepter et s'inscrire, vous acceptez les <span class="text-blue-600 font-semibold cursor-pointer hover:underline">Conditions d'utilisation</span>.
                </p>
            </form>

            <div class="text-center mt-6">
                <p class="text-gray-600">Déjà sur Jobly ? 
                    <a href="{{ route('login') }}" class="text-blue-600 font-bold hover:underline">S'identifier</a>
                </p>
            </div>
        </div>
    </div>

</body>
</html>