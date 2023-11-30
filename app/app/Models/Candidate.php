<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname'];

    // Define relationships if needed
    public function timelines()
    {
        return $this->hasMany(Timeline::class);
    }
}
