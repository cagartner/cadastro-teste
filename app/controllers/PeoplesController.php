<?php
/**
 * Controller responsável por criar, editar e listar dados da tabela de pessoas (people)
 *
 * @author Carlos Augusto Gartner <contato@carlosgartner.com.br>
 * @package People
 */
class PeoplesController extends \BaseController {

	/**
	 * People Repository
	 *
	 * @var Enquete
	 */
	protected $people;

	public function __construct(People $people)
	{
		$this->people = $people;
	}

	/**
	 * Lista todas as pessoas
	 *
	 * @return Response
	 */
	public function index()
	{
		$query = People::whereRaw('name is not null');

		if (Input::has('name'))
			$query->where('name', 'like', '%' . Input::query('name') . '%');

		if (Input::has('born')) {
			$born = \DateTime::createFromFormat('d/m/Y', Input::query('born'));
			$query->where('born', '=', $born->format('Y-m-d'));
		}
		
		if (Input::has('created_at')) {
			$created_at = \DateTime::createFromFormat('d/m/Y', Input::query('created_at'));
			$query->whereRaw('date(created_at) = ?', array($created_at->format('Y-m-d')));
		}

		$peoples = $query->paginate(20)->appends(Input::except(array('page')));

		return View::make('peoples.index', compact('peoples'));
	}

	/**
	 * Tela de relatório onde lista todos os registros com paginação
	 *
	 * @return Response
	 */
	public function relatorio()
	{
		$query = People::whereRaw('name is not null');

		if (Input::has('name'))
			$query->where('name', 'like', '%' . Input::query('name') . '%');

		if (Input::has('born')) {
			$born = \DateTime::createFromFormat('d/m/Y', Input::query('born'));
			$query->where('born', '=', $born->format('Y-m-d'));
		}
		
		if (Input::has('created_at')) {
			$created_at = \DateTime::createFromFormat('d/m/Y', Input::query('created_at'));
			$query->whereRaw('date(created_at) = ?', array($created_at->format('Y-m-d')));
		}

		$peoples = $query->paginate(20)->appends(Input::except(array('page')));

		return View::make('peoples.relatorio', compact('peoples'));
	}

	/**
	 * Mostra formulário de cadastro
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Input::has('uf')) {
			Config::set('app.uf', Input::query('uf'));
			Session::put('uf', Input::query('uf'));
		}

		return View::make('peoples.create');
	}

	/**
	 * Salva novo cadastro
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Session::has('uf'))
			Config::set('app.uf', Session::get('uf'));

		// Altera formato da data para formato mysql
		$data = Input::except(array('phone'));
		$born = \DateTime::createFromFormat('d/m/Y', Input::get('born'));
		array_set($data, 'born', $born->format('Y-m-d'));		

		// Cria validação com os dados
		$validator = Validator::make($data, People::rules());

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		
		$data['uf'] = Config::get('app.uf');

		$people = $this->people->create($data);

		foreach (Input::get('phone') as $index => $phone) {
			$registro            = new PeoplePhone();
			$registro->phone     = $phone;
			$registro->people_id = $people->id;
			$registro->save();
		}

		return Redirect::route('peoples.index');
	}

	/**
	 * Exibe formulario de edição
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$people = People::find($id);

		Former::populate( array(
			'name' => $people->name,
			'cpf'  => $people->cpf,
			'rg'   => $people->rg,
			'born' => $people->born()
		));	

		return View::make('peoples.edit', compact('people'));
	}

	/**
	 * Salva dados alterados da edição	
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$people = $this->people->findOrFail($id);

		if (Session::has('uf'))
			Config::set('app.uf', Session::get('uf'));

		// Altera formato da data para formato mysql
		$data = Input::except(array('phone'));
		$born = \DateTime::createFromFormat('d/m/Y', Input::get('born'));
		array_set($data, 'born', $born->format('Y-m-d'));		

		// Cria validação com os dados
		$validator = Validator::make($data, People::rules());

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$born = \DateTime::createFromFormat('d/m/Y', Input::get('born'));

		array_set($data, 'born', $born->format('Y-m-d'));		
		$data['uf'] = Config::get('app.uf');

		$people->update($data);

		PeoplePhone::where('people_id', '=', $people->id)->delete();

		foreach (Input::get('phone') as $index => $phone) {
			$registro = new PeoplePhone();
			$registro->phone     = $phone;
			$registro->people_id = $people->id;
			$registro->save();
		}

		return Redirect::route('peoples.index');
	}

	/**
	 * Exclui registro
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		People::destroy($id);

		return Redirect::route('peoples.index');
	}

}