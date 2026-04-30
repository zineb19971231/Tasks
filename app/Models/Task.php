<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

protected $fillable = [
    'titre',
    'description',
    'user_id',
    'category_id',
    'statut',
    
];


public function user(){
    return $this->belogongsTo(User::class);
}

public function category(){
    return $this->belongsTo(Category::class);
}






}
