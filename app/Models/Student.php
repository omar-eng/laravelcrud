<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';

    protected $fillable = ['IDno', 'name', 'age'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
