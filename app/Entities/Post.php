<?php

namespace App\Entities;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'author'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
