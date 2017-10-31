@extends('layouts.header')

@section('title', 'Inicio')

@section('content')
<div class="main">



    <div class="container">



      <div class="row">

        
            <div class="widget widget-nopad stacked">
                <a href="https://www.eventbrite.com/e/entradas-startup-weekend-zacatecas-utzac-1017-36959941179">
                    <img src="/uploads/inicio/banner.png" width="1185">
                </a>
                <div class="widget-content">

                </div> <!-- /widget-content -->

            

            </div> <!-- /widget --> 

        <div class="col-md-6 col-xs-12">

            

            <div class="widget stacked">

                    

                <div class="widget-header">

                    <i class="icon-star"></i>

                    <h3>Eventos pasados</h3>

                </div> <!-- /widget-header -->

                

                <div class="widget-content">

                    
                        <a href="https://www.facebook.com/SWZAC/"><img src="/uploads/inicio/bannerPromocional.png" width="500"></a>

                </div> <!-- /widget-content -->

                    

            </div> <!-- /widget --> 

            
            

            

        </div> <!-- /span6 -->

        

        

        <div class="col-md-6">  

            

            

            <div class="widget stacked">

                    

                <div class="widget-header">

                    <i class="icon-bookmark"></i>

                    <h3>Ubicación</h3>

                </div> <!-- /widget-header -->

                

                <div class="widget-content">
                    @include ('gmaps')
                </div> <!-- /widget-content -->

                

            </div> <!-- /widget -->

            
          </div> <!-- /span6 -->

        

      </div> <!-- /row -->

    </div> <!-- /container -->

    

</div> <!-- /main -->
@stop


