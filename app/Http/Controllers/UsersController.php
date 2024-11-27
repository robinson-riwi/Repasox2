<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersCreateFormRequest;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $countries = Country::all();
            $users = User::when($request->id, function ($q) use ($request) {
                $q->where('id', $request->id);
            })->when($request->names, function ($q) use ($request) {
                $q->where('names', 'like', '%' . $request->names . '%');
            })->when($request->country_id, function ($q) use ($request) {
                $q->where('country_id', $request->country_id);
            })->get();
            return view('users.index', compact('users', 'countries'));
        } catch (\Exception $e) {
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsersCreateFormRequest $request)
    {
        try {
            $user = User::create($request->all());
            return response()->json($user, 201);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $user = User::find($id);
            return response()->json($user, 201);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $user = User::find($id)->update($request->all());
            return response()->json($user, 201);
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
            $user = User::find($id)->delete();
            return response()->json($user, 201);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function search($q)
    {
        //pendiente
    }
}
