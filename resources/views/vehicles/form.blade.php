@extends('layouts.layout')

@section('content')

    <div class="row mb-10">
        <div class="pull-left">
            <h2>{{$update ? 'Editar Veículo' : 'Cadastrar Veículo'}}</h2>
        </div>
    </div>

    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong>houve um problema ao cadastrar o veículo.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="row">
        <form action="{{ $update ? route('veiculos.update', $vehicle->id) : route('veiculos.store')}}" method="POST">
            @csrf
            @if($update)
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Veículo:</strong>
                        <input type="text" name="veiculo" value="{{ old('veiculo', optional($vehicle)->veiculo) }}" class="form-control" placeholder="Veículo">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Marca:</strong>
                        <input type="text" name="marca" value="{{ old('marca', optional($vehicle)->marca) }}" class="form-control" placeholder="Marca">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Ano:</strong>
                        <input type="number" name="ano" value="{{ old('ano', optional($vehicle)->ano) }}" class="form-control" placeholder="Ano">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Descrição:</strong>
                        <textarea class="form-control" style="height:150px" name="descricao" placeholder="Escreva uma descrição para o veículo...">{{ old('descricao', optional($vehicle)->descricao) }}</textarea>
                    </div>
                </div>
                <div class="custom-control custom-checkbox">
                    <label class="custom-control-label" for="vendido">Vendido</label>
                    <input type="checkbox" class="custom-control-input" id="vendido" name="vendido" value="1"  @if($update) @if($vehicle->vendido) checked @endif @endif>
                </div>

                <div class="row">
                    <div class="pull-right">
                        <button class="btn btn-default"><a class="icon-buttons" href="{{ route('veiculos.index') }}">Voltar</a></button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection