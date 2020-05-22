<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //The table associated with the model.
    protected $table = 'posts';

    //The columns associated with the model.
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'title',
        'content',
        'created_at',
        'updated_at',
        'status_id'
    ];
}
