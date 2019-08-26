@extends('layouts.index')

@section('content')
    <div class="card dashboard">
        <h1>
            Lista de tickets
            <hr/>
        </h1>

        <form class="form-inline mb-4" method="GET" action="/">
            @csrf
            <div class="form-group">
                <input type="email"
                    class="form-control"
                    name="client_email"
                    placeholder="E-mail do cliente"
                    value="{{ old('client_email') }}">
            </div>
            <div class="form-group pl-2">
                <input type="text"
                    class="form-control"
                    name="order_number"
                    placeholder="Número do pedido"
                    value="{{ old('order_number') }}">
            </div>
            <div class="form-group pl-2">
                <button class="btn btn-primary">Confirmar</button>
            </div>
            <div class="form-group pl-2">
                <a href="/" class="btn btn-secondary">Limpar</a>
            </div>
        </form>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"># Ticket</th>
                    <th scope="col"># Pedido</th>
                    <th scope="col">Título do pedido</th>
                    <th scope="col">E-mail do cliente</th>
                    <th scope="col">Data de criação do ticket</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @if ($tickets->count())
                    @foreach($tickets as $ticket)
                        <tr>
                            <td scope="row">{{ $ticket->id }}</td>
                            <td>{{ $ticket->order_number }}</td>
                            <td>{{ $ticket->title }}</td>
                            <td>
                                <a href="/?client_email={{ $ticket->client->email }}">
                                    {{ $ticket->client->email }}
                                </a>
                            </td>
                            <td>{{ $ticket->created_at }}</td>
                            <td><a href="/tickets/{{ $ticket->id }}">Ver mais</a></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" scope="row" colspan="5">
                            <h3>Não há nenhum ticket para ser mostrado</h3>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $tickets->appends(request()->input())->links() }}
    </div>
@endsection
