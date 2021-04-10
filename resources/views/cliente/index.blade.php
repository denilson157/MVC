@extends('cliente.listagem')


@section('table')
@parent
<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Nascimento</th>
            <th>Email</th>
            <th>Telefone</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cli)

        <tr>
            <td>{{$cli->id}}</td>
            <td>{{$cli->nome}}</td>
            <td>{{$cli->nascimento}}</td>
            <td>{{$cli->email}}</td>
            <td>{{$cli->telefone}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
