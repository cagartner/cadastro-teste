@extends('layout.main')

@section('content')

<h1>Pessoas</h1>

<div class="row">
	<div class="col-md-12 text-right">
		{{ HTML::linkRoute('peoples.create', 'Cadastrar Pessoa de SC', 'uf=sc', array('class' => 'btn btn-info')) }}
		{{ HTML::linkRoute('peoples.create', 'Cadastrar Pessoa de PR', 'uf=pr', array('class' => 'btn btn-info')) }}
	</div>
</div>

<br>

@if ($peoples->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Nome</th>
				<th class="text-right">CPF</th>
				<th class="text-right">RG</th>
				<th class="text-right">Data de nascimento</th>
				<th class="text-right">Data de cadastro</th>
				<th>UF</th>
				<th class="text-right">Telefone(s)</th>
				<th width="5%"></th>
				<th width="5%"></th>
			</tr>
		</thead>

		<tbody>
			@foreach ($peoples as $people)
				<tr>
					<td>{{ $people->name }}</td>
					<td class="text-right">{{ $people->cpf }}</td>
					<td class="text-right">{{ $people->rg }}</td>
					<td class="text-right">{{ $people->born() }}</td>
					<td class="text-right">{{ $people->created_at() }}h</td>
					<td>{{ strtoupper($people->uf) }}</td>
					<td class="text-right">						
						@foreach ($people->phones as $phone)
							&num; {{$phone->phone}} <br>
						@endforeach
					</td>
                    <td>{{ link_to_route('peoples.edit', 'Editar', array($people->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('peoples.destroy', $people->id))) }}
                            {{ Form::submit('Deletar', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
	<?php echo $peoples->links('include.pagination'); ?>

@else
	<p class="alert alert-info">Não há pessoas cadastradas</p>
@endif

@stop

{{-- Script JS para adicionar campo de telefone --}}
@section('script')
	
	{{-- Adiciona script para máscara de input --}}
	{{ HTML::script('js/jquery.maskedinput.min.js') }}
	{{ HTML::script('js/people.js') }}

@stop