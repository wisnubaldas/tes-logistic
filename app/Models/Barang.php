<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * @OA\Schema(
 * description="Barang model",
 * title="Barang model",
 * @OA\Property(property="satuan_id", type="integer", format="satuan_id", description="id satuan" ),
 * @OA\Property(property="kd_barang", type="string", format="kd_barang", description="kode barang"),
 * @OA\Property(property="nama", type="string", format="nama", description="nama barang"),
 * @OA\Property(property="harga", type="string", format="harga", description="harga barang"),
 * @OA\Property(property="qr", type="string", format="qr", description="qr barang"),
 * @OA\Property(property="qty", type="integer", format="qty", description="quantity barang"),
 * @OA\Property(property="gambar", type="string", format="gambar", description="Link gambar"),
 * 
 * )
 */
class Barang extends Model
{
    use HasFactory, Searchable;
    protected $fillable = ['satuan_id','kd_barang','nama','harga','gambar','qr','qty'];
    public function toSearchableArray()
    {
        return [
            'kd_barang' => $this->kd_barang,
            'nama' => $this->nama,
            'harga' => $this->harga,
            'qr' => $this->qr,
            'qty' => $this->qty,
        ];
    }
    
}
