@extends('layouts.main')

@section('title', $event->title)

@section('content')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2">

                <div class="relative h-96 lg:h-auto">
                    <img src="{{ asset($event->image) }}" class="absolute inset-0 w-full h-full object-cover" alt="{{ $event->title }}">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent lg:hidden"></div>
                    <div class="absolute bottom-0 left-0 p-6 text-white lg:hidden">
                        <h1 class="text-3xl font-bold">{{ $event->title }}</h1>
                    </div>
                </div>

                <div class="p-8 lg:p-12">
                    <div class="hidden lg:block">
                        <h1 class="text-4xl font-extrabold text-gray-900 mb-6">{{ $event->title }}</h1>
                    </div>

                    <div class="space-y-4 mb-8">
                        <div class="flex items-center text-gray-700">
                            <ion-icon name="location-outline" class="text-2xl text-brand-orange mr-3"></ion-icon>
                            <span class="font-medium">{{ $event->city }}</span>
                        </div>

                        <div class="flex items-center text-gray-700">
                            <ion-icon name="people-outline" class="text-2xl text-brand-orange mr-3"></ion-icon>
                            <span class="font-medium">{{ count($event->users) }} Participantes</span>
                        </div>

                        <div class="flex items-center text-gray-700">
                            <ion-icon name="calendar-outline" class="text-2xl text-brand-orange mr-3"></ion-icon>
                            <span class="font-medium">{{ date('d/m/Y', strtotime($event->date)) }} às {{ date('H:i', strtotime($event->date)) }}</span>
                        </div>

                        <div class="flex items-center text-gray-700">
                            <ion-icon name="star-outline" class="text-2xl text-brand-orange mr-3"></ion-icon>
                            <span class="font-medium">Organizador: <span class="font-bold">{{ $user->name }}</span></span>
                        </div>
                    </div>

                    <form action="/events/join/{{ $event->id }}" method="POST" class="mb-10">
                        @csrf
                        <button type="submit" class="w-full bg-brand-orange hover:bg-orange-600 text-white text-lg font-bold py-4 rounded-xl shadow-lg transform transition hover:-translate-y-1 flex justify-center items-center gap-2">
                            <ion-icon name="checkmark-circle-outline" class="text-2xl"></ion-icon> Confirmar Presença
                        </button>
                    </form>

                    @if(!empty($event->items))
                        <div class="mb-8">
                            <h3 class="text-lg font-bold text-gray-900 mb-4 border-l-4 border-brand-orange pl-3">O evento conta com:</h3>
                            <ul class="grid grid-cols-2 gap-3">
                                @foreach($event->items as $item)
                                    <li class="flex items-center text-gray-600 bg-gray-50 p-2 rounded-lg">
                                        <ion-icon name="play-outline" class="text-brand-orange mr-2"></ion-icon>
                                        {{ $item }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div>
                        <h3 class="text-lg font-bold text-gray-900 mb-3 border-l-4 border-brand-orange pl-3">Sobre o evento:</h3>
                        <p class="text-gray-600 leading-relaxed text-justify">
                            {{ $event->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
