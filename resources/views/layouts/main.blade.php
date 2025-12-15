<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            orange: '#F2A340',
                            dark: '#353E48',
                        }
                    },
                    fontFamily: {
                        sans: ['Roboto', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <style>
        body { background-color: #f3f4f6; }
        .msg-flash { animation: fadeOut 4s forwards; }
        @keyframes fadeOut {
            0% { opacity: 1; }
            80% { opacity: 1; }
            100% { opacity: 0;display: none;}
        }
    </style>

    <link rel="icon" href="/img/logo.png" type="image/png">
</head>
<body class="font-sans antialiased text-gray-700 flex flex-col min-h-screen">

<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex-shrink-0 flex items-center gap-2">
                <a href="/" class="flex items-center gap-2">
                    <img src="/img/logo.png" alt="VioliEvents" class="w-10"> <span class="font-bold text-brand-dark text-xl tracking-tight">Violi Events</span>
                </a>
            </div>

            <nav class="hidden md:flex space-x-8">
                <a href="/" class="text-gray-500 hover:text-brand-orange px-3 py-2 font-medium transition">Eventos</a>
                <a href="/events/create" class="text-gray-500 hover:text-brand-orange px-3 py-2 font-medium transition">Criar Evento</a>
                @auth
                    <a href="/dashboard" class="text-gray-500 hover:text-brand-orange px-3 py-2 font-medium transition">Meus Eventos</a>
                    <form action="/logout" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-500 hover:text-brand-orange px-3 py-2 font-medium transition">Sair</button>
                    </form>
                @endauth
                @guest
                    <a href="/login" class="text-gray-500 hover:text-brand-orange px-3 py-2 font-medium transition">Entrar</a>
                    <a href="/register" class="text-gray-500 hover:text-brand-orange px-3 py-2 font-medium transition">Cadastrar</a>
                @endguest
            </nav>
        </div>
    </div>
</header>

<main class="flex-grow">
    @if(session('msg'))
        <div class="msg-flash fixed top-20 left-1/2 transform -translate-x-1/2 bg-green-100 border border-green-400 text-green-700 px-6 py-3 rounded shadow-lg z-50">
            {{ session('msg') }}
        </div>
    @endif

    @yield('content')
</main>

<footer class="bg-brand-dark text-white text-center py-6 mt-12">
    <p class="text-sm opacity-75">&copy; 2024 VioliEvents. Todos os direitos reservados.</p>
</footer>

<script src="scripts/script.js"></script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
