<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <title>ERSland - @yield('title')</title>

    

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta name="apple-mobile-web-app-capable" content="yes">    

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-responsive.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ui-lightness/jquery-ui-1.10.0.custom.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/base-admin-3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/base-admin-3-responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    




    

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">

   



    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->

    <!--[if lt IE 9]>

      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

    <![endif]-->



  </head>



<body>



<nav class="navbar navbar-inverse" role="navigation">



    <div class="container">

  <!-- Brand and toggle get grouped for better mobile display -->

  <div class="navbar-header">

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">

      <span class="sr-only">Toggle navigation</span>

      <i class="icon-cog"></i>

    </button>

    <a class="navbar-brand" href="{{ route('home') }}"><img src="/img/logo2.png" width="250"></a>

  </div>



  <!-- Collect the nav links, forms, and other content for toggling -->

  <div class="collapse navbar-collapse navbar-ex1-collapse">

    <ul class="nav navbar-nav navbar-right">


        <li class="dropdown">

                        

            <a href="javscript:;" class="dropdown-toggle" data-toggle="dropdown">

                 

            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                    <i class="icon-user"></i>
                    {{ Auth::user()->nombres }}
                    <b class="caret"></b>

                    @else
                        <li><a href="{{ url('/login') }}">Iniciar Sesión</a><li>
                        <li><a href="{{ url('/register') }}">Registrate!</a><li>
                    @endif
                </div>
                @endif

               

            </a>

            

            <ul class="dropdown-menu">

                <!--<li><a href="javascript:;">My Profile</a></li>

                <li><a href="javascript:;">My Groups</a></li>

                <li class="divider"></li>
                -->

                <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form></li>


            </ul>

            

        </li>

    </ul>

  </div><!-- /.navbar-collapse -->

</div> <!-- /.container -->

</nav>



<div class="subnavbar">



    <div class="subnavbar-inner">

    

        <div class="container">

            

            <a href="javascript:;" class="subnav-toggle" data-toggle="collapse" data-target=".subnav-collapse">

              <span class="sr-only">Toggle navigation</span>

              <i class="icon-reorder"></i>

              

            </a>



            <div class="collapse subnav-collapse">

                <ul class="mainnav">

                

                    <li class="active">

                        <a href="{{ route('home') }}">

                            <i class="icon-home"></i>

                            <span>Inicio</span>

                        </a>                        

                    </li>

                    

                    <li class="dropdown">                   

                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">

                            <i class="icon-file-text"></i>

                            <span>Proyectos</span>

                            <b class="caret"></b>

                        </a>        

                        <ul class="dropdown-menu">

                            <li><a href="{{ url('/proyectos/create') }}">Registra tu proyecto!</a></li>
                            <li><a href="{{ url('/proyectos') }}">Proyectos recientes</a></li>
                        </ul>               

                    </li>

                    

                    <li class="dropdown">                   

                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">

                            <i class="icon-group"></i>

                            <span>Equipos</span>

                            <b class="caret"></b>

                        </a>        

                    

                        <ul class="dropdown-menu">

                            <li><a href="{{ url('/teams') }}">Registra tu equipo!</a></li>

                        </ul>               

                    </li>

                    <!--

                                       <li class="dropdown">                   

                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">

                            <i class="icon-comment"></i>

                            <span>Mentores</span>

                            <b class="caret"></b>

                        </a>    

                    

                        <ul class="dropdown-menu">

                            <li><a href="./login.html">Login</a></li>

                            <li><a href="./signup.html">Signup</a></li>

                            <li><a href="./error.html">Error</a></li>

                            <li class="dropdown-submenu">

                                <a tabindex="-1" href="#">More options</a>

                                <ul class="dropdown-menu">

                                  <li><a tabindex="-1" href="#">Second level</a></li>



                                  <li><a href="#">Second level</a></li>

                                  <li><a href="#">Second level</a></li>

                                </ul>

                              </li>

                        </ul>                   

                    </li>


                    <li class="dropdown">                   

                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">

                            <i class="icon-eye-open"></i>

                            <span>Jueces</span>

                            <b class="caret"></b>

                        </a>    

                    

                        <ul class="dropdown-menu">

                            <li><a href="./login.html">Login</a></li>

                            <li><a href="./signup.html">Signup</a></li>

                            <li><a href="./error.html">Error</a></li>

                            <li class="dropdown-submenu">

                                <a tabindex="-1" href="#">More options</a>

                                <ul class="dropdown-menu">

                                  <li><a tabindex="-1" href="#">Second level</a></li>



                                  <li><a href="#">Second level</a></li>

                                  <li><a href="#">Second level</a></li>

                                </ul>

                              </li>

                        </ul>                   

                    </li>

                


                    -->

 
                </ul>

            </div> <!-- /.subnav-collapse -->



        </div> <!-- /container -->

    

    </div> <!-- /subnavbar-inner -->



</div> <!-- /subnavbar -->


@yield('content')


<div class="extra">



    <div class="container">



        <div class="row">

            

            <div class="col-md-3">

                

                <h4>About</h4>

                

                <ul>

                    <li><a href="javascript:;">About Us</a></li>

                    <li><a href="javascript:;">Twitter</a></li>

                    <li><a href="javascript:;">Facebook</a></li>

                    <li><a href="javascript:;">Google+</a></li>

                </ul>

                

            </div> <!-- /span3 -->

            

            <div class="col-md-3">

                

                <h4>Support</h4>

                

                <ul>

                    <li><a href="javascript:;">Frequently Asked Questions</a></li>

                    <li><a href="javascript:;">Ask a Question</a></li>

                    <li><a href="javascript:;">Video Tutorial</a></li>

                    <li><a href="javascript:;">Feedback</a></li>

                </ul>

                

            </div> <!-- /span3 -->

            

            <div class="col-md-3">

                

                <h4>Legal</h4>

                

                <ul>

                    <li><a href="javascript:;">License</a></li>

                    <li><a href="javascript:;">Terms of Use</a></li>

                    <li><a href="javascript:;">Privacy Policy</a></li>

                    <li><a href="javascript:;">Security</a></li>

                </ul>

                

            </div> <!-- /span3 -->

            

            <div class="col-md-3">

                

                <h4>Settings</h4>

                

                <ul>

                    <li><a href="javascript:;">Consectetur adipisicing</a></li>

                    <li><a href="javascript:;">Eiusmod tempor </a></li>

                    <li><a href="javascript:;">Fugiat nulla pariatur</a></li>

                    <li><a href="javascript:;">Officia deserunt</a></li>

                </ul>

                

            </div> <!-- /span3 -->

            

        </div> <!-- /row -->



    </div> <!-- /container -->



</div> <!-- /extra -->




<div class="footer">

        

    <div class="container">

        

        <div class="row">

            

            <div id="footer-copyright" class="col-md-6">

                &copy; ERSland 2017.

            </div> <!-- /span6 -->

            

        </div> <!-- /row -->

        

    </div> <!-- /container -->

    

</div> <!-- /footer -->


<!-- Le javascript

================================================== -->

<!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('js/libs/jquery-1.9.1.min.js') }}"></script>
    <script src="{{ asset('js/libs/jquery-ui-1.10.0.custom.min.js') }}"></script>
    <script src="{{ asset('js/libs/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('js/Application.js') }}"></script>
    <script src="{{ asset('js/charts/area.js') }}"></script>
    <script src="{{ asset('js/charts/donut.js') }}"></script>

  </body>

</html>