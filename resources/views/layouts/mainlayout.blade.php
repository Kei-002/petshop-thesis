<!DOCTYPE html>
<html lang="en">

<head>
  @include('partials.head')
</head>

 <body>

@include('partials.header')

@yield('content')

@yield('javascript')

@include('partials.footer')


 </body>
</html>