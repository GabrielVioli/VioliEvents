@extends('layouts.main')

@section('title', 'Criar evento')

@section('content')

    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Crie o seu evento</h1>

        <form action="/events" method="POST" enctype="multipart/form-data" id="form-evento">
            @csrf

            <div class="mb-3">
                <label for="image" class="form-label">Capa do evento:</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento">
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Data do evento:</label>
                <input type="datetime-local" class="form-control" id="date" name="date">
            </div>

            <div class="mb-3">
                <label for="city" class="form-label">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento">
            </div>

            <div class="mb-3">
                <label for="private" class="form-label">O evento é privado?</label>
                <select name="private" id="private" class="form-select">
                    <option value="0">Não (Público)</option>
                    <option value="1">Sim (Privado)</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrição:</label>
                <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Itens de infraestrutura:</label>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="items[]" value="Cadeiras" id="cadeiras">
                    <label class="form-check-label" for="cadeiras">Cadeiras</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="items[]" value="Palco" id="palco">
                    <label class="form-check-label" for="palco">Palco</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="items[]" value="Cerveja Grátis" id="openbeer">
                    <label class="form-check-label" for="openbeer">Cerveja Grátis</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="items[]" value="Open Food" id="openfood">
                    <label class="form-check-label" for="openfood">Open Food</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="items[]" value="Brindes" id="brindes">
                    <label class="form-check-label" for="brindes">Brindes</label>
                </div>
            </div>

            <input type="submit" class="btn btn-primary" value="Criar Evento">

        </form>
    </div>

@endsection
