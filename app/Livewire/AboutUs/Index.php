<?php

namespace App\Livewire\AboutUs;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.about-us.index')->layout('layouts.app');
    }
}
