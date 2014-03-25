@extends('layout.main')

{{-- Script JS para adicionar campo de telefone --}}
@section('content')

	<h1>Cadastro de Pessoa</h1>


	{{ Former::vertical_open()->rules(array(
		'name' => 'required|max:255|alpha',
		'born' => 'date',
		'cpf'  => 'min:14|max:14',
		'rg'   => 'min:10',
	))->method('POST'); }}

	<p>Informe os dados abaixo e clique em "Salvar"</p>

	<hr>
	
	<section class="row">
		
		<section class="col-md-8">

				{{ Former::text('name', "Nome:")->required() }}
				
				{{ Former::text('cpf', 'CPF:')->required() }}

				{{ Former::text('rg', 'RG:')->required() }}

				{{ Former::text('born', 'Data de nascimento:')->required() }}

		</section>

		<aside class="col-md-3">
			
			<strong>Cadastre ao menos um telefone: <br><small>Você pode cadastra mais que um se preferir</small></strong>
			<br>
			
			{{ Former::text('phone[]', "Telefone")->required()->id('fieldPhone') }}	

			<div class="return-more-phones"></div>			
			
			<a href="javascript:;" id="addPhoneField" class="btn btn-primary btn-block">Adicionar outro telefone</a>	

		</aside>

	</section>

	{{ Former::submit('Salvar pessoa')->class('btn btn-success') }}
	{{ HTML::link(URL::previous(), 'Voltar', array('class' => 'btn btn-default')) }}

	{{ Former::close() }}

@stop

{{-- Script JS para adicionar campo de telefone --}}
@section('script')
	
	<script>

	$(function () {

		$('#addPhoneField').click(function () {

			var target = $('.return-more-phones');



		});

	})

	</script>

@stop