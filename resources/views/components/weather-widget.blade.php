<div class="w-128 mx-auto bg-gray-900 text-white text-sm rounded-lg overflow-hidden">
    <div class="current-weather relative">
        <div class="flex items-center justify-between px-4 py-6">
            <div class="flex items-center">
                <div>
                    <div class="text-5xl font-semibold">{{round($currentWeather['main']['temp'])}}&#176;C</div>
                    <div class="text-gray-400 pt-1">Feels like {{round($currentWeather['main']['feels_like'])}}&#176;C</div>
                </div>
                <div class="ml-7">
                    <div class="text-5xl font-semibold">{{ucfirst($currentWeather['weather'][0]['description'])}}</div>
                    <div class="text-gray-400 pt-1">{{$currentWeather['name']}}, {{$currentWeather['sys']['country']}}</div>
                </div>
            </div>
            <div>
                <img src="http://openweathermap.org/img/wn/{{$currentWeather['weather'][0]['icon']}}@4x.png" alt="icon">
            </div>
        </div>
        <button class="absolute right-0 bottom-0 mb-2 mr-2 text-xs">Toggle</button>
    </div> <!-- Current weather (02/11/2023) -->
    <ul class="bg-gray-800 px-4 py-6">
        @foreach($futureWeather as $weather)
            <li class="grid grid-cols-12 gap-4 mb-4 items-center p-4 rounded-lg bg-gray-700">
                <!-- Day of the week -->
                <div class="col-span-2 text-gray-400">{{strtoupper(\Carbon\Carbon::createFromTimestamp($weather['dt'])->format('D'))}}</div>

                <!-- Weather icon and description -->
                <div class="col-span-7 flex items-center space-x-2">
                    <img src="http://openweathermap.org/img/wn/{{$weather['weather'][0]['icon']}}.png" alt="icon">
                    <span>{{ucfirst($weather['weather'][0]['description'])}}</span>
                </div>

                <!-- Temperature range -->
                <div class="col-span-3 text-xs text-right">
                    <div>{{round($weather['main']['temp_max'])}}°C</div>
                    <div>{{round($weather['main']['temp_min'])}}°C</div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
