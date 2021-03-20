@extends('funcionario.listagem')


@section('table')
@parent
<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Email</th>
            <th>Telefone</th>
        </tr>
    </thead>
    <tbody>
        @foreach($funcionarios as $func)

        <tr>
            <td>{{$func->id}}</td>
            <td>{{$func->nome}}</td>
            <td>{{$func->endereco}}</td>
            <td>{{$func->email}}</td>
            <td>{{$func->telefone}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
