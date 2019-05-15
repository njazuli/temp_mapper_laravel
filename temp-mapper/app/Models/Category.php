<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['Field_id', 'value', 'name'];

    public function Field()
    {
        return $this->belongsTo(\Field::class);
    }
}