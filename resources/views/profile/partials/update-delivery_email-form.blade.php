<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('配信先メールアドレスの変更') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("現在の配信先メールアドレス：") }}{{ $user->delivery_email }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update.delivery_email') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
    
        <div>
            <x-input-label for="delivery_email" :value="__('新しい配信先メールアドレス')" />
            <x-text-input id="delivery_email" name="delivery_email" type="email" class="mt-1 block w-full" :value="old('delivery_email', $user->delivery_email)" required autocomplete="delivery_email" />
            <x-input-error class="mt-2" :messages="$errors->get('delivery_email')" />
        </div>
    
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
    
            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>