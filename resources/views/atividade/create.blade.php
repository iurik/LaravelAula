@extends('layouts.app')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<p class="h1 text-center">Formulário de Cadastro de Atividade</p>
			<hr>
			</p>
		</div>
	</div>

	  <!-- EXIBE MENSAGENS DE ERROS -->
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
			<form action="/atividades" method="post">
				{{ csrf_field() }}
				<div class="form-group row">
					<label class="col-form-label col-form-label-lg" for="title">Título</label>
					<input class="form-control form-control-lg" type="text" id="title" name="title">
					<small id="titleHelp" class="form-text text-muted">Coloque um título para sua atividade</small>
				</div>
				<div class="form-group row">
					<label class="col-form-label col-form-label-lg" for="description">Descrição</label>
					<input class="form-control form-control-lg" type="text" id="description" name="description">
				</div>
				<div class="form-group row">
					<label class="col-form-label col-form-label-lg" for="scheduledto">Data/Hora da atividade</label>
					<input class="form-control form-control-lg" type="datetime-local" id="scheduledto" name="scheduledto">
					<small id="scheduledtoHelp" class="form-text text-muted">Use o formato: 2018-12-30 10:10:10</small>
				</div>

				<button type="submit" class="btn btn-primary">Salvar</button>
			</form>
		</div>
	</div>
@endsection

