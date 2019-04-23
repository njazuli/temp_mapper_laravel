<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->input('page', '1');
        $limit = $request->input('limit', 10);
        $category = $request->input('category');
        $year = $request->input('year');
        $month = $request->input('month');
        $day = $request->input('day');

        if ($category) {
            $categoryExist = array_key_exists($category, Data::CATEGORIES);

            if (!$categoryExist) {
                return response()->json([
                    'error' => 'Category not exist. Available category: ' . implode(', ', array_keys(Data::CATEGORIES)),
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

        $query = Data::query();

        if ($category) {
            $query = $query->where('category', $category);
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

    public function categoryAndYear($category, $year, Request $request)
    {
        $page = $request->input('page', '1');
        $limit = $request->input('limit', 10);

        $categoryExist = array_key_exists($category, Data::CATEGORIES);

        if (!$categoryExist) {
            return response()->json([
                'error' => 'Category not exist. Available category: ' . implode(', ', array_keys(Data::CATEGORIES)),
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


       $data = Data::paginate($limit, ['*'], 'page', $page);

       return response()->json(['data' => $data]);
    }
}