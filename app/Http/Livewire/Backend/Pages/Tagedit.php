<?php

namespace App\Http\Livewire\Backend\Pages;

use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;

class Tagedit extends Component
{
    public $tag;
    public $name;

    public function render()
    {
        return view('livewire.backend.pages.tagedit')
        ->extends('layouts.app')
        ->section('content');
    }

    public function mount($slug){
        $tag = Tag::where('slug',$slug)->first();
        $this->tag = $tag;
        $this->name = $tag->name;
    }

    public function updated($propertyName)
    {   $tg = $this->tag;
        $this->validateOnly($propertyName, [
            'name' => "required|string|unique:categories,name,$tg->id",

        ]);
    }

    public function update(){
        $tg = $this->tag;
        $this->validate([
            'name' => "required|string|unique:categories,name,$tg->id",

        ]);

        $this->tag->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
        ]);

        $this->name = "";

        session()->flash('message', 'Tag Updated successfully.');
        return redirect(route('admin.tag.index'));
    }
}
