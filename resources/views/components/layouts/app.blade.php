<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <livewire:styles />
  
        <title>Watch</title>
    </head>
    <body x-init="
    height =  screen.height;
    Alpine.data('openh',true);
    if (height > 376) {
     openh = true
    }else{
      openh = false  
    }
    " x-data="{ openh: true }"  @resize.window="
    height =screen.height;
    if (height > 376) {
     openh = true
    }else{
      openh = false  
    }
    "  x-data="{navtwoheight:0}" class="h-full bg-slate-800 " >
        {{$slot}}
        <livewire:scripts /> 
    </body>
</html>
