<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>WeatherApp</title>
    @vite('resources/css/app.css')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <livewire:styles/>
</head>
<body class="bg-blue-200 bg-gradient-to-tr from-blue-200  to-blue-400 min-h-screen">
<div class="flex flex-col items-center min-h-screen">
    <livewire:location-search/>
    <livewire:weather-display/>
</div>
<livewire:scripts/>
</body>
</html>
