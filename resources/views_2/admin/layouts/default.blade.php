<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.includes.head')   
    @yield('head') 
  </head>

  <body class="nav-md">
    <div class="container body">
        @yield('content')

       
        @yield('script')
    </div>
 </body>
</html>