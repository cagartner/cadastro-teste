@extends('layout.main')

{{-- Script JS para adicionar campo de telefone --}}
@section('content')

	<h1>Edição de {{ $people->name }}</h1>


	{{ Former::vertical_open()->rules(array(
		'name' => 'required|max:255',
		'born' => 'date',
		'cpf'  => 'min:14|max:14',
		'rg'   => 'min:10',
	))->route('peoples.update', $people->id)->method('PATCH'); }}

	<p>Atualize os dados necessários abaixo e clique em "Salvar"</p>

	<hr>
	
	<section class="row">
		
		<section class="col-md-8">

				{{ Former::text('name', "Nome:")->required() }}
				
				{{ Former::text('cpf', 'CPF:')->class('form-control cpf')->required() }}

				@if (Config::get('app.uf') == 'sc')
					{{ Former::text('rg', 'RG:')->help('Somente números')->required() }}

					{{ Former::text('born', 'Data de nascimento:')->class('form-control date')->required() }}
				@else
					{{ Former::text('rg', 'RG:')->help('Somente números') }}

					{{ Former::text('born', 'Data de nascimento:')->class('form-control date')->help('Você precisa ser maior de idade para se cadastrar')->required() }}
				@endif	
		</section>

		<aside class="col-md-3">
			
			<strong>Cadastre ao menos um telefone: <br><small>Você pode cadastra mais que um se preferir</small></strong>
			<br>
			
			@if ($people->phones->count())
				@foreach ($people->phones as $index => $phone)
					<div class="form-group required" style="display: block;"><label for="fieldPhone" class="control-label">Telefone<sup>*</sup></label>

					@if ($index == 1)
						<a href="javascript:;" class="btn btn-sm btn-danger pull-right removeInputPhone" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-remove"></i></a>
					@endif					

					<input class="form-control phone" required="true" id="fieldPhone" type="text" name="phone[]" value="{{ $phone->phone }}"></div>
				@endforeach
			@else

			{{ Former::text('phone[]', "Telefone")->class('form-control phone')->required()->id('fieldPhone') }}	

			@endif

			<div class="return-more-phones"></div>			
			
			<a href="javascript:;" id="addPhoneField" class="btn btn-primary btn-block">Adicionar outro telefone</a>	

		</aside>

	</section>
	
	<p>Campos com (*) são obrigatórios</p>
	<br>

	{{ Former::submit('Salvar pessoa')->class('btn btn-success') }}
	{{ HTML::link(URL::previous(), 'Voltar', array('class' => 'btn btn-default')) }}

	{{ Former::close() }}

@stop

{{-- Script JS para adicionar campo de telefone --}}
@section('script')
	
	{{-- Adiciona script para máscara de input --}}
	{{ HTML::script('js/jquery.maskedinput.min.js') }}
	{{ HTML::script('js/people.js') }}

@stop