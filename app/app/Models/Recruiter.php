<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'recruiter_name'];

    // Define relationships if needed
    public function timelines()
    {
        return $this->hasMany(Timeline::class);
    }
}