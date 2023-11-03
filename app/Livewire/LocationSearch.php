<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class LocationSearch extends Component
{
    public string $location = '';
    public string $error = '';

    protected $listeners = [
        'locationError' => 'showError'
    ];
    public function updateLocation()
    {
        $this->error='';
        $this->dispatch('locationSelected', $this->location);
    }
    public function showError($error)
    {
        $this->error = $error;
    }
    public function render()
    {
        return view('livewire.location-search');
    }
}
