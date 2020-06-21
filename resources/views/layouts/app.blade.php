<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Medição</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .input {
            transition: border 0.2s ease-in-out;
            min-width: 280px
        }

        .input:focus + .label,
        .input:active + .label,
        .input.filled + .label {
            font-size: .75rem;
            transition: all 0.2s ease-out;
            top: -0.1rem;
            color: #667eea;
        }

        .label {
            transition: all 0.2s ease-out;
            top: 0.4rem;
            left: 0;
        }
    </style>
</head>
<body>
<div id="app" class="text-gray-900 bg-gray-200 min-h-screen">

    @auth()
        <div class="hidden md:block bg-white md:border-b">
            <div class="container mx-auto px-4">
                <div class="md:flex">
                    <div class="flex -mb-px w-full mr-8">
                        <div href="#"
                             class="no-underline md:text-indigo-600 flex items-center py-4 border-b border-blue-dark">
                            <svg class="h-6 w-6 fill-current mr-2" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                      d="M3.889 3h6.222a.9.9 0 0 1 .889.91v8.18a.9.9 0 0 1-.889.91H3.89A.9.9 0 0 1 3 12.09V3.91A.9.9 0 0 1 3.889 3zM3.889 15h6.222c.491 0 .889.384.889.857v4.286c0 .473-.398.857-.889.857H3.89C3.398 21 3 20.616 3 20.143v-4.286c0-.473.398-.857.889-.857zM13.889 11h6.222a.9.9 0 0 1 .889.91v8.18a.9.9 0 0 1-.889.91H13.89a.9.9 0 0 1-.889-.91v-8.18a.9.9 0 0 1 .889-.91zM13.889 3h6.222c.491 0 .889.384.889.857v4.286c0 .473-.398.857-.889.857H13.89C13.398 9 13 8.616 13 8.143V3.857c0-.473.398-.857.889-.857z"></path>
                            </svg>
                            Histórico de medições
                        </div>

                        <a class="ml-auto no-underline md:text-indigo-600 flex items-center py-4 border-b border-blue-dark"
                           href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sair
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth

    <main class="block w-full py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
