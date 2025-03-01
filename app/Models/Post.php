<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasUlids;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'posts';
    protected $fillable = ['title', 'content'];
}
