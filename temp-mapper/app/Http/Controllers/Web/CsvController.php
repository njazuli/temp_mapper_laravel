<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Data;
use Illuminate\Http\Request;

class CsvController extends Controller
{
    public function upload()
    {
        return view('csv/index');
    }

    public function handleUpload(Request $request)
    {
        $filePath = $request->file('csv_file')->getRealPath();

        $file = fopen($filePath,"r");
        while ($data = fgetcsv($file)) {
            $year = $request->input('year');

            $input = [
                'category' => $request->input('category'),
                'date' => $year . '-' . sprintf('%02d', $data[2]) . '-' . sprintf('%02d', $data[3]),
                'lat' => $data[1],
                'lon' => $data[0],
                'temp' => $data[4],
            ];

//            $query = Data::whereYear('date', $input['date'])->where('category', $input['category'])->where('lat', sprintf("%0.9f", $input['lat']))
//                ->where('lon', sprintf("%0.9f", $input['lon']))->where('temp', $input['temp']);
//
//            dd($query->toSql(), $query->getBindings());

            $dataExist = Data::whereYear('date', $input['date'])->where('category', $input['category'])->where('lat', sprintf("%0.9f", $input['lat']))
                ->where('lon', sprintf("%0.9f", $input['lon']))->where('temp', $input['temp'])->first();

            if (!$dataExist) {
                $result = Data::create($input);
            }
        }

        return redirect()->back()->with('success', 'Successfully upload.');
    }
}