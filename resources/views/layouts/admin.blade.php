<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
         {{-- 後の章で説明します --}}
         <meta name="csrf-token" content="{{ csrf_token()">

         {{-- 各ページごとにtitleタグを入れるために@yieldで開けておきます。 --}}
         <title>@yield('title')</title>

         <!-- Scripts -->
          {{-- Laravel標準で用意されているJavascriptを読み込みます　--}}
          <script src="{{ asset('js/app.js')}}" defer></script>

          <!-- Fonts -->
          <link rel="dns-prefetch" href="https://fonts.gstatic.com">
          <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
          
    </head>
</html>