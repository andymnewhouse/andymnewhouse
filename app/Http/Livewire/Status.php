<?php

namespace App\Http\Livewire;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Status extends Component
{
    public $active;
    public $activities;
    public $started;
    public $status;
    public $token;

    public function mount()
    {
        $this->token = Http::post('https://api.timeular.com/api/v3/developer/sign-in', ['apiKey' => env('TIMEULAR_KEY'), 'apiSecret' => env('TIMEULAR_SECRET')])->json()['token'];

        $this->activities = collect(Http::withToken($this->token)->get('https://api.timeular.com/api/v3/activities')->json()['activities']);
        $this->status = Http::withToken($this->token)->get('https://api.timeular.com/api/v3/tracking')->json()['currentTracking'];
        if($this->status !== null) {
            $this->active = $this->status['activityId'];
            $this->started = Carbon::parse($this->status['startedAt'])->diffForHumans();
        }
    }

    public function render()
    {
        return view('livewire.status');
    }
}
