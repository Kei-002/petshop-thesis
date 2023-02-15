<!doctype html>
 <html lang="en">
 <head>
 <meta charset="UTF-8">
 <title>SST</title>
 </head>
 <body>
    {{-- @include('layouts.header') --}}
    @include('layouts.app')
    
 @yield('body')

{{--  <script src="{{ mix('js/app.js') }}"></script> --}}
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    @stack('scripts')
 </body>
 </html>