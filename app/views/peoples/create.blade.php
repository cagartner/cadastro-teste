@extends('layout.main')

{{-- Script JS para adicionar campo de telefone --}}
@section('content')

	<h1>Cadastro de Pessoa</h1>


	{{ Former::vertical_open()->rules(array(
		'name' => 'required|max:255',
		'born' => 'date',
		'cpf'  => 'min:14|max:14',
		'rg'   => 'min:10',
	))->route('peoples.store')->method('POST'); }}

	<p>Informe os dados abaixo e clique em "Salvar"</p>

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
			
			{{ Former::text('phone[]', "Telefone")->class('form-control phone')->required()->id('fieldPhone') }}	

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