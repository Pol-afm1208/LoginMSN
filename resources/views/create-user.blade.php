<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register User') }}
        </h2>
    </x-slot>

    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full max-w-sm bg-white rounded-lg shadow-lg p-6">
            <form method="POST" action="{{ route('register.user') }}" class="text-center">
                @csrf
    
                <!-- Nombre -->
                <div class="mb-4">
                    <x-label for="name" value="{{ __('Nombre') }}" class="block text-left text-gray-700" />
                    <x-input id="name" class="block mx-auto mt-1 w-3/4 border-gray-300 rounded-md" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>
    
                <!-- Email -->
                <div class="mb-4">
                    <x-label for="email" value="{{ __('Correo Electrónico') }}" class="block text-left text-gray-700" />
                    <x-input id="email" class="block mx-auto mt-1 w-3/4 border-gray-300 rounded-md" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>
    
                <!-- Selección de Rol -->
                <div class="mb-4">
                    <x-label for="role" value="{{ __('Rol') }}" class="block text-left text-gray-700" />
                    <select id="role" name="role" class="mt-1 mx-auto block w-3/4 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        <option value="superadmin" {{ old('role') == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                        <option value="institucional" {{ old('role') == 'institucional' ? 'selected' : '' }}>Institucional</option>
                        <option value="privado" {{ old('role') == 'privado' ? 'selected' : '' }}>Privado</option>
                        <option value="directivo" {{ old('role') == 'directivo' ? 'selected' : '' }}>Directivo</option>
                    </select>
                </div>
    
                <!-- Contraseña -->
                <div class="mb-4">
                    <x-label for="password" value="{{ __('Contraseña') }}" class="block text-left text-gray-700" />
                    <x-input id="password" class="block mx-auto mt-1 w-3/4 border-gray-300 rounded-md" type="password" name="password" required autocomplete="new-password" />
                </div>
    
                <!-- Confirmar Contraseña -->
                <div class="mb-4">
                    <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" class="block text-left text-gray-700" />
                    <x-input id="password_confirmation" class="block mx-auto mt-1 w-3/4 border-gray-300 rounded-md" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>
    
                <!-- Términos y Condiciones -->
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mb-4">
                        <x-label for="terms">
                            <div class="flex items-center justify-center">
                                <x-checkbox name="terms" id="terms" required />
                                <div class="ml-2 text-gray-700 text-sm">
                                    {!! __('Acepto los :terms_of_service y la :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-indigo-600 hover:text-indigo-800">'.__('Términos del servicio').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-indigo-600 hover:text-indigo-800">'.__('Política de privacidad').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif
    
                <!-- Botón de Registro -->
                <div class="flex items-center justify-center mt-6">
                    <x-button class="ml-4">
                        {{ __('Registrarse') }}
                    </x-button>
                </div>
    
                <div class="mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('¿Ya estás registrado?') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
    
    
</x-app-layout>
