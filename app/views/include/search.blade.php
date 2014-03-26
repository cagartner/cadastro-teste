{{ Form::open(array('method' => 'GET', 'route' => $route, 'class' => 'form-inline')) }}

	<p>Filtrar listagem</p>

	<div class="form-group">
		<label class="sr-only" for="exampleInputEmail2">Nome</label>
		{{ Form::text('name', Input::query('name'), array('placeholder' => 'Por um nome', 'class' => 'form-control')) }}
	</div>

	<div class="form-group">
		<label class="sr-only" for="exampleInputEmail2">Data de nascimento</label>
		{{ Form::text('born', Input::query('born'), array('placeholder' => 'Por data de nascimento', 'class' => 'form-control date')) }}
	</div>

	<div class="form-group">
		<label class="sr-only" for="exampleInputEmail2">Data de cadastro</label>
		{{ Form::text('created_at', Input::query('created_at'), array('placeholder' => 'Por data de cadastro', 'class' => 'form-control date')) }}
	</div>
	
    {{ Form::submit('Buscar', array('class' => 'btn btn-default')) }}

    @if (Input::has('name') || Input::has('born') || Input::has('created_at'))
    	<br>
		{{ HTML::linkRoute( $route, 'Limpar busca') }}
	@endif

{{ Form::close() }}