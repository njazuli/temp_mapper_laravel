<?php

use Illuminate\Database\Seeder;
use App\Models\Thematic;

class ThematicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $thematics = [
            [
                'value' => 'climate_change',
                'name' => 'Climate Change'
            ],
            [
                'value' => 'lake',
                'name' => 'Lake '
            ],
            [
                'value' => 'coastal_oceanography',
                'name' => 'Coastal and Oceanography'
            ],
            [
                'value' => 'iot',
                'name' => 'IoT'
            ]
        ];

        foreach ($thematics as $data) {
            $dataExist = Thematic::where('value', $data['value'])->first();

            if (!$dataExist) {
                Thematic::create($data);
            }
        }
    }
}
