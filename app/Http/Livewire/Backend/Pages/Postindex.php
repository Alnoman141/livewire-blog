<?php

namespace App\Http\Livewire\Backend\Pages;

use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Facades\File;

class Postindex extends Component
{   public $postTag;
    public function render()
    {
        return view('livewire.backend.pages.postindex',[
            'posts' => Post::all(),
            'tags' => Tag::all()
        ])
        ->extends('layouts.app')
        ->section('content');
    }

    public function publish($id){
        $post = Post::find($id);
        $post->status = 1;
        $post->save();
        session()->flash('message', 'Post Published successfully.');
    }

    public function mute($id){
        $post = Post::find($id);
        $post->status = 0;
        $post->save();
        session()->flash('message', 'Post Muted successfully.');
    }

    public function remove($id){
        $post = Post::find($id);

        if($post->image){
            if(File::exists('storage/post-image/'.$post->image)){
                File::delete('storage/post-image/'.$post->image);
            };
        }

        $post->delete();
        session()->flash('message', 'Post Deleted successfully.');
    }
}
