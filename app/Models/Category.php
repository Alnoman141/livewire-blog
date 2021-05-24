<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable =['name','parent_id','slug'];

    public function parent(){
        return $this->belongsTo(Category::class,'parent_id');
    }
}
