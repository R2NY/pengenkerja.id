<?php

use Illuminate\Database\Seeder;

use App\Penyedia;
use App\Kategori;

class PenyediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$kategori = Kategori::get()->first();

        $penyedia = Penyedia::create([
        	'nama' 		=> 'CV. Sasak Techno',
        	'email' 	=> 'info@sasaktechno.com',
        	'alamat' 	=> 'Jalan Rajawali No. 1, Perumahan Kavling UII',
        	'id_kategori'=> $kategori->id,
        	'website' 	=> 'sasaktechno.com',
        	'telepon' 	=> '081264423038',
        	'username' 	=> 'sasaktechno',
        	'password'	=> bcrypt('123456'),
        	'status'	=> 0,
        ]);
    }
}
