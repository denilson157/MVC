@extends('layouts.externo')
@section('title', 'Quadro de Avisos da Empresa')
@section('sidebar')
@parent
<p>^ ^ Barra superior adicionada do layout pai/m&atilde;e ^ ^ </p>
@endsection
@section('content')
<p>Quadro de Avisos da Empresa</p>
@endsection

<label>
    @if($mostrar)
    <!-- @foreach($avisos as $aviso)
            <p>Aviso #{{$aviso['id']}}: {{$aviso['texto']}}</p>
        @endforeach -->

    <?php
    foreach ($avisos as $aviso) {
        echo "<p>Aviso #{$aviso['id']}: {$aviso['texto']}</p>";
    }
    ?>
    @else
    nada exibido
    @endif
</label>
