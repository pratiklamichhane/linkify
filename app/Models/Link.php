<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'title', 'url', 'description', 'reminder_duration' , 'user_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
