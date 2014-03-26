@section('navigation')
  <div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Trocar navegação</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Cadastro de pessoas</a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li {{ Request::is('peoples*') ? 'class="active"' : '' }}>{{ HTML::linkRoute('peoples.index', "Home")}}</a></li>
          <li {{ Request::is('relatorio') ? 'class="active"' : '' }}>{{ HTML::link('relatorio', "Relatório")}}</li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
@show