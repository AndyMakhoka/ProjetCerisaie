<!doctype html>
<html lang="fr">
    <head>
        {!! Html::style('assets/css/bootstrap.min.css') !!}
        {!! Html::style('assets/css/bootstrap.css') !!}
        {!! Html::style('assets/css/monStyle.css') !!}
        {!! Html::style('assets/css/jquery-ui.min.css') !!}
    </head>
    <body class="body">
        <div class="container">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a id="logo_LMD" class="navbar-brand" href="#"> <img src="assets/images/logoLMD.jpg" height="50px"></a>
                        <a class="navbar-brand" href="{{ url('/') }}">Cerisaie</a>
                    </div>
                    @if (Session::get('id') == 0)
                    <div class="collapse navbar-collapse" id="navbar-collapse-target">
                        <ul class="nav navbar-nav navbar-right">                             
                            <li><a href="{{ url('/getLogin') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Se connecter</a></li>
                        </ul> 
                    </div>
                    @endif
                    @if (Session::get('id') > 0)
                    <div class="nav navbar-nav">
                        <li>
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" 
                               aria-haspopup="true" aria-expanded="false">Séjour
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li> <a class="dropdown-item"  href="{{ url('/getListeSejour') }}">Lister Séjours</a></li>
                                <li> <a class="dropdown-item" href="{{ url('/ajoutSejour') }}">Ajouter</a> </li>    
                            </ul>
                        </li>
                    </div>
                    <ul class="nav navbar-nav navbar-right">                             
                        <li><a href="{{ url('/getLogout') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Se déconnecter</a></li>
                    </ul> 
                    @endif
                </div><!--/.container-fluid -->
            </nav>
            @yield('content')
        </div>    
        {!! Html::script('assets/js/bootstrap.js') !!}
        {!! Html::script('assets/js/bootstrap.min.js') !!}
        {!! Html::script('assets/js/ui-bootstrap-tpls.js')  !!}
        {!! Html::script('assets/js/jquery-3.1.1.js')  !!}
        {!! Html::script('assets/js/jquery-3.3.1.min.js')  !!}
        {!! Html::script('assets/js/jquery-ui.min.js')  !!}
        {!! Html::script('assets/js/npm.js')  !!}
        {!! Html::script('assets/js/bootstrap-hover-dropdown.js')  !!}
        <script>

            $(document).ready(function () {
                $("#topbar-container").dropdown();
            });
            $("body").bind("click", function (e) {
                $('.dropdown-toggle, .menu').parent("li").removeClass("open");
            });
            $(".dropdown-toggle, .menu").click(function (e) {
                var $li = $(this).parent("li").toggleClass('open');
                return false;
            });
        </script>
    </body>
</html>




























