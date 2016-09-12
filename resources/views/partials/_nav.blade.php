<!-- Default Bootstrap Navbar -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="{{ Request::is('/') ? "active" : "" }}"><a href="/">صفحه اصلی</a></li>
        <li class="{{ Request::is('blog') ? "active" : "" }}"><a href="/blog">وبلاگ</a></li>
        <li class="{{ Request::is('about') ? "active" : "" }}"><a href="/about">درباره من</a></li>
        <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="/contact">تماس با من</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-left">
        @if (Auth::check())
        
        <li class="dropdown">
          <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">درود {{ Auth::user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('posts.index') }}">پست ها</a></li>
            <li><a href="{{ route('categories.index') }}">دسته بندی ها</a></li>
            <li><a href="{{ route('tags.index') }}">تگ ها</a></li>
            <li role="separator" class="divider"></li>
            <li><form id="form-logout" method="POST" action="{{ url('logout') }}">{{ csrf_field() }}<a onclick='$("#form-logout").submit()'>خروج</a></form></li>
          </ul>
        </li>
        </ul>
        @else
        <ul class="nav navbar-nav navbar-left">
         <li class="dropdown">
          <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">حساب کاربری<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('login') }}">ورود</a></li>
            <li><a href="{{ url('register') }}">ثبت نام</a></li>
          </ul>
        </li>
        </ul>

        @endif

      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>