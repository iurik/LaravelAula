@extends('layouts.app')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<p class="h1 text-center">Editar Mensagem</p>
			<hr>
			</p>
		</div>
	</div>

	   <!--MENSAGENS DE ERROS -->
	  @if ($errors->any())
		<div class="row">
		  <div class="alert alert-danger">
		    <ul>
		      @foreach ($errors->all() as $error)
		      <li>{{ $error }}</li>
		      @endforeach
		    </ul>
		  </div>
		</div>
	  @endif

	<div class="row">
		<div class="col-md-12">
			<form action="/mensagens/{{$mensagem->id}}" method="POST">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="form-group row">
					<label class="col-form-label col-form-label-lg" for="title">Título</label>
					<input class="form-control form-control-lg" type="text" id="titulo" name="titulo" value="{{$mensagem->titulo}}">
					<small id="titleHelp" class="form-text text-muted">Coloque um título para sua atividade</small>
				</div>
				<div class="form-group row">
					<label class="col-form-label col-form-label-lg" for="description">Texto</label>
					<input class="form-control form-control-lg" type="text" id="description" name="description" value="{{$mensagem->texto}}">
				</div>
				<div class="form-group row">
					<label class="col-form-label col-form-label-lg" for="description">Autor</label>
					<input class="form-control form-control-lg" type="text" id="autor" name="autor" value="{{$mensagem->autor}}">
				</div>
				<div class="form-group row">
					<label class="col-form-label col-form-label-lg" for="scheduledto">Atividade</label>
					<select class="form-control form-control-lg" name='atividade_id' id="atividade_id" value="{{$mensagem->atividade_id}}">
						@foreach($atividades as $atividade)
							<option value="{{$atividade->id}}">{{$atividade->title}}</option>
						@endforeach
					</select><br>
				</div>

				<button type="submit" class="btn btn-primary">Salvar</button>
			</form>
		</div>
	</div>
@endsection