@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <p class="h2 text-center">Detalhes da Atividade</p>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <ul class="list-unstyled">
            <li><p class="h2"><span class="badge badge-primary">{{$atividade->title}}</span></p></li>
            <li><p class="h5">Agendado para: <span class="badge badge-warning">{{\Carbon\Carbon::parse($atividade->scheduledto)->format('d/m/Y h:m')}}</span></p></li>
            <li><p class="h5"> Descrição: <span class="badge badge-secondary">{{$atividade->description}}</span></p></li>
            <br>
            <br>
            <li><p class="h6">Código: <span class="badge badge-secondary">{{$atividade->id}}</span></p></li>
            <li><p class="h6">Criada em: <span class="badge badge-info">{{$atividade->created_at->format('d/m/Y h:m')}}</span></p></li>
            <li><p class="h6">Atualizada em: <span class="badge badge-info">{{$atividade->updated_at->format('d/m/Y h:m')}}</span></p></li>
        </ul>
    </div>
</div>

<br>
<br>

<div class="row">
    <div class="col-md-12">
        <p class="h4">Mensagens Relacionadas:</p>
        <table id="tabela" name="tabela"  class="table table-striped ">
            <thead>
               <tr>
                    <td>Data</td>
                    <td>Título</td>
                    <td>Texto</td>
                </tr>
            </thead>
            <tbody>
                @foreach($atividade->mensagens as $msg)
        	        <tr>
        	            <td>{{$msg->created_at->format("d/m/Y")}}</td>
        	            <td><a href="/mensagens/{{$msg->id}}">{{$msg->titulo}}</a></td>
        	            <td>{{$msg->texto}}</td>
        	        </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection



<!-- \Carbon\Carbon::parse($atividade->scheduledto)->format('d/m/Y h:m')  -->