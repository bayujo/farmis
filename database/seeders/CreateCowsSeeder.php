<?php

namespace Database\Seeders;

use App\Models\Cow;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateCowsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cows = [
            [
               'kode'=>'A1',
               'nama'=>'putih',
               'bobot'=>100,
               'tgl_lahir'=> '2020-08-01',
            ],
            [
                'kode'=>'A1',
                'nama'=>'putih',
                'bobot'=>100,
                'tgl_lahir'=> '2020-08-01',
             ],
             [
                'kode'=>'A1',
                'nama'=>'putih',
                'bobot'=>100,
                'tgl_lahir'=> '2020-08-01',
             ],
             [
                'kode'=>'A1',
                'nama'=>'putih',
                'bobot'=>100,
                'tgl_lahir'=> '2020-08-01',
             ],
             [
                'kode'=>'A1',
                'nama'=>'putih',
                'bobot'=>100,
                'tgl_lahir'=> '2020-08-01',
             ],
             [
                'kode'=>'A1',
                'nama'=>'putih',
                'bobot'=>100,
                'tgl_lahir'=> '2020-08-01',
             ],
             [
               'kode'=>'A1',
               'nama'=>'putih',
               'bobot'=>100,
               'tgl_lahir'=> '2020-08-01',
            ],
        ];
    
        foreach ($cows as $key => $cows) {
            Cow::create($cows);
        }
    }
}
