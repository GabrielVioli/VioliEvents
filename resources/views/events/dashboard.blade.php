@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-12">
            <div class="px-8 py-6 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                <h1 class="text-2xl font-bold text-gray-800">Meus Eventos</h1>
                <a href="/events/create" class="text-sm font-bold text-brand-orange hover:text-orange-600 flex items-center gap-1">
                    <ion-icon name="add-circle-outline" class="text-lg"></ion-icon> Novo Evento
                </a>
            </div>

            <div class="p-0">
                @if(count($events) > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                            <tr class="bg-gray-100 text-gray-600 uppercase text-xs leading-normal">
                                <th class="py-4 px-6">#</th>
                                <th class="py-4 px-6">Nome</th>
                                <th class="py-4 px-6 text-center">Participantes</th>
                                <th class="py-4 px-6 text-right">Ações</th>
                            </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm">
                            @foreach($events as $event)
                                <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                                    <td class="py-4 px-6 whitespace-nowrap font-medium">{{ $loop->index + 1 }}</td>
                                    <td class="py-4 px-6">
                                        <a href="/events/{{ $event->id }}" class="font-bold text-gray-800 hover:text-brand-orange transition">{{ $event->title }}</a>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <span class="bg-blue-100 text-blue-600 py-1 px-3 rounded-full text-xs font-bold">{{ count($event->users) }}</span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center justify-end gap-2">
                                            <a href="/events/edit/{{ $event->id }}" class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded text-xs font-bold transition flex items-center gap-1">
                                                <ion-icon name="create-outline"></ion-icon> Editar
                                            </a>
                                            <form action="/events/{{ $event->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded text-xs font-bold transition flex items-center gap-1">
                                                    <ion-icon name="trash-outline"></ion-icon> Deletar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="p-10 text-center">
                        <p class="text-gray-500 mb-4">Você ainda não tem eventos criados.</p>
                        <a href="/events/create" class="inline-block bg-brand-orange text-white font-bold py-2 px-6 rounded-lg hover:bg-orange-600 transition">Criar primeiro evento</a>
                    </div>
                @endif
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="px-8 py-6 border-b border-gray-100 bg-gray-50">
                <h1 class="text-2xl font-bold text-gray-800">Inscrições Confirmadas</h1>
            </div>

            <div class="p-0">
                @if(count($eventsAsMembers) > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                            <tr class="bg-gray-100 text-gray-600 uppercase text-xs leading-normal">
                                <th class="py-4 px-6">#</th>
                                <th class="py-4 px-6">Nome</th>
                                <th class="py-4 px-6 text-center">Participantes</th>
                                <th class="py-4 px-6 text-right">Ações</th>
                            </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm">
                            @foreach($eventsAsMembers as $event)
                                <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                                    <td class="py-4 px-6 whitespace-nowrap font-medium">{{ $loop->index + 1 }}</td>
                                    <td class="py-4 px-6">
                                        <a href="/events/{{ $event->id }}" class="font-bold text-gray-800 hover:text-brand-orange transition">{{ $event->title }}</a>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <span class="bg-green-100 text-green-600 py-1 px-3 rounded-full text-xs font-bold">{{ count($event->users) }}</span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center justify-end">
                                            <form action="/events/leave/{{ $event->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-gray-200 hover:bg-red-500 hover:text-white text-gray-600 py-1 px-3 rounded text-xs font-bold transition flex items-center gap-1 group">
                                                    <ion-icon name="log-out-outline" class="group-hover:text-white"></ion-icon> Sair do Evento
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="p-10 text-center">
                        <p class="text-gray-500 mb-4">Você não está participando de nenhum evento.</p>
                        <a href="/" class="text-brand-orange font-bold hover:underline">Ver eventos disponíveis</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
