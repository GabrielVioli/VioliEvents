@extends('layouts.main')

@section('title', 'VioliEvents | Home')

@section('content')

    <div class="relative bg-brand-dark overflow-hidden h-[450px]">
        <div class="absolute inset-0">
            <img class="w-full h-full object-cover opacity-30" src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="Events Background">
            <div class="absolute inset-0 bg-gradient-to-r from-brand-dark to-transparent mix-blend-multiply"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col justify-center items-center text-center">
            <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight mb-6">
                Busque um <span class="text-brand-orange">evento</span>
            </h1>

            <form action="/" method="GET" class="w-full max-w-2xl">
                <div class="relative">
                    <input type="text" name="search" id="search"
                           class="w-full pl-6 pr-32 py-4 rounded-full border-none focus:ring-4 focus:ring-brand-orange/50 shadow-2xl text-lg text-gray-800 placeholder-gray-400"
                           placeholder="O que você procura?">
                    <button type="submit" class="absolute right-2 top-2 bg-brand-orange hover:bg-orange-600 text-white font-bold py-2 px-6 rounded-full transition duration-300">
                        Buscar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="border-b border-gray-200 pb-5 mb-10 flex justify-between items-end">
            <div>
                @if($search)
                    <h2 class="text-3xl font-bold text-gray-800">Buscando por: <span class="text-brand-orange">{{ $search }}</span></h2>
                    <a href="/" class="text-sm text-gray-500 hover:text-brand-orange mt-2 inline-flex items-center gap-1">
                        <ion-icon name="arrow-undo-outline"></ion-icon> Limpar busca
                    </a>
                @else
                    <h2 class="text-3xl font-bold text-gray-800">Próximos Eventos</h2>
                    <p class="text-gray-500 mt-1">Veja o que vai rolar nos próximos dias</p>
                @endif
            </div>
        </div>

        @if(count($events) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($events as $event)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group flex flex-col h-full">

                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ asset($event->image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-brand-orange shadow-sm">
                                {{ date('d/m', strtotime($event->date)) }}
                            </div>
                        </div>

                        <div class="p-6 flex flex-col flex-grow">
                            <p class="text-xs font-bold text-brand-orange uppercase tracking-wide mb-1">
                                {{ date('d/m/Y', strtotime($event->date)) }}
                            </p>
                            <h5 class="text-xl font-bold text-gray-900 mb-2 leading-tight">{{ $event->title }}</h5>

                            <div class="flex items-center text-gray-500 text-sm mb-4">
                                <ion-icon name="people-outline" class="mr-1 text-brand-orange"></ion-icon>
                                {{ count($event->users) }} Participantes
                            </div>

                            <a href="/events/{{ $event->id }}" class="mt-auto w-full block text-center bg-gray-100 hover:bg-brand-orange hover:text-white text-gray-800 font-semibold py-3 rounded-xl transition duration-300">
                                Saber mais
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-xl shadow-sm p-12 text-center border border-gray-100">
                <ion-icon name="calendar-clear-outline" class="text-6xl text-gray-300 mb-4"></ion-icon>
                <h3 class="text-xl font-medium text-gray-900">Nenhum evento encontrado</h3>
                <p class="text-gray-500 mt-2">Não há eventos disponíveis no momento para esta busca.</p>
            </div>
        @endif
    </div>

@endsection
