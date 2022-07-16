<?php

namespace Database\Seeders;
use App\Models\testmo;
use Illuminate\Database\Seeder;

class testmoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        testmo::create([
            'name' => 'basel mohsen',
            'spec' => 'web development',
            'desc' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'img' => '1.png',
        ]);
        testmo::create([
            'name' => 'amr mohsen',
            'spec' => 'mobail development',
            'desc' =>  'It is a long established fact that a reader will be distracted by the readable c',
            'img' => '2.png',
        ]);
        testmo::create([
            'name' => 'ali mohsen',
            'spec' => 'ios development',
            'desc' =>  'There are many variations of passages of Lorem Ipsum available, but the majority have ',
            'img' => '3.png',
        ]);
    }
}
