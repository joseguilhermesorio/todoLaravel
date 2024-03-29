<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todos';

    protected $guarded = ['id'];

    protected $fillable = ['name','description','completed'];
}
