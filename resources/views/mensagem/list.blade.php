@extends('layouts.app')

@section('content')
<p class="h1 text-center">Lista de Mensagens</p>

  <!-- EXIBE MENSAGENS DE SUCESSO -->
  @if(\Session::has('success'))
	<div class="container">
  		<div class="alert alert-success">
    		{{\Session::get('success')}}
  		</div>
  	</div>
  @endif

  <!-- EXIBE MENSAGENS DE ERROS -->
  @if ($errors->any())
  <div class="container">
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  </div>
  @endif

<div class="container">
@foreach($mensagens as $mensagem)
  <br>
  <div class="row">
    <div class="col-md-12">
	   <p class="h3"><a href="/mensagens/{{$mensagem->id}}">{{$mensagem->titulo}}</a></p>
	   <p class="h5">{{$mensagem->texto}}</b></p>

      @auth
        <p class="h7">Ações: 
          <a class="btn btn-outline-primary btn-sm" href="/mensagens/{{$mensagem->id}}">Ver Mais</a>
          <a class="btn btn-outline-primary btn-sm" href="/mensagens/{{$mensagem->id}}/edit">Editar</a> 
          <a class="btn btn-outline-primary btn-sm" href="/mensagens/{{$mensagem->id}}/delete">Deletar</a>
        </p>
      @endauth
    </div>
  </div>
  <br>
@endforeach
</div>

<div class="container">
  <div class="row justify-content-center">
        {{ $mensagens->links() }}
  </div>
</div>

@auth
<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <p class="text-center"><a class="btn btn-primary" href="/mensagens/create">Criar nova mensagem</a></p>
    </div>
</div>
</div>
@endauth

@endsection
