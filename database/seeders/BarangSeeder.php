<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;
use Faker\Generator as Faker;
class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 50; $i++) { 
            Barang::create(self::generate_data());
        }
    }
    public static function generate_data()
    {
        $faker = \Faker\Factory::create();
        \Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($faker);
        
        return [
            'satuan_id'=>$faker->randomDigitNotNull(),
            'kd_barang'=>$faker->numerify('BR-####'),
            'nama'=>$faker->deviceModelName,
            'harga'=>$faker->numerify('#######'),
            'gambar'=>$faker->image(null, 640, 480),
            'qr'=>$faker->isbn13(),
            'qty'=>$faker->randomDigitNotNull(),
        ];
    }
}
