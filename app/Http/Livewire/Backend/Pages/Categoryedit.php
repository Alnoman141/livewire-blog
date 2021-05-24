<?php

namespace App\Http\Livewire\Backend\Pages;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class Categoryedit extends Component
{
    public $category;
    public $name;
    public $parent_id;

    public function render()
    {
        return view('livewire.backend.pages.categoryedit',[
            'parent_categories' => Category::orderBy('name','asc')->where('parent_id',NULL)->orwhere('parent_id',0)->get()
        ])
        ->extends('layouts.app')
        ->section('content');
    }

    public function mount($id)
    {
        $category = Category::find($id);
        $this->category = $category;
        $this->name = $category->name;
        $this->parent_id = $category->parent_id;
    }

    public function updated($propertyName)
    {   $cat = $this->category;
        $this->validateOnly($propertyName, [
            'name' => "required|string|unique:categories,name,$cat->id",
            'parent_id' => 'nullable'
        ]);
    }

    public function update(){
        $cat = $this->category;
        $this->validate([
            'name' => "required|string|unique:categories,name,$cat->id",
            'parent_id' => 'nullable'
        ]);
        // dd($this->category);
        $this->category->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'parent_id' => $this->parent_id
        ]);

        $this->name = "";
        $this->parent_id = "";

        session()->flash('message', 'Category Updated successfully.');
        return redirect(route('admin.category.index'));
    }
}
