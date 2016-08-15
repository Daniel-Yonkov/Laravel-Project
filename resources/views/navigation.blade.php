<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{action('articlesController@index')}}">Blogster</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li @yield('navAction1')><a href="{{action('articlesController@create')}}" rel="home">Create new article</a></li>
             @if (is_numeric(Request::segment(2)) && is_null(Request::segment(3)))
              <li><a href="{{action('articlesController@edit',Request::segment(2))}}">Edit article</a></li>
            @endif
            <li @yield('navAction2')><a href="{{action('pagesController@about')}}" rel="about">About</a></li>
            <li @yield('navAction3')><a href="{{action('pagesController@contact')}}" rel="contact">Contact</a></li>
          </ul>
          @if (Auth::user())
            <?php
$path = 'Auth\AuthController@getLogout';
$log  = 'Logout';
?>
          @else
           <?php
$path = 'Auth\AuthController@getLogin';
$log  = 'Login';
?>
          @endif

           <ul class="nav navbar-nav navbar-right">
            <li><a href="{{action($path)}}">{{$log}}</a></li>
          </ul>
        </div>
      </div>
    </nav>


