<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;

    protected $fillable = ['timeline_id','category', 'status_category','category_1', 'category_2','category_4', 'status_category_1','status_category_2', 'status_category_3'];

    // Define relationships if needed
    public function timeline()
    {
        return $this->belongsTo(Timeline::class);
    }

    public function statuses()
    {
        return $this->hasMany(Status::class);
    }
}
