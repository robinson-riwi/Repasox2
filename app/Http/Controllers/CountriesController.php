<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $countries = Country::all();
            return response()->json($countries, 200);
        } catch (\Exception $e) {

        }
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        try {
            $country = Country::create($request->all());
            return response()->json($country, 201);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function edit($id)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $country = Country::find($id);
            return response()->json($country, 201);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
    //PUT, PATCH
    public function update(Request $request, string $id)
    {
        try {
            $country = Country::find($id)->update($request->all());
            return response()->json($country, 201);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $country = Country::find($id)->delete();
            return response()->json($country, 201);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }


}
