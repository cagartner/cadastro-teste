<?php

class People extends \Eloquent {

	protected $table = 'people';

	/**
	 * Regras de validação do estado de SC
	 * @var array
	 */
	public static $rulesSC = array(
		'name' => 'required|max:255',
		'cpf'  => 'required|cpf',
		'rg'   => 'required|numeric|min:1',
		'born' => 'required|date_format:Y-m-d',
	);

	/**
	 * Regras de validação para o estado do PR
	 * @var array
	 */
	public static $rulesPR = array(
		'name' => 'required:max:255',
		'cpf'  => 'required|cpf',
		'rg'   => 'numeric',
		'born' => 'required|date_format:Y-m-d|minimum_age:18',
	);

	// Don't forget to fill this array
	protected $fillable = array('name','cpf','rg','born','uf');

	/**
     * Altera formato de exibição
     * @return string Data formatada
     */
    public function born() {
		$data = \DateTime::createFromFormat('Y-m-d', $this->born);    
		return $data->format('d/m/Y');
    }

    /**
     * Altera formato de exibição
     * @return string Data formatada
     */
    public function created_at() {
		$data = \DateTime::createFromFormat('Y-m-d H:i:s', $this->created_at);    
		return $data->format('d/m/Y H:i');
    }

    /**
     * Liga tabela de pessoas com tabela de telefone
     *
     * Uma pessoa pode ter muitos telefones
     */
    public function phones()
    {
        return $this->hasMany('PeoplePhone');
    }

    /**
     * Pegas regras a ser aplicada de acordo com o uf definido na configuração
     * @return Array 
     */
    public static function rules() {
    	switch (Config::get('app.uf', 'sc')) {
    		case 'sc':
    			return self::$rulesSC;
    			break;
    		
    		case 'pr':
    			return self::$rulesPR;
    			break;
    	}
    }
}