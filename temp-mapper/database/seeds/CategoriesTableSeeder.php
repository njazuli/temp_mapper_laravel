<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Field;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'Field' => 'climate_change',
                'value' => 'rainfall',
                'name' => 'Rainfall'
            ],
            [
                'Field' => 'climate_change',
                'value' => 'temperature',
                'name' => 'Temperature'
            ],
            [
                'Field' => 'climate_change',
                'value' => Str::slug(strtolower('Evapotranspiration'), '_'),
                'name' => 'Evapotranspiration'
            ],
            [
                'Field' => 'climate_change',
                'value' => Str::slug(strtolower('Water Stress Index'), '_'),
                'name' => 'Water Stress Index'
            ],
            [
                'Field' => 'lake',
                'value' => Str::slug(strtolower('NLWQS'), '_'),
                'name' => 'NLWQS'
            ],
            [
                'Field' => 'lake',
                'value' => Str::slug(strtolower('Lake Management'), '_'),
                'name' => 'Lake Management'
            ],
            [
                'Field' => 'lake',
                'value' => Str::slug(strtolower('Water Quality'), '_'),
                'name' => 'Water Quality'
            ],
            [
                'Field' => 'lake',
                'value' => Str::slug(strtolower('Flora'), '_'),
                'name' => 'Flora'
            ],
            [
                'Field' => 'lake',
                'value' => Str::slug(strtolower('Fauna'), '_'),
                'name' => 'Fauna'
            ],
            [
                'Field' => 'coastal_oceanography',
                'value' => Str::slug(strtolower('Bathymetry'), '_'),
                'name' => 'Bathymetry'
            ],
            [
                'Field' => 'coastal_oceanography',
                'value' => Str::slug(strtolower('Tide Level'), '_'),
                'name' => 'Tide Level'
            ],
            [
                'Field' => 'coastal_oceanography',
                'value' => Str::slug(strtolower('Wave and Current'), '_'),
                'name' => 'Wave and Current'
            ],
            [
                'Field' => 'coastal_oceanography',
                'value' => Str::slug(strtolower('Sediment Sampling'), '_'),
                'name' => 'Sediment Sampling'
            ],
            [
                'Field' => 'coastal_oceanography',
                'value' => Str::slug(strtolower('Water Quality'), '_'),
                'name' => 'Water Quality'
            ],
            [
                'Field' => 'coastal_oceanography',
                'value' => Str::slug(strtolower('Beach Profile'), '_'),
                'name' => 'Beach Profile'
            ],
            [
                'Field' => 'coastal_oceanography',
                'value' => Str::slug(strtolower('GIS Survey'), '_'),
                'name' => 'GIS Survey'
            ],
            [
                'Field' => 'coastal_oceanography',
                'value' => Str::slug(strtolower('UAV'), '_'),
                'name' => 'UAV'
            ],
            [
                'Field' => 'coastal_oceanography',
                'value' => Str::slug(strtolower('Wind Rose'), '_'),
                'name' => 'Wind Rose'
            ],
            [
                'Field' => 'coastal_oceanography',
                'value' => Str::slug(strtolower('Wave Rose'), '_'),
                'name' => 'Wave Rose'
            ],
            [
                'Field' => 'coastal_oceanography',
                'value' => Str::slug(strtolower('Sea Level Rise'), '_'),
                'name' => 'Sea Level Rise'
            ],
            [
                'Field' => 'iot',
                'value' => Str::slug(strtolower('Rain Water Harvesting System'), '_'),
                'name' => 'Rain Water Harvesting System'
            ]

        ];

        foreach ($categories as $category) {
            $Field = Field::where('value', $category['Field'])->first();

            if ($Field) {
                $category['Field_id'] = $Field->id;
                unset($category['Field']);

                $categoryExist = Category::where('Field_id', $Field->id)->where('value', $category['value'])->first();

                if (!$categoryExist) {
                    Category::create($category);
                }
            }
        }
    }
}
