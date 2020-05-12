<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //The table associated with the model.
    protected $table = 'statuses';

    //The columns associated with the model.
    protected $primaryKey = 'id';
    public $name = 'name';
}
