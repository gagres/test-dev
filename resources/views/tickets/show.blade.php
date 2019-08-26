@extends('layouts.index')

@section('content')
    <div class="card ticket-info">
        @if (!empty($ticket))
            <h1>
                <span class="badge badge-secondary"># {{ $ticket->id }}</span>
                {{ $ticket->title }}
                <hr/>
            </h1>
            <p>{{ $ticket->content }}</p>
            <p><b>Clinte: </b>{{ $ticket->client->name }}</p>
            <p><b>Data de criação: </b>{{ $ticket->created_at }}</p>
            <p><b>Última atualização: </b>{{ $ticket->updated_at }}</p>
        @endif
    </div>
@endsection
