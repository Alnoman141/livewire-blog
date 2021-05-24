<?php

namespace App\Http\Livewire\Backend\Pages;

use App\Models\Tag;
use Livewire\Component;

class Tagindex extends Component
{
    public function render()
    {
        return view('livewire.backend.pages.tagindex',[
            'tags'  => Tag::all()
        ])
        ->extends('layouts.app')
        ->section('content');
    }

    public function remove($id){
        $tag = Tag::find($id);
        $tag->delete();
        session()->flash('message', 'Tag Deleted successfully.');
    }
}
