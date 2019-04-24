<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['thematic_id', 'value', 'name'];

    public function thematic()
    {
        return $this->belongsTo(\Thematic::class);
    }
}