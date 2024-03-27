<x-action-section>
    <x-slot name="title">
        {{ __('Autentikasi Dua Faktor') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Tambahkan keamanan tambahan ke akun Anda menggunakan autentikasi dua faktor.') }}
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium text-gray-900">
            @if ($this->enabled)
                @if ($showingConfirmation)
                    {{ __('Selesaikan pengaktifan autentikasi dua faktor.') }}
                @else
                    {{ __('Anda telah mengaktifkan autentikasi dua faktor.') }}
                @endif
            @else
                {{ __('Anda belum mengaktifkan autentikasi dua faktor.') }}
            @endif
        </h3>

        <div class="mt-3 max-w-xl text-sm text-gray-600">
            <p>
                {{ __('Ketika autentikasi dua faktor diaktifkan, Anda akan diminta token acak yang aman selama autentikasi. Anda dapat mendapatkan token ini dari aplikasi Google Authenticator di ponsel Anda.') }}
            </p>
        </div>

        @if ($this->enabled)
            @if ($showingQrCode)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        @if ($showingConfirmation)
                            {{ __('Untuk menyelesaikan pengaktifan autentikasi dua faktor, pindai kode QR berikut menggunakan aplikasi otentikator ponsel Anda atau masukkan kunci pengaturan dan berikan kode OTP yang dihasilkan.') }}
                        @else
                            {{ __('Autentikasi dua faktor kini telah diaktifkan. Pindai kode QR berikut menggunakan aplikasi otentikator ponsel Anda atau masukkan kunci pengaturan.') }}
                        @endif
                    </p>
                </div>

                <div class="mt-4 p-2 inline-block bg-white">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>

                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        {{ __('Kunci Pengaturan') }}: {{ decrypt($this->user->two_factor_secret) }}
                    </p>
                </div>

                @if ($showingConfirmation)
                    <div class="mt-4">
                        <label for="code" class="form-label">{{ __('Kode') }}</label>
                        <input id="code" type="text" name="code" class="form-control" inputmode="numeric" autofocus autocomplete="one-time-code"
                            wire:model="code"
                            wire:keydown.enter="confirmTwoFactorAuthentication" />
                        <x-input-error for="code" class="mt-2" />
                    </div>
                @endif
            @endif

            @if ($showingRecoveryCodes)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        {{ __('Simpan kode pemulihan ini di manajer kata sandi yang aman. Kode ini dapat digunakan untuk memulihkan akses ke akun Anda jika perangkat autentikasi dua faktor Anda hilang.') }}
                    </p>
                </div>

                <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        <div class="mt-5">
            @if (! $this->enabled)
                <x-confirms-password wire:then="enableTwoFactorAuthentication">
                    <button type="button" class="btn btn-danger" wire:loading.attr="disabled">
                        {{ __('Aktifkan') }}
                    </button>
                </x-confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    <x-confirms-password wire:then="regenerateRecoveryCodes">
                        <button type="button" class="btn btn-secondary me-3" wire:loading.attr="disabled">
                            {{ __('Buat Ulang Kode Pemulihan') }}
                        </button>
                    </x-confirms-password>
                @elseif ($showingConfirmation)
                    <x-confirms-password wire:then="confirmTwoFactorAuthentication">
                        <button type="button" class="btn btn-primary me-3" wire:loading.attr="disabled">
                            {{ __('Konfirmasi') }}
                        </button>
                    </x-confirms-password>
                @else
                    <x-confirms-password wire:then="showRecoveryCodes">
                        <button type="button" class="btn btn-secondary me-3" wire:loading.attr="disabled">
                            {{ __('Tampilkan Kode Pemulihan') }}
                        </button>
                    </x-confirms-password>
                @endif

                @if ($showingConfirmation)
                    <x-confirms-password wire:then="disableTwoFactorAuthentication">
                        <button type="button" class="btn btn-secondary" wire:loading.attr="disabled">
                            {{ __('Batal') }}
                        </button>
                    </x-confirms-password>
                @else
                    <x-confirms-password wire:then="disableTwoFactorAuthentication">
                        <button type="button" class="btn btn-danger" wire:loading.attr="disabled">
                            {{ __('Nonaktifkan') }}
                        </button>
                    </x-confirms-password>
                @endif

            @endif
        </div>
    </x-slot>
</x-action-section>
