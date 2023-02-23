@extends('includes.header_footer')



@section('content')
    <div class="container">
        @if (!empty(session('status')))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                Loging
            </div>
            <div class="card-body">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text"
                            class="form-control @error('name')
                        border border-danger
                    @enderror"
                            name="name" id="" aria-describedby="helpId" value="{{ old('name') }}" placeholder="Enter name">

                        @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text"
                            class="form-control @error('email')
                        border border-danger
                    @enderror"
                            name="email" id="" aria-describedby="helpId" value="{{ old('email') }}"  placeholder="Enter email">

                        @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">password</label>
                        <input type="text"
                            class="form-control @error('password')
                        border border-danger
                    @enderror"
                            name="password" autocomplete="current-password" id="" aria-describedby="helpId"
                            placeholder="Enter password">

                        @error('password')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Confirm
                            Password</label>
                        <input type="text"
                            class="form-control @error('password_confirmation')
                        border border-danger
                    @enderror"
                            name="password_confirmation" autocomplete="password_confirmation" id=""
                            aria-describedby="helpId" placeholder="Enter password_confirmation">

                        @error('password_confirmation')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-secondary">Register</button>
                    </div>

                    <a href="{{ route('login') }}" class="btn btn-outline-secondary"><i
                            class="bi bi-arrow-left-circle  text-secondary mr-3"></i>Login</a>

                </form>

            </div>
        </div>
    </div>
@endsection





{{-- <x-guest-layout>
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

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
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
</x-guest-layout> --}}
