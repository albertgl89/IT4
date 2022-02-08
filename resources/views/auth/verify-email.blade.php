<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-black font-heebo">
            {{ __('Gràcies per registrar-te! Abans de començar, ens agradaria que confirmessis la teva adreça de correu electrònic
            fent clic a l\'enllaç que t\'acabem d\'enviar al teu correu. Si no l\'has rebut, te\'n podem enviar un altre.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('S\'ha enviat un nou enllaç de verificació a l\'adreça facilitada durant el registre.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Torna a enviar enllaç de verificació') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Sortir') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
