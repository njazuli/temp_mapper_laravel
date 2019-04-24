<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Thematic;

class CategoryController extends Controller
{
    public function categoryByThematic(Thematic $thematic)
    {
        return response()->json(['data' => $thematic->categories]);
    }
}
