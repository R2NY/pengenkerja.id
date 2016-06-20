<?php

use Illuminate\Database\Seeder;

use App\Pelamar;

class PelamarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pelamar = Pelamar::create([
        	'nama' 		=> 'Nur Muhammad',
            'kelamin'   => 'L',
        	'email' 	=> 'blog.nurmuhammad@gmail.com',
        	'alamat' 	=> 'The Cave, Perumahan Kavling UII',
        	'telepon' 	=> '087864423038',
        	'pendidikan'=> 'SMK Multimedia',
        	'kemampuan' => 'Desain Grafis',
        	'username' 	=> 'ngekoding',
        	'password'	=> bcrypt('123456'),
        ]);

        $pelamar = Pelamar::create([
        	'nama' 		=> 'Resqa Dahmurah',
            'kelamin'   => 'P',
        	'email' 	=> 'dahmurah.resqa@gmail.com',
        	'alamat' 	=> 'The Cave, Perumahan Kavling UII',
        	'telepon' 	=> '082864423038',
        	'pendidikan'=> 'SMA IPA',
        	'kemampuan' => 'English',
        	'username' 	=> 'dahmurah',
        	'password'	=> bcrypt('123456'),
        ]);
    }
}
