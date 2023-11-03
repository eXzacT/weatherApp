<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @vite('resources/css/app.css')
</head>
<body class="mt-5 bg-blue-200 bg-gradient-to-tr from-blue-200  to-blue-400 min-h-screen">
    <div class="mt8">
        <x-weather-widget :currentWeather="$currentWeather" :futureWeather="$futureWeather" />
    </div>
</body>
</html>
