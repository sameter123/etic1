<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    use HasFactory;

    protected $table = 'notify';

    protected $fillable = [
        'user_id',
        'title',
        'text',
        'type',
        'is_read',
        'link',
    ];
}
