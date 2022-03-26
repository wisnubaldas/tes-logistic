<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 * description="Report model",
 * title="Report model",
 * @OA\Property(property="id", type="integer", format="id", description="id report" ),
 * @OA\Property(property="r_date", type="date", format="r_date", description="tanggal report"),
 * @OA\Property(property="tot_trans", type="integer", format="tot_trans", description="total transaksi per hari"),
 * @OA\Property(property="tot_order", type="integer", format="tot_order", description="total order per hari"),
 * @OA\Property(property="detail", type="object", format="detail", description="detail json string dari transaksi"),
 * )
 */
class Report extends Model
{
    use HasFactory;
    protected $fillable = ['r_date','tot_trans','tot_order','detail'];
    public function getDetailAttribute($value)
    {
        return json_decode($value);
    }
}
