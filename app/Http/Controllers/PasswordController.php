<?php

namespace App\Http\Controllers;

use App\Models\Password;
use Illuminate\Http\Request;

class  PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index()
    {
        $qb = Password::query();
        $qb->where('user_id', '=', auth()->user()->id);
        //$passwords = Password::orderBy('id', 'desc')->get();
        $passwords = $qb->orderBy('id', 'desc')->get();
        return response()->json($passwords);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $password = new Password;
        $password->user_id = $request->user()->id;
        $password->platform = $request->platform;
        $password->email = $request->email;
        $password->password = $request->password;
        $password->description = $request->description;
        $password->save();

        return response()->json($password);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $password = Password::findOrFail($id);
        return response()->json($password);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $password = Password::findOrFail($id);
        $password->user_id = $request->user()->id;
        $password->platform = $request->platform;
        $password->email = $request->email;
        $password->password = $request->password;
        $password->description = $request->description;
        $password->save();

        return response()->json($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $password = $password = Password::findOrFail($id);
        $password->delete();
        return response()->json($password);
    }
}
