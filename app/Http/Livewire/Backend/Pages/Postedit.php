<?php

namespace App\Http\Livewire\Backend\Pages;

use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Auth;
use Illuminate\Support\Facades\File;

class Postedit extends Component
{
    use WithFileUploads;

    public $post;
    public $selectedTags = [];
    public $image;
    public $title;
    public $category_id;
    public $body;
    public $PostTags;

    public function render()
    {
        return view('livewire.backend.pages.postedit',[
            'post' => $this->post,
            'tags' => Tag::all()
        ])
        ->extends('layouts.app')
        ->section('content');
    }

    public function mount($id){
        $post = Post::find($id);
        $this->post = $post;
        $this->title = $post->title;
        $this->category_id = $post->category_id;
        $this->body = $post->body;
        $this->PostTags = Str::of($post->tags)->explode(',');
        $this->selectedTags = $this->PostTags;

        // dd(count($this->selectedTags));
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

    public function update(){
        $updatedPost = $this->post;
        $this->validate([
            'title' => 'required|min:6|max:255|string',
            'body' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:1024'
        ]);

        if($this->image > 0){
            if(File::exists('storage/post-image/'.$this->post->image)){
                File::delete('storage/post-image/'.$this->post->image);
            };
            $image = $this->image->storePublicly('public/post-image');
            $imageName = Str::after($image , 'post-image/');
            $this->post->image = $imageName;
        }

        $this->post->title = $this->title;
        $this->post->body = $this->body;
        $this->post->slug = Str::slug($this->title);
        $this->post->user_id = Auth::id();
        $this->post->category_id = $this->category_id;
        if(count($this->PostTags) != count($this->selectedTags)){
            $this->post->tags = implode(',',$this->selectedTags);
        }
        $this->post->save();

        session()->flash('message', 'Post updated successfully. ');
        return redirect(route('admin.post.index'));
        $this->title = '';
        $this->body = '';
        $this->category_id;
        $this->selectedTags =[];
        $this->image;
        $this->user_id;
    }
}
