<?php

namespace Database\Seeders;
use App\Models\trainer;
use Illuminate\Database\Seeder;

class trainerseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        trainer::create([
            'name' => 'basel mohsen',
            'spec' => 'web development',
            'img' => '1.png',
        ]);
        trainer::create([
            'name' => 'amr mohsen',
            'spec' => 'mobail development',
            'img' => '2.png',
        ]);
        trainer::create([
            'name' => 'ali mohsen',
            'spec' => 'ios development',
            'img' => '3.png',
        ]);
        trainer::create([
            'name' => 'ahmed kareem',
            'spec' => 'medical',
            'img' => '4.png',
        ]);
        trainer::create([
            'name' => 'mohmmed osama',
            'spec' => 'doctor',
            'img' => '5.png',
        ]);
        trainer::create([
            'name' => 'sara hussien',
            'spec' => 'teacher english',
            'img' => '6.png',
        ]);
        trainer::create([
            'name' => 'rouf khaled',
            'spec' => 'teacher english',
            'img' => '7.png',
        ]);






    }
}
