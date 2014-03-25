<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="shortcut icon" href="../../assets/ico/favicon.ico"> -->

    <title>Sistema para cadastro de pessoas SC-PR</title>

    <!-- Bootstrap core CSS -->
    {{ HTML::style('css/bootstrap.min.css') }}

    <!-- Custom styles for this template -->
    {{ HTML::style('css/style.css') }}
    @section('style')
    @show

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      {{HTML::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}
      {{HTML::script('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')}}
    <![endif]-->
  </head>

  <body>

    @include('include/navigation')

    <div class="container">

    @yield('content')

    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js')}}
    {{HTML::script('js/bootstrap.min.js')}}
    @section('script')
    @show

  </body>
</html>
