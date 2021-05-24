<?php

namespace App\Http\Livewire\Backend\Pages;

use App\Models\Category;
use Livewire\Component;

class Categoryindex extends Component
{
    public function render()
    {
        return view('livewire.backend.pages.categoryindex',[
            'categories'  => Category::all()
        ])
        ->extends('layouts.app')
        ->section('content');
    }

    public function remove($id){
        $category = Category::find($id);
        $category->delete();
        session()->flash('message', 'Category Deleted successfully.');
    }
}
