@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Adicionar novo site</h1>
			<form class="" action="/produtos" method="POST">
				<div class="form-group">
					
					<div class="col-md-12">
						<label for="nome">Digite a URL do Site</label>
						<input id="textinput" name="nome" type="text" placeholder="" class="form-control input-md">
						<span class="help-block">{{ ($errors->has('nome')) ? $errors->first('nome') : '' }}</span>  
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
					<label for="descricao">Digite detalhes sobre o site (Opcional)</label>
						<textarea class="form-control" id="textarea" name="descricao" ></textarea>
						<span class="help-block">{{ ($errors->has('descricao')) ? $errors->first('descricao') : '' }}</span>
					</div>
				</div>
				<p><br>
					<br>
				</p>
				
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="submit" name="name" value="Cadastrar">
			</form>
		</div>
	</div>
</div>

@endsection