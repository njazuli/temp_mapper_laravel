<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Thematic;
use Box\Spout\Common\Type;
use Box\Spout\Reader\ReaderFactory;
use Illuminate\Http\Request;

ini_set('max_execution_time', 1800); //300 seconds = 5 minutes

class CsvController extends Controller
{
    public function upload()
    {
        $thematics = Thematic::select(['id', 'name'])->get();

        return view('csv.index', compact('thematics'));
    }

    public function handleUpload(Request $request)
    {
        $filePath = $request->file('csv_file')->getRealPath();

        $reader = ReaderFactory::create(Type::CSV);

        $reader->open($filePath);

        foreach ($reader->getSheetIterator() as $sheet) {
            foreach ($sheet->getRowIterator() as $data) {
                $year = $request->input('year');

                $input = [
                    'thematic_id' => $request->input('thematic_id'),
                    'category_id' => $request->input('category_id'),
                    'date' => $year . '-' . sprintf('%02d', $data[2]) . '-' . sprintf('%02d', $data[3]),
                    'lat' => $data[1],
                    'lon' => $data[0],
                    'temp' => $data[4],
                ];

                // $query = Data::whereYear('date', $input['date'])->where('category', $input['category'])->where('lat', sprintf("%0.9f", $input['lat']))
                //     ->where('lon', sprintf("%0.9f", $input['lon']))->where('temp', $input['temp']);
                //
                // dd($query->toSql(), $query->getBindings());

                $dataExist = Data::whereYear('date', $input['date'])->where('thematic_id', $input['thematic_id'])
                    ->where('category_id', $input['category_id'])->where('lat', sprintf("%0.9f", $input['lat']))
                    ->where('lon', sprintf("%0.9f", $input['lon']))->where('temp', $input['temp'])->first();

                if (!$dataExist) {
                    $result = Data::create($input);
                }
            }
        }

        return response()->json(['success' => 'Successfully Upload']);

        //return redirect()->back()->with('success', 'Successfully upload.');
    }
}