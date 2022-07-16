<?php

namespace Database\Seeders;

use App\Models\Sitecontent as ModelsSitecontent;
use Illuminate\Database\Seeder;

class sitecontent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ModelsSitecontent::create([
        //     'name'=>'banner',           
        //     'content'=>json_encode([
        //     'tittle'=>'Making Your students World Better',
        //     'subtittle'=>'Making Your students World Better Making Your Childs World Better',
        //     'desc'=>"Replenish seasons may male hath fruit beast were seas saw you arrie said man beast whales his void unto last session for bite. Set have great you'll male grass yielding yielding man"
        //     ]),
            
        // ]);

        ModelsSitecontent::create([
            'name'=>'courses',           
            'content'=>json_encode([
            'tittle'=>'our courses',
            'subtittle'=>'different courses',
            ]),
            
        ]);
    }
}
