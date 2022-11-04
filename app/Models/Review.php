<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function instructor()
    {
        return $this->hasOne(Instructor::class,  'id', 'instructor_id');
    }

    public function creator()
    {
        return $this->hasOne(User::class,  'id', 'creator_id');
    }
}
