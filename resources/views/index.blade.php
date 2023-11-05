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
    <input
        type="search"
        class="w-128 mt-1 rounded border bg-clip-padding px-3 py-1 bg-gray-900 text-white overflow-hidden"
        id="citySearch"
        placeholder="Search city..." />
    <livewire:weather-display/>
</div>
<livewire:scripts/>
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.googlePlaces.key') }}&libraries=places&callback=initialize"></script>
<script>
    function initialize() {
        var options = {
            types: ['(cities)'],
        };
        var input = document.getElementById('citySearch');
        var autocomplete = new google.maps.places.Autocomplete(input, options);

        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            if (place.geometry) {
                window.Livewire.dispatch('citySelected', {city: place['formatted_address']});
                setTimeout(function() {
                    input.value = '';
                }, 5);
            }
        });
    }
    window.addEventListener('load', initialize);
</script>
</body>
</html>
