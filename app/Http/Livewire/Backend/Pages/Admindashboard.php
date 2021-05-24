<?php

namespace App\Http\Livewire\Backend\Pages;

use Livewire\Component;

class Admindashboard extends Component
{
    public function render()
    {
        return view('livewire.backend.pages.admindashboard')
        ->extends('layouts.app')
        ->section('content');
    }
}
