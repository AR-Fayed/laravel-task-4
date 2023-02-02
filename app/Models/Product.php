<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public static $rules = [
        'name' => 'required',
        'image' => 'required|mimes:jpg,jpeg,png,bmp|max:2048'
    ];
    protected $guarded = ['rating','rating_count'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function getPrice(){
        return $this->price - $this->price * $this->discount;
    }



}