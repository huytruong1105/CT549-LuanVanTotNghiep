<?php

namespace App\Http\Controllers;

use App\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * Display the specified resource.
     *
     * @param  \App\Disctrict  $disctricte
     * @return \Illuminate\Http\Response
     */
    public function show(Disctrict $disctrict)
    {
        //
    }

        /**
     * Display the specified resource.
     *
     * @param  
     * @return 
     */

    public function showCompanies($district_id){
        $district = District::find($district_id);
        $companies = $district->company;
        if(isset($companies)){
            return [
                'status' => true,
                'data' => $companies,
                'message' => []
            ];

        }
        return [
            'status' => false,
            'data' => [],
            'message' => ['Không có dữ liệu']
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Disctrict  $disctrict
     * @return \Illuminate\Http\Response
     */
    public function edit(Disctrict $disctrict)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Disctrict  $disctrict
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disctrict $disctrict)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Disctrict  $disctrict
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disctrict $disctrict)
    {
        //
    }
}
