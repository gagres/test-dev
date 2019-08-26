@extends('layouts.index')

@section('content')
    <div class="card ticket">
        <h1>
            Criar novo ticket
            <hr/>
        </h1>

        <form method="POST" action="/tickets">
            @csrf
            @if ($errors->any())
                @php
                    $errorMessages = $errors->messages();
                @endphp
            @endif
            <div class="form-row">
                <div class="col-6">
                    <input type="text"
                        name="client_name"
                        class="form-control {{ $errors->has('client_name') ? 'is-invalid' : '' }}"
                        placeholder="Nome do cliente"
                        value="{{ old('client_name') }}">
                    <div class="invalid-feedback">
                        {{ $errors->has('client_name') ? $errorMessages['client_name'][0] : '' }}
                    </div>
                </div>
                <div class="col-6">
                    <input type="email"
                        name="client_email"
                        class="form-control col-12 {{ $errors->has('client_email') ? 'is-invalid' : '' }}"
                        placeholder="E-mail do cliente"
                        value="{{ old('client_email') }}">
                    <div class="invalid-feedback">
                        {{ $errors->has('client_email') ? $errorMessages['client_email'][0] : '' }}
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">
                    <input type="number"
                        name="order_number"
                        class="form-control {{ $errors->has('order_number') ? 'is-invalid' : '' }}"
                        placeholder="Número do pedido"
                        value="{{ old('order_number') }}">
                    <div class="invalid-feedback">
                        {{ $errors->has('order_number') ? $errorMessages['order_number'][0] : '' }}
                    </div>
                </div>
                <div class="col-6">
                    <input type="text"
                        name="title"
                        class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                        placeholder="Título do ticket"
                        value="{{ old('title') }}">
                    <div class="invalid-feedback">
                        {{ $errors->has('title') ? $errorMessages['title'][0] : '' }}
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12">
                    <textarea name="content"
                        class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}"
                        placeholder="Conteúdo do ticket">{{ old('content') }}</textarea>
                    <div class="invalid-feedback">
                        {{ $errors->has('content') ? $errorMessages['content'][0] : '' }}
                    </div>
                </div>
            </div>
            <div class="form-row">
                <button class="btn btn-primary">Finalizar</button>
            </div>
        </form>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger mt-3">
                <span>{{ session('error') }}</span>
            </div>
        @endif


        @if(session('warning'))
            <div class="alert alert-warning mt-3">
                <span>{{ session('warning') }}</span>
            </div>
        @endif
    </div>
@endsection()
