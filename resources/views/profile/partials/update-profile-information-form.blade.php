<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
            <x-input-label for="bio" :value="__('bio')" />
            <x-text-input id="bio" name="bio" type="text" class="mt-1 block w-full" :value="old('bio', $user->bio)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
        <x-input-label for="speciality" :value="__('Spécialité')" />
        <x-text-input id="speciality" name="speciality" type="text" class="mt-1 block w-full" :value="old('specialite', $user->speciality)" required />
        <x-input-error class="mt-2" :messages="$errors->get('specialite')" />
    </div>

    <div>
    <x-input-label for="photo" :value="__('Photo de profil actuelle')" />
    
    <div class="mt-2 mb-4">
        @if($user->photo)
            <img src="{{ asset('storage/' . $user->photo) }}" alt="Profile" class="h-20 w-20 rounded-full object-cover border">
        @else
            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}" class="h-20 w-20 rounded-full border">
        @endif
    </div>

    <input type="file" name="photo" id="photo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
    <x-input-error class="mt-2" :messages="$errors->get('photo')" />
</div>


    <hr class="my-6 border-t border-gray-200">
        <h3 class="text-md font-bold text-gray-700 uppercase">{{ __('Informations Professionnelles (CV)') }}</h3>

        <div class="mt-4">
            <x-input-label for="titre" :value="__('Titre Professionnel')" />
            <x-text-input id="titre" name="titre" type="text" class="mt-1 block w-full" :value="old('titre', $user->profile->titre ?? '')" placeholder="ex: Ingénieur État en Informatique" />
            <x-input-error class="mt-2" :messages="$errors->get('titre')" />
        </div>

        <div class="mt-4">
            <x-input-label for="formation" :value="__('Formation')" />
            <textarea id="formation" name="formation" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3">{{ old('formation', $user->profile->formation ?? '') }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('formation')" />
        </div>

        <div class="mt-4">
            <x-input-label for="experiences" :value="__('Expériences')" />
            <textarea id="experiences" name="experiences" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="4">{{ old('experiences', $user->profile->experiences ?? '') }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('experiences')" />
        </div>

        <div class="mt-4">
            <x-input-label for="competences" :value="__('Compétences')" />
            <x-text-input id="competences" name="competences" type="text" class="mt-1 block w-full" :value="old('competences', $user->profile->competences ?? '')" placeholder="PHP, Laravel, Git, Docker..." />
            <x-input-error class="mt-2" :messages="$errors->get('competences')" />
        </div>





        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
