@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="pull-left">
            <h2>Veículos</h2>
        </div>
    </div>

    <div class="row">
        <div class="pull-right mb-20">
            <a class="btn btn-primary" href="{{ route('veiculos.create') }}">Adicionar</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover">
                <tr>
                    <th>Veículo</th>
                    <th>Marca</th>
                    <th>Ano</th>
                    <th>Descrição</th>
                    <th>Vendido</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicle->veiculo }}</td>
                        <td>{{ $vehicle->marca }}</td>
                        <td>{{ $vehicle->ano }}</td>
                        <td>{{ $vehicle->descricao }}</td>
                        <td>
                            @if($vehicle->vendido == 1)
                                Sim
                            @else
                                Não
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('veiculos.destroy',$vehicle->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-default"><a class="icon-buttons" href="{{ route('veiculos.show', $vehicle->id) }}"><i class="fa fa-eye"></i></a></button>
                                <button type="button" class="btn btn-default"><a class="icon-buttons" href="{{ route('veiculos.edit',$vehicle->id) }}"><i class="fa fa-pencil"></i></a></button>
                                <button type="submit" class="btn btn-default"><i class="fa fa-trash-o"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection