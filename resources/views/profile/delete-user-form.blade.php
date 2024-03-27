<x-action-section>
    <x-slot name="title">
        {{ __('Hapus Akun') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Hapus akun Anda secara permanen.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Setelah akun Anda dihapus, semua sumber daya dan data akan dihapus secara permanen. Sebelum menghapus akun Anda, harap unduh data atau informasi apa pun yang ingin Anda pertahankan.') }}
        </div>

        <div class="mt-5">
            <button type="button" class="btn btn-danger" wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('Hapus Akun') }}
            </button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-dialog-modal wire:model.live="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Hapus Akun') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Apakah Anda yakin ingin menghapus akun Anda? Setelah akun Anda dihapus, semua sumber daya dan data akan dihapus secara permanen. Harap masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun Anda secara permanen.') }}

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <input type="password" class="form-control" autocomplete="current-password" placeholder="{{ __('Kata Sandi') }}" x-ref="password" wire:model="password" wire:keydown.enter="deleteUser" />
                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <button type="button" class="btn btn-secondary" wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('Batal') }}
                </button>

                <button type="button" class="btn btn-danger ms-3" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('Hapus Akun') }}
                </button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
