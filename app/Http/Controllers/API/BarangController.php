<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
    * @OA\Get(
    *     security={{"apiAuth":{}}},
    *     path="/api/barang",
    *     summary="Get all barang",
    *     tags={"Barang"},
    *     operationId="getAllBarang",
    *  @OA\Response(
    *     response=200,
    *     description="All barang",
    * @OA\JsonContent(
*            type="array",
 *          @OA\Items(ref="#/components/schemas/Barang"),
*        )
    *   ),
    *   @OA\Response(response="401",description="Unauthorized"),
    * )
    */  
    public function index()
    {
        return Barang::all();
    }


    /**
    * @OA\Post(
    *     security={{"apiAuth":{}}},
    *     path="/api/barang",
    *     summary="Create Barang",
    *     tags={"Barang"},
    *     operationId="createBarang",
    * @OA\RequestBody(
 *        description="Request body parameter",
 *        required=true,
 *        @OA\MediaType(
 *             mediaType="application/json",
 *              @OA\Schema(ref="#/components/schemas/Barang"),
 *          )
 *     ),  
    *  @OA\Response(
    *     response=200,
    *     description="Create Barang",
    * @OA\JsonContent(
    *           @OA\Property(property="message", type="string", example="sukses create barang")
    *        )
    *   ),
    *   @OA\Response(response="401",description="Unauthorized"),
    * )
    */
    public function store(Request $request)
    {
        $request->validate([
            'satuan_id'=>'required|integer',
            'kd_barang'=>'required|unique:barangs',
            'nama'=>'required',
            'harga'=>'required',
            'gambar'=>'required',
            'qr'=>'required',
            'qty'=>'required|integer'
        ]);
        Barang::create($request->all());
        return response()->json(['message'=>'sukses create barang']);
    }
    // @OA\Property(property="data", type="object", ref="#/components/schemas/Barang")
    /**
    * @OA\Get(
    *     security={{"apiAuth":{}}},
    *     path="/api/barang/{any}",
    *     summary="Show barang",
    *     tags={"Barang"},
    *     operationId="showBarang",
    *     @OA\Parameter(
     *         name="any",
     *         in="path",
     *         description="apapun data yg di input akan di cari",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
    *  @OA\Response(
    *     response=200,
    *     description="Show barang",
    *    @OA\JsonContent(
*            type="array",
 *          @OA\Items(ref="#/components/schemas/Barang"),
*        )
    *   ),
    *   @OA\Response(response="401",description="Unauthorized"),
    * )
    */
    public function show($barang)
    {
        return Barang::search($barang)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        //
    }
}
