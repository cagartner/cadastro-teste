<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasTelefoneTable extends Migration {

	/**
	 * Cria tabela de telefones
	 * 
	 * Rodar no cmd php artisan migrate
	 * @return void
	 */
	public function up()
	{
		// Cria tabela de telefones, já que uma pessoa pode ter vários telefones
		Schema::create('people_phone', function($table)
		{
		    $table->increments('id'); // Chave primária
		    $table->string('phone', 20);
		    $table->timestamps();
		});

		// Cria coluna com foreign key para a tabela de pessoas
		Schema::table('people_phone', function ($table) {
			$table->integer('people_id')->unsigned()->nullable();
			$table->foreign('people_id')->references('id')->on('people')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Volta a migração
	 *
	 * @return void
	 */
	public function down()
	{
		// Remove foreign key e remove coluna
		Schema::table('people_phone', function($table){
	       $table->dropForeign('people_id');
	       $table->dropColumn('people_id');
	   });
   		
   	 	// Exclui tabela
	   Schema::drop('people_phone');
	}

}
