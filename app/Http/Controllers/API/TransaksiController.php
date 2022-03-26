<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
    * @OA\Get(
    *     security={{"apiAuth":{}}},
    *     path="/api/transaksi",
    *     summary="Show transaksi",
    *     tags={"Transaksi"},
    *     operationId="allTransaksi",
    *  @OA\Response(
    *     response=200,
    *     description="Show transaksi",
    *    @OA\JsonContent(
    *            type="array",
    *          @OA\Items(ref="#/components/schemas/Transaksi"),
    *        )
    *   ),
    *   @OA\Response(response="401",description="Unauthorized"),
    * )
    */
    public function index()
    {
        return Transaksi::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
    * @OA\Get(
    *     security={{"apiAuth":{}}},
    *     path="/api/transaksi/{id}",
    *     summary="Show transaksi",
    *     tags={"Transaksi"},
    *     operationId="showTransaksi",
    *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="kalo ini berdasarkan id transaksi",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
    *  @OA\Response(
    *     response=200,
    *     description="Show transaksi",
    *     @OA\JsonContent(
*            type="array",
 *          @OA\Items(ref="#/components/schemas/Transaksi"),
*        )
    *   ),
    *   @OA\Response(response="401",description="Unauthorized"),
    * )
    */
    public function show(Transaksi $transaksi)
    {
        return $transaksi;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
