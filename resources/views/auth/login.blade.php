@extends('layouts.app')

@section('content')
    <div class="w-full max-w-xs mx-auto">
        <form method="POST" action="{{ route('login') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    E-mail
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email"
                    autofocus placeholder="E-mail">

                @error('email')
                <p class="text-red-500 text-xs italic">
                    {{ $message }}
                </p>
                @enderror

            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Senha
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    id="password" name="password" type="password" required placeholder="******************">

                @error('password')
                <p class="text-red-500 text-xs italic">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Entrar
                </button>
            </div>
        </form>
    </div>
@endsection
