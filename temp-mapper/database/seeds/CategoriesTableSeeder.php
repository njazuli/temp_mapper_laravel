<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Thematic;
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
                'thematic' => 'climate_change',
                'value' => 'rainfall',
                'name' => 'Rainfall'
            ],
            [
                'thematic' => 'climate_change',
                'value' => 'temperature',
                'name' => 'Temperature'
            ],
            [
                'thematic' => 'climate_change',
                'value' => Str::slug(strtolower('Evapotranspiration'), '_'),
                'name' => 'Evapotranspiration'
            ],
            [
                'thematic' => 'climate_change',
                'value' => Str::slug(strtolower('Water Stress Index'), '_'),
                'name' => 'Water Stress Index'
            ],
            [
                'thematic' => 'lake',
                'value' => Str::slug(strtolower('NLWQS'), '_'),
                'name' => 'NLWQS'
            ],
            [
                'thematic' => 'lake',
                'value' => Str::slug(strtolower('Lake Management'), '_'),
                'name' => 'Lake Management'
            ],
            [
                'thematic' => 'lake',
                'value' => Str::slug(strtolower('Water Quality'), '_'),
                'name' => 'Water Quality'
            ],
            [
                'thematic' => 'lake',
                'value' => Str::slug(strtolower('Flora'), '_'),
                'name' => 'Flora'
            ],
            [
                'thematic' => 'lake',
                'value' => Str::slug(strtolower('Fauna'), '_'),
                'name' => 'Fauna'
            ],
            [
                'thematic' => 'coastal_oceanography',
                'value' => Str::slug(strtolower('Bathymetry'), '_'),
                'name' => 'Bathymetry'
            ],
            [
                'thematic' => 'coastal_oceanography',
                'value' => Str::slug(strtolower('Tide Level'), '_'),
                'name' => 'Tide Level'
            ],
            [
                'thematic' => 'coastal_oceanography',
                'value' => Str::slug(strtolower('Wave and Current'), '_'),
                'name' => 'Wave and Current'
            ],
            [
                'thematic' => 'coastal_oceanography',
                'value' => Str::slug(strtolower('Sediment Sampling'), '_'),
                'name' => 'Sediment Sampling'
            ],
            [
                'thematic' => 'coastal_oceanography',
                'value' => Str::slug(strtolower('Water Quality'), '_'),
                'name' => 'Water Quality'
            ],
            [
                'thematic' => 'coastal_oceanography',
                'value' => Str::slug(strtolower('Beach Profile'), '_'),
                'name' => 'Beach Profile'
            ],
            [
                'thematic' => 'coastal_oceanography',
                'value' => Str::slug(strtolower('GIS Survey'), '_'),
                'name' => 'GIS Survey'
            ],
            [
                'thematic' => 'coastal_oceanography',
                'value' => Str::slug(strtolower('UAV'), '_'),
                'name' => 'UAV'
            ],
            [
                'thematic' => 'coastal_oceanography',
                'value' => Str::slug(strtolower('Wind Rose'), '_'),
                'name' => 'Wind Rose'
            ],
            [
                'thematic' => 'coastal_oceanography',
                'value' => Str::slug(strtolower('Wave Rose'), '_'),
                'name' => 'Wave Rose'
            ],
            [
                'thematic' => 'coastal_oceanography',
                'value' => Str::slug(strtolower('Sea Level Rise'), '_'),
                'name' => 'Sea Level Rise'
            ],
            [
                'thematic' => 'iot',
                'value' => Str::slug(strtolower('Rain Water Harvesting System'), '_'),
                'name' => 'Rain Water Harvesting System'
            ]

        ];

        foreach ($categories as $category) {
            $thematic = Thematic::where('value', $category['thematic'])->first();

            if ($thematic) {
                $category['thematic_id'] = $thematic->id;
                unset($category['thematic']);

                $categoryExist = Category::where('thematic_id', $thematic->id)->where('value', $category['value'])->first();

                if (!$categoryExist) {
                    Category::create($category);
                }
            }
        }
    }
}
