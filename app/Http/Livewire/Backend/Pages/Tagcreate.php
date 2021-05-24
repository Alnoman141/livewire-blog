<?php

namespace App\Http\Livewire\Backend\Pages;

use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;

class Tagcreate extends Component{

    public $name;

    public function render()
    {
        return view('livewire.backend.pages.tagcreate')
        ->extends('layouts.app')
        ->section('content');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'name' => 'required|string|unique:tags',

        ]);
    }

    public function store(){
        $this->validate([
            'name' => 'required|string|unique:tags',

        ]);

        $tag = Tag::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),

        ]);

        $this->name = "";


        session()->flash('message', 'Tag added successfully. ');
        return redirect(route('admin.tag.index'));
    }
}
