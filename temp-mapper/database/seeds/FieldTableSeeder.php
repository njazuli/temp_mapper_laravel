<?php

use Illuminate\Database\Seeder;
use App\Models\Field;

class FieldTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Fields = [
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

        foreach ($Fields as $data) {
            $dataExist = Field::where('value', $data['value'])->first();

            if (!$dataExist) {
                Field::create($data);
            }
        }
    }
}
