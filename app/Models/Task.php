<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
public function user(){
    return $this->belogongsTo(User::class);
}

public function categorie(){
    return $this->belongsTo(Category::class);
}

public function getStatusColor(): string
{
    return match($this->status) {
        'todo'  => '#ef4444', 
        'doing' => '#3b82f6', 
        'done'  => '#10b981', 
    };
}




}
