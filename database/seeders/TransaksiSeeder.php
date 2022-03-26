<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaksi;
class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 50; $i++) { 
            Transaksi::create(self::gen_data());
        }
    }
    public static function gen_data()
    {
        $faker = \Faker\Factory::create();
        \Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($faker);
        return [
            'order_id'=>$faker->numberBetween(1, 50),
            'customer_id'=>$faker->numberBetween(1, 50),
            'barang_id'=>$faker->numberBetween(1, 50),
            'owner_name'=>$faker->name(),
            'cardbank_type'=>$faker->creditCardType(),
            'card_number'=>$faker->creditCardNumber(),
            'payment_status'=>$faker->randomElement(['pending','ordered','paid','send','deliver','fail']),
            'total'=>$faker->randomDigitNotNull(),
            'order_valid_date'=>$faker->dateTimeBetween('-1 day', '+7 day'),
            'order_valid_time'=>$faker->time('H:i:s')
        ];
    }
}
