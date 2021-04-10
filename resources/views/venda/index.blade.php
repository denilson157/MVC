@extends('venda.listagem')


@section('table')
@parent
<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Data</th>
            <th>Valor</th>
            <th>Cliente ID (necessita melhoria)</th>
            <th>Funcionario Id (necessita melhoria)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vendas as $vend)

        <tr>
            <td>{{$vend->id}}</td>
            <td>{{$vend->data_venda}}</td>
            <td>{{$vend->valor}}</td>
            <td>{{$vend->cliente_id}}</td>
            <td>{{$vend->funcionario_id}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
