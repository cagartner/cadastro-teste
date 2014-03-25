<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasTable extends Migration {

	/**
	 * Cria tabela na migração
	 * 
	 * Rodar no cmd php artisan migrate
	 *
	 * @return void
	 */
	public function up()
	{
		// Cria tabela de pessoas
		Schema::create('people', function($table)
		{
		    $table->increments('id');
		    $table->string('name');
		    $table->string('cpf', 20);
		    $table->string('rg', 20);
		    $table->date('born');
		    $table->timestamps();
		});
	}

	
	/**
	 * Deleta tabela no rollback 
	 * 
	 * @return void
	 */
	public function down()
	{
		Schema::drop('people');
	}

}
