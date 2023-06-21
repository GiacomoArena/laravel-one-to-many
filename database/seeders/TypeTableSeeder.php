<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Front-end' , 'Back-end' , 'Web designer' , 'Fullstack' , 'Social Media Manager' ,'Data Analyst'];
        foreach ($types as $type) {
            $new_type = new Type();
            $new_type->type = $type;
            $new_type->slug = Type::generateSlug($new_type->type);
            $new_type->save();

        }
    }
}
