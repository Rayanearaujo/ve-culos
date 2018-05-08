@extends('layouts.layout')

@section('content')

    <div class="row mb-10">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Detalhes do Veículo</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Veículo:</strong>
                {{ $vehicle->veiculo }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Marca:</strong>
                {{ $vehicle->marca }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ano:</strong>
                {{ $vehicle->ano }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição:</strong>
                {{ $vehicle->descricao }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Vendido:</strong>
                @if($vehicle->vendido == 1)
                    Sim
                @else
                    Não
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Última Atualização:</strong>
                {{ $vehicle->updated_at->format('d/m/Y H:m:s') }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Criação:</strong>
                {{ $vehicle->created_at->format('d/m/Y H:m:s') }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="pull-right">
            <button class="btn btn-default"><a class="icon-buttons" href="{{ route('veiculos.index') }}">Voltar</a></button>
            <a class="btn btn-primary" href="{{ route('veiculos.edit', $vehicle->id) }}">Editar</a>
        </div>
    </div>

@endsection