<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>
            {{-- Phone --}}
            <div class="mt-4">
                <x-label for="phone" :value="__('Phone')" />
                <x-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')"
                    required />
            </div>
            <div class="mt-4">
                <x-label for="alergi" :value="__('Alergi 1 ')" />
                <select name="alergi_1" class="block mt-1 w-full" id="" required>
                    <option value=""> -- Tidak ada alergi --</option>
                    @foreach ($alergi as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
                <span>
                    <small>*Masukkan data  jika anda memiliki alergi terhadap suatu produk.</small>
                </span>
            </div>
            <div class="mt-4">
                <x-label for="alergi" :value="__('Alergi 2 ')" />
                <select name="alergi_2" class="block mt-1 w-full" id="" required>
                    <option value=""> -- Tidak ada alergi --</option>
                    @foreach ($alergi as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
                <span>
                    <small>*Masukkan data  jika anda memiliki alergi terhadap suatu produk.</small>
                </span>
            </div>
            <div class="mt-4">
                <x-label for="alergi" :value="__('Alergi 3 ')" />
                <select name="alergi_3" class="block mt-1 w-full" id="" required>
                    <option value=""> -- Tidak ada alergi --</option>
                    @foreach ($alergi as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
                <span>
                    <small>*Masukkan data  jika anda memiliki alergi terhadap suatu produk.</small>
                </span>
            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
