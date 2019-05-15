<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Field;

class CategoryController extends Controller
{
    public function categoryByField(Field $Field)
    {
        return response()->json(['data' => $Field->categories]);
    }
}
