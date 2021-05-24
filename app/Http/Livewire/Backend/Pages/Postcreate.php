<?php

namespace App\Http\Livewire\Backend\Pages;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Auth;
class Postcreate extends Component{
    use WithFileUploads;
    public $title;
    public $body;
    public $category_id;
    public $selectedTags =[];
    public $image;


    public function render()
    {
        return view('livewire.backend.pages.postcreate',[
            'categories' => Category::all(),
            'tags'  => Tag::all()
        ])
        ->extends('layouts.app')
        ->section('content');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'title' => 'required|min:6|max:255|string',
            'body' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:1024'
        ]);
    }

    public function store(){
        $this->validate([
            'title' => 'required|min:6|max:255|string',
            'body' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:1024'
        ]);

        $image = $this->image->storePublicly('public/post-image');
        $imageName = Str::after($image , 'post-image/');
        $post = Post::create([
            'title' => $this->title,
            'slug'  => Str::slug($this->title),
            'body'  => $this->body,
            'category_id' => $this->category_id,
            'user_id'   => Auth::id(),
            'tags'    => implode(',',$this->selectedTags),
            'image'  => $imageName
        ]);
        session()->flash('message', 'Post Created successfully. ');
        return redirect(route('admin.post.index'));
        $this->title = '';
        $this->body = '';
        $this->category_id;
        $this->selectedTags =[];
        $this->image;
        $this->user_id;
    }
}
