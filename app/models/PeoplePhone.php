<?php

class PeoplePhone extends \Eloquent {

	protected $table = 'people_phone';

	/**
	 * Regras de validação do estado de SC
	 * @var array
	 */
	public static $rules = array(
		'phone' => 'required|max:20'
	);

	/**
	 * Define ligação com a tabela People, ou seja, esse telefone
	 * pertence a uma pessoa.
	 */
	public function people()
    {
        return $this->belongsTo('People');
    }

	// Don't forget to fill this array
	protected $fillable = array('phone');

}