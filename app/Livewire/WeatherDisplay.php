<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class WeatherDisplay extends Component
{
    public string $location;
    public $currentWeather;
    public $futureWeather;

    protected $listeners = [
        'locationSelected' => 'updateLocation'
    ];

    public function mount()
    {
        $this->location = "Dubrovnik";
        $this->fetchWeather();
    }

    public function render()
    {
        return view('livewire.weather-display');
    }

    public function updateLocation($location)
    {
        $this->location=$location;
        $this->fetchWeather();
    }

    public function fetchWeather()
    {
        $apiKeyWeather = config('services.openWeather.key');

        $currentWeather = Http::get(
            "https://api.openweathermap.org/data/2.5/weather?q={$this->location}&appid={$apiKeyWeather}&units=metric"
        )->json();
        // If there's an error
        if ($currentWeather['cod']==404) {
            // Emit event with error message
            $this->dispatch('locationError', $currentWeather['message']);
            return;
        }
        $this->currentWeather=$currentWeather;

        $futureWeather = Http::get(
            "https://api.openweathermap.org/data/2.5/forecast?q={$this->location}&cnt=40&appid={$apiKeyWeather}&units=metric"
        );
        // Since api is giving us forecast every 3 hours, but we want daily we use a filter (03/11/2023)
        $this->futureWeather= collect($futureWeather['list'])->filter(function ($value, $key) {
            return $key % 8 === 0;
        });
    }
}
