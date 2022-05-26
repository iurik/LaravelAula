@extends('layouts.app')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<p class="h1 text-center">Deletar Atividade {{$atividade->id}}</p>
			<hr>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<form action="/atividades/{{$atividade->id}}" method="POST">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}
				<p class="h3 text-center">Você realmente deseja excluir o registro: {{$atividade->title}}?</p>
				<br>
				<p class="text-center"><button type="submit" class="btn btn-danger btn-lg">Deletar</button></p>
			</form>
			<br>
			<br>
			<br>
		</div>
	</div>
@endsection