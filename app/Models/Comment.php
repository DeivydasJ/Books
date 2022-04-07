<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['body', 'user_id', 'books_id'];
    public function books(){
        return $this->belongsTo(Books::class);
    }
    public function user(){
    return $this->belongsTo(User::class);
    }
}