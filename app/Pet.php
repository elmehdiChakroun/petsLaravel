<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Pet extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'image'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
