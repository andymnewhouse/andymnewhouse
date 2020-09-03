<?php

namespace App\View\Components\Antlers;

use Illuminate\View\Component;

class Branch extends Component
{
    public function __construct($branch)
    {
        dd($branch);
        $this->title = $branch['title'];
        $this->url = $branch['url'];
    }

    public function render()
    {
        return view('components.antlers.branch');
    }
}
