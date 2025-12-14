@extends('layouts.main')

@section('title', 'HDC Events | Home')

@section('content')

    @csrf

    <div id="search-container" class="col-md-12 text-center">
        <h1>Busque um evento</h1>
    <form action="/" method="GET" class="search-form w-50 mx-auto">
            <div class="input-group input-group-lg shadow-sm rounded-pill overflow-hidden">
                <input type="text" id="search" name="search" class="form-control border-0 ps-4" placeholder="Procurar evento...">
                <button class="btn btn-primary px-4 fw-bold" type="submit">Buscar</button>
            </div>
        </form>
    </div>

    <div id="events-container" class="container">

        <div class="col-md-12 my-4">
            @if($search)
                <h2>Buscando por: <span class="text-primary">{{ $search }}</span></h2>
                <p class="subtitle">Resultados encontrados para sua pesquisa</p>
                <a href="/" class="btn btn-outline-secondary btn-sm mt-2">
                    <ion-icon name="refresh-outline"></ion-icon> Ver todos os eventos
                </a>
            @else
                <h2>Próximos Eventos</h2>
                <p class="subtitle">Veja o que vai rolar nos próximos dias</p>
            @endif

        </div>


        @if($events->isNotEmpty())
            <div id="cards-container" class="row g-4">
                @foreach($events as $event)
                    <div class="col-md-3">
                        <div class="card card-hover h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                            <img src="{{ asset($event->image) }}" alt="{{ $event->title }}">
                            <div class="card-body d-flex flex-column">
                                <p class="card-date text-primary fw-bold small"> {{ date('d/m/Y'), strtotime($event->date)}}</p>
                                <h5 class="card-title">{{ $event->title }}</h5>
                                <p class="card-participants text-muted small">X Participantes</p>
                                <a href="/events/{{ $event->id }}" class="btn btn-primary mt-auto">Saber mais</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="d-flex justify-content-center">
                <div class="card text-center shadow-sm border-0 p-4" style="max-width: 400px;">
                    <h5 class="text-muted mb-2">😕 Nenhum evento por aqui</h5>
                    <p class="mb-0 text-secondary">
                        Não há eventos disponíveis no momento.
                    </p>
                </div>
            </div>
         @endif

    </div>

@endsection
