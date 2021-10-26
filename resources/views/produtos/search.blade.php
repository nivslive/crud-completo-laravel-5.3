@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Itens</h1>
            <p>{{ Session::get('message') }}</p>

            
            <form class="" action="" method="POST">

				<div class="form-group">
					
					<div class="col-md-12">
						<label for="nome">Digite a URL do Site</label>
						<input id="textinput" name="nome" type="text" placeholder="" class="form-control input-md">
						<span class="help-block">{{ ($errors->has('nome')) ? $errors->first('nome') : '' }}</span>  

                          <input type="checkbox" id="hifen" name="hifen" value="hifen">
                             <label for="hifen">Exceto Hifens</label>
                            <input type="checkbox" id="number" name="number" value="number">
                           <label for="number">Exceto Numeros</label><br>
					</div>



                    <span>Quantidade de Caracteres</span><br>
                    <label for="quantidade">Minimo</label>
						<input style="display:flex" id="filtro_minimo" name="filtro_minimo" type="text" placeholder="" class="form-control input-md">

                    <label for="quantidade"> Máximo </label>

                    <input id="textinput" name="filtro_maximo" type="text" placeholder="" class="form-control input-md">
               
</select>
				</div>
			
				<p><br>
					<br>
				</p>
				
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="submit" name="name" value="Buscar">
                <a href="/produtos">Voltar. </a>
			</form>

            <table class="table table-bordered table-hover table-condensed">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            URL Site
                        </th>
                        <th>
                            Descrição
                        </th>
                        
                        <th>
                        Editar
                        </th>
                        <th>
                            Ver
                        </th>
                        <th>
                        Deletar
                        </th>
                    </tr>
                </thead>
                <tbody>

                    


            @if(!empty($todosprodutos))
                @foreach($todosprodutos as $produto)
                    <tr>
                        <td>
                            {{ $produto -> id }}
                        </td>
                        <td>
                            {{ $produto -> nome }}
                        </td>
                        <td>
                            {{ $produto -> descricao }}
                        </td>
                        
                        <td>
                            <a href="/produtos/{{ $produto->id }}/edit">Editar</a>
                        </td>
                        <td>
                            <a href="/produtos/{{ $produto->id }}"> <span class="glyphicon glyphicon-eye-open"></span></a>
                        </td>
                        <td>
                            <form action="/produtos/{{ $produto->id }}" method="POST">
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" name="name" value="Apagar">
                            </form>
                        </td>
                    </tr>
                    @endforeach
            @endif




                </tbody>
            </table>
            
        </div>
    </div>
</div>
@endsection