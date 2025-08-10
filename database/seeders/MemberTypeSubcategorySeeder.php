<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MemberType;
use App\Models\MemberSubcategory;

class MemberTypeSubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create member types a, b, c (without subcategories)
        $memberTypes = [
            [
                'title' => 'a',
                'slug' => 'a',
                'status' => true,
                'has_subcategory' => false
            ],
            [
                'title' => 'b',
                'slug' => 'b',
                'status' => true,
                'has_subcategory' => false
            ],
            [
                'title' => 'c',
                'slug' => 'c',
                'status' => true,
                'has_subcategory' => false
            ],
            [
                'title' => 'd',
                'slug' => 'd',
                'status' => true,
                'has_subcategory' => true
            ]
        ];

        foreach ($memberTypes as $typeData) {
            $memberType = MemberType::updateOrCreate(
                ['title' => $typeData['title']],
                $typeData
            );

            // If this is type 'd', create subcategories
            if ($typeData['title'] === 'd') {
                $subcategories = ['1', '2', '3'];

                foreach ($subcategories as $subcategoryName) {
                    MemberSubcategory::updateOrCreate(
                        [
                            'member_type_id' => $memberType->id,
                            'name' => $subcategoryName
                        ],
                        [
                            'member_type_id' => $memberType->id,
                            'name' => $subcategoryName,
                            'status' => true
                        ]
                    );
                }
            }
        }
    }
}
