<?php

namespace Database\Seeders;
use App\Models\course;

use Illuminate\Database\Seeder;

class courseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1 ;$i<=3 ;$i++){
            for($j=1 ; $j<=7 ;$j++){
                course::create([
                    'cat_id'=>$i,
                    'trainer_id'=>rand(1,7),
                    'name'=>"cpurse num $j cat num $i",
                    'small_desc'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. ",
                    'desc'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.                    ",
                    "price"=>rand(1000,5000),
                    "img"=>"$i$j.png"

                ]);
            }
        }
        
    }
}
