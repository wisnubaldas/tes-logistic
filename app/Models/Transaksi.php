<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 * description="Transaksi model",
 * title="Transaksi model",
 * @OA\Property(property="id", type="integer", format="id", description="id transaksi" ),
 * @OA\Property(property="order_id", type="integer", format="order_id", description="id order"),
 * @OA\Property(property="customer_id", type="integer", format="customer_id", description="id customer"),
 * @OA\Property(property="barang_id", type="integer", format="harga", description="id barang"),
 * @OA\Property(property="owner_name", type="string", format="owner_name", description="nama pembeli"),
 * @OA\Property(property="cardbank_type", type="string", format="cardbank_type", description="tipe kartu kredit"),
 * @OA\Property(property="card_number", type="string", format="card_number", description="nomer kartu kredit"),
 * @OA\Property(property="payment_status", type="string", format="payment_status", description="status pembayaran"),
 * @OA\Property(property="total", type="integer", format="total", description="total barang yang dibeli"),
 * @OA\Property(property="order_valid_date", type="date", format="order_valid_date", description="tanggal valid transaksi"),
 * @OA\Property(property="order_valid_time", type="time", format="order_valid_time", description="jam valid transaksi"),
 * )
 */
class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['order_id','customer_id','barang_id',
                            'owner_name','cardbank_type','card_number',
                            'payment_status','total','order_valid_date',
                            'order_valid_time'];
}
