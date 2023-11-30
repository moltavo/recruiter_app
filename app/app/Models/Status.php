<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable = ['status_category'];

    // Define relationships if needed
    public function step()
    {
        return $this->belongsTo(Step::class);
    }
}
