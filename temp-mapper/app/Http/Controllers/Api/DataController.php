<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Data;
use App\Models\Thematic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->input('page', '1');
        $limit = $request->input('limit', 10);
        $thematic = $request->input('thematic');
        $category = $request->input('category');
        $year = $request->input('year');
        $month = $request->input('month');
        $day = $request->input('day');

        if ($category) {
            $categoryExist = Category::where('value', $request->input('category'))->first();

            if (!$categoryExist) {
                return response()->json([
                    'error' => 'Category not exist. Available category: ' . implode(', ', Category::pluck('value')->toArray()),
                    'status' => 404
                ], 404);
            }
        }

        if ($thematic) {
            $thematicExist = Thematic::where('value', $request->input('thematic'))->first();

            if (!$thematicExist) {
                return response()->json([
                    'error' => 'Category not exist. Available thematic: ' . implode(', ', Thematic::pluck('value')->toArray()),
                    'status' => 404
                ], 404);
            }
        }

        if ($year) {
            $availableYear = Data::select(DB::raw("YEAR(date) as date"))->groupBy(DB::raw("YEAR(date)"))->pluck('date')->toArray();

            $yearExist = array_search($year, $availableYear);

            if ($yearExist === false) {
                return response()->json([
                    'error' => 'Year not exist. Available year: ' . implode(', ', $availableYear),
                    'status' => 404
                ], 404);
            }
        }

        $query = Data::with(['category', 'thematic']);

        if ($category) {
            $query = $query->whereHas('category', function ($query) use ($category) {
                $query->where('value', $category);
            });
        }

        if ($thematic) {
            $query = $query->whereHas('thematic', function ($query) use ($thematic) {
                $query->where('value', $thematic);
            });
        }

        if ($year) {
            $query = $query->whereYear('date', $year);
        }

        if ($month) {
            $query = $query->whereMonth('date', $month);
        }

        if ($day) {
            $query = $query->whereDay('date', $day);
        }

        $data = $query->paginate($limit, ['*'], 'page', $page);

        return response()->json(['data' => $data]);
    }

    public function categoryAndYear($thematic, $category, $year, Request $request)
    {
        $page = $request->input('page', '1');
        $limit = $request->input('limit', 10);
        $month = $request->input('month');
        $day = $request->input('day');

        $thematicExist = Thematic::where('value',$thematic)->first();

        if(!$thematicExist){
            return response()->json([
                'error' => 'Thematic not exist. Available thematics: ' . implode(', ', Thematic::pluck('value')->toArray()),
                'status' => 404
            ], 404);
        }

        $categoryExist = Category::where('value',$category)->first();

        if (!$categoryExist) {
            return response()->json([
                'error' => 'Category not exist. Available category: ' . implode(', ', Category::pluck('value')->toArray()),
                'status' => 404
            ], 404);
        }

        $availableYear = Data::select(DB::raw("YEAR(date) as date"))->groupBy(DB::raw("YEAR(date)"))->pluck('date')->toArray();

        $yearExist = array_search($year, $availableYear);

        if ($yearExist === false) {
            return response()->json([
                'error' => 'Year not exist. Available year: ' . implode(', ', $availableYear),
                'status' => 404
            ], 404);
        }

        $query = Data::with(['category', 'thematic']);


        if ($category) {
            $query = $query->whereHas('category', function ($query) use ($category) {
                $query->where('value', $category);
            });
        }

        if ($thematic) {
            $query = $query->whereHas('thematic', function ($query) use ($thematic) {
                $query->where('value', $thematic);
            });
        }

        if ($year) {
            $query = $query->whereYear('date', $year);
        }

        if ($month) {
            $query = $query->whereMonth('date', $month);
        }

        if ($day) {
            $query = $query->whereDay('date', $day);
        }

       $data = $query->paginate($limit, ['*'], 'page', $page);

       return response()->json(['data' => $data]);
    }
}