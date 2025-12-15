@extends('layouts.main')

@section('title', 'Criar evento')

@section('content')

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12">
            <div class="text-center mb-10">
                <h1 class="text-3xl font-extrabold text-gray-900">Crie seu Evento</h1>
                <p class="text-gray-500 mt-2">Preencha as informações abaixo para divulgar seu evento</p>
            </div>

            <form action="/events" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Capa do evento</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="image" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <ion-icon name="cloud-upload-outline" class="text-3xl text-gray-400 mb-2"></ion-icon>
                                <p class="text-sm text-gray-500">Clique para fazer upload da imagem</p>
                            </div>
                            <input id="image" name="image" type="file" class="hidden" />
                        </label>
                    </div>
                </div>

                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Nome do Evento</label>
                    <input type="text" name="title" id="title" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-orange focus:ring focus:ring-brand-orange/20 transition py-3" placeholder="Ex: Show de Rock">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Data</label>
                        <input type="datetime-local" name="date" id="date" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-orange focus:ring focus:ring-brand-orange/20 transition py-3">
                    </div>

                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700 mb-1">Cidade</label>
                        <input type="text" name="city" id="city" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-orange focus:ring focus:ring-brand-orange/20 transition py-3" placeholder="Ex: São Paulo, SP">
                    </div>
                </div>

                <div>
                    <label for="private" class="block text-sm font-medium text-gray-700 mb-1">Visibilidade</label>
                    <select name="private" id="private" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-orange focus:ring focus:ring-brand-orange/20 transition py-3 bg-white">
                        <option value="0">Público</option>
                        <option value="1">Privado</option>
                    </select>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Descrição</label>
                    <textarea name="description" id="description" rows="4" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-orange focus:ring focus:ring-brand-orange/20 transition" placeholder="O que vai acontecer no evento?"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">Infraestrutura</label>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @php $items = ['Cadeiras', 'Palco', 'Cerveja Grátis', 'Open Food', 'Brindes']; @endphp
                        @foreach($items as $item)
                            <div class="flex items-center">
                                <input type="checkbox" name="items[]" value="{{ $item }}" id="item-{{ $loop->index }}"
                                       class="rounded border-gray-300 text-brand-orange shadow-sm focus:border-brand-orange focus:ring focus:ring-brand-orange/20 h-5 w-5">
                                <label for="item-{{ $loop->index }}" class="ml-2 text-sm text-gray-600 cursor-pointer">{{ $item }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="pt-4">
                    <input type="submit" class="w-full bg-brand-dark hover:bg-gray-900 text-white font-bold py-4 rounded-xl shadow-md transition cursor-pointer" value="Criar Evento">
                </div>

            </form>
        </div>
    </div>

@endsection
