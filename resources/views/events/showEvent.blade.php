@extends('layouts.main')

@section('title', $event->title)

@section('content')

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="{{asset($event->image)}}" class="img-fluid" alt="{{ $event->title }}">
            </div>

            <div id="info-container" class="col-md-6">
                <h1>{{ $event->title }}</h1>

                <p class="event-city">
                    <ion-icon name="location-outline"></ion-icon> {{ $event->city }}
                </p>

                <p class="events-participants">
                    <ion-icon name="people-outline"></ion-icon> X Participantes
                </p>

                <p class="event-owner">
                    <ion-icon name="star-outline"></ion-icon> Dono do Evento: {{$user->name}}
                </p>

                <p>
                    <ion-icon name="calendar-outline"></ion-icon> {{date('d/m/Y', strtotime($event->date))}}
                </p>

                <p>
                    <ion-icon name="time-outline"></ion-icon> {{date('H:i', strtotime($event->date))}}
                </p>
                @if(!empty($event->items))

                <div class="mt-4">
                    <h3 class="fs-5 fw-bold mb-3">O evento conta com:</h3>
                    <ul id="item-list" class="list-unstyled">
                        @foreach($event->items as $item)
                                <li class="d-flex align-items-center mb-2 fs-6">
                                    <ion-icon name="play-outline" class="text-primary me-2"></ion-icon>
                                    {{ $item }}
                                </li>
                        @endforeach
                    </ul>
                </div>

                @endif

                @csrf
                <form action="/events/join/{{ $event->id }}" method="POST">
                    @csrf

                    <button type="submit" class="btn btn-primary" id="event-submit">
                        Confirmar Presença
                    </button>
                </form>

                <div class="mt-4">
                    <h3>Sobre o evento:</h3>
                    <p class="event-description">{{ $event->description }}</p>
                </div>
            </div>
        </div>
    </div>

@endsection
