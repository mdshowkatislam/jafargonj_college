
<header class="header fixed-top" id="hall-navbar">
<div class="container-fluid top-header" style="background-color: #59a79ca3;">
<div class="row">
            <div class="col-12 text-center">
              <a href="{{ url('/') }}">
              <img class="img-fluid d-block mx-auto" style="max-height: 80px; padding: 2px 0px" src="{{ asset('frontend/assets/images/dulogo.png') }}" alt="logo"/></a>
            </div>
          </div>
  </div>

<nav style="background: hsla(198, 100%, 50%, 0.95);" class="navbar short-nav navbar-dark bg-primary">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" style="color:white; margin: 15px auto;" class="navbar-brand" >{{ @$hall_details->name}}</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
    
                        <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">History</a></li>
                                    <li><a href="#">Provost</a></li>
                                </ul>
                        </li>
                      
                        <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administration <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('provost_message',$hall_details->name)}}">Provost Message</a></li>
                                    <li><a href="#">House Tutor</a></li>
                                    <li><a href="#">Officers & Staff</a></li>
                                    
                                </ul>
                        </li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

</header>        