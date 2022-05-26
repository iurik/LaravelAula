@extends('layouts.app')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<p class="h1 text-center">Excluir Mensagem {{$mensagem->id}}</p>
			<hr>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<form action="/mensagens/{{$mensagem->id}}" method="post">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}
				<p class="h3 text-center">Deseja excluir a mensagem : {{$mensagem->titulo}}?</p>
				<br>
				<p class="text-center"><button type="submit" class="btn btn-danger btn-lg">Deletar</button></p>
			</form>
			<br>
			<br>
			<br>
		</div>
	</div>
@endsection