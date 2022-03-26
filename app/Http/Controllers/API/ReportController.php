<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
    * @OA\Get(
    *     security={{"apiAuth":{}}},
    *     path="/api/report",
    *     summary="Show all report",
    *     tags={"Report"},
    *     operationId="allReport",
    *  @OA\Response(
    *     response=200,
    *     description="Show all report",
    *    @OA\JsonContent(
    *            type="array",
    *          @OA\Items(ref="#/components/schemas/Report"),
    *        )
    *   ),
    *   @OA\Response(response="401",description="Unauthorized"),
    * )
    */
    public function index()
    {
        return Report::all();
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
    *     path="/api/report/{date}",
    *     summary="Show report by date",
    *     tags={"Report"},
    *     operationId="bydateReport",
    *     @OA\Parameter(
     *         name="date",
     *         in="path",
     *         description="date report",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
    *  @OA\Response(
    *     response=200,
    *     description="Show report by date",
    *    @OA\JsonContent(
    *            type="array",
    *          @OA\Items(ref="#/components/schemas/Report"),
    *        )
    *   ),
    *   @OA\Response(response="401",description="Unauthorized"),
    * )
    */
    public function show($report_date)
    {
        return Report::whereDate('r_date', '=', $report_date)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
