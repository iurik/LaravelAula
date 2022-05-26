@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <p class="h2 text-center">Mensagem</p>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <ul class="list-unstyled">
            <h3><b>Ref. Ativ.:</b> {{$mensagem->atividade_id}}</h3>
            <li><p class="h1"><span class="badge badge-primary">{{$mensagem->titulo}}</span></p></li>           
            <li><p class="h4"> Descrição: <span class="badge badge-secondary">{{$mensagem->texto}}</span></p></li>
            <li><p class="h4"> Autor: <span class="badge badge-secondary">{{$mensagem->autor}}</span></p></li>
            <br>
            <br>
            <li><p class="h6">Código: <span class="badge badge-secondary">{{$mensagem->id}}</span></p></li>
            <li><p class="h6">Criada em: <span class="badge badge-info">{{$mensagem->created_at->format('d/m/Y h:m')}}</span></p></li>
            <li><p class="h6">Atualizada em: <span class="badge badge-info">{{$mensagem->updated_at->format('d/m/Y h:m')}}</span></p></li>
        </ul>
    </div>
</div>

<br>
<br>
@endsection



<!-- \Carbon\Carbon::parse($atividade->scheduledto)->format('d/m/Y h:m')  -->