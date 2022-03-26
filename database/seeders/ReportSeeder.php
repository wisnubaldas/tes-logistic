<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Report;
use App\Models\Transaksi;
class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->gen_report() as $r) {
            Report::create($r);
        }
    }
    public function gen_report(Type $var = null)
    {
        $t = Transaksi::orderBy('order_valid_date')
                    ->select([
                        'id','order_id','customer_id',
                        'barang_id','payment_status','total',
                        'order_valid_date'])
                    ->get()
                    ->groupBy(
                        function($t){ 
                            return $t->order_valid_date; 
                        });
        $report = [];
        foreach ($t as $key => $value) {
            $d = [
                'r_date'=>$key,
                'tot_trans'=>$value->count(),
                'tot_order'=>$value->sum('total'),
                'detail'=>$value->toJson()
            ];
            array_push($report,$d);
        }
        return $report;
    }
}
