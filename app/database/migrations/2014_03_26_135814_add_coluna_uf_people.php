<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColunaUfPeople extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Cria coluna com foreign key para a tabela de pessoas
		Schema::table('people', function ($table) {
			$table->string('uf', 2);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Remove foreign key e remove coluna
		Schema::table('people', function($table){
	       $table->dropColumn('uf');
	   });
	}

}
