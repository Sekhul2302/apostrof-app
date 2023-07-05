<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\table_t_request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class MasterMenuController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {

            $input = $request->all();
            DB::table('table_t_request')->insert([
                'uuid' =>uuid_create(),
                'nama_request'=> $input['nama_request'],
                'created_at' => now()
            ]);
            return $this->sendResponse([], 'Menu Request berhasil ditambahkan.');
        } catch (\Throwable $th) {
            return $this->sendError($th, 'Error Catch');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
