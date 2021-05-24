<?php

namespace App\Http\Livewire\Backend\Pages;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class Categorycreate extends Component
{

    public $name;
    public $parent_id;

    public function render()
    {
        return view('livewire.backend.pages.categorycreate',[
            'parent_categories' => Category::orderBy('name','asc')->where('parent_id',NULL)->orwhere('parent_id',0)->get()
        ])
        ->extends('layouts.app')
        ->section('content');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'name' => 'required|string|unique:categories',
            'parent_id' => 'nullable'
        ]);
    }

    public function store(){
        $this->validate([
            'name' => 'required|string|unique:categories',
            'parent_id' => 'nullable'
        ]);

        $category = Category::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'parent_id' => $this->parent_id
        ]);

        $this->name = "";
        $this->parent_id = "";

        session()->flash('message', 'Category added successfully. ');
        return redirect(route('admin.category.index'));
    }
}
