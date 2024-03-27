<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Perbarui Kata Sandi') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Pastikan akun Anda menggunakan kata sandi yang panjang dan acak untuk tetap aman.  (Dinonaktifkan untuk Peran Staff untuk Mencegah Penyalahgunaan)') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <label for="current_password" class="form-label">{{ __('Kata Sandi Saat Ini') }}</label>
            <input id="current_password" type="password" class="form-control w-100" wire:model="state.current_password" autocomplete="current-password" readonly />
            <x-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <label for="password" class="form-label">{{ __('Kata Sandi Baru') }}</label>
            <input id="password"  type="password" class="form-control w-100" wire:model="state.password" autocomplete="new-password"  readonly/>
            <x-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <label for="password_confirmation" class="form-label">{{ __('Konfirmasi Kata Sandi') }}</label>
            <input id="password_confirmation" type="password" class="form-control w-100" wire:model="state.password_confirmation" autocomplete="new-password" readonly />
            <x-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Tersimpan.') }}
        </x-action-message>

        <button type="submit" class="btn btn-danger">
            {{ __('Simpan') }}
        </button>
    </x-slot>
</x-form-section>
