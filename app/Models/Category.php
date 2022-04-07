<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Books;
use App\Models\User; 

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['category'];
    public function books(){
        return $this->hasMany(Books::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
