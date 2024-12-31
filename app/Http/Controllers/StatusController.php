<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Status;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Status::query();

            if (request()->ajax() && !request()->get('order')) {
                $query = $query->orderByDesc('created_at');
            }

            return DataTables::of($query)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {
                    $btn = '<button onclick="editItem(' . $row->id_produk_status . ')" type="button" class="btn btn-icon btn-warning-transparent rounded-pill btn-wave"><i class="fa-solid fa-pen-to-square"></i></button>';

                    $pick = Produk::where('id_status', $row->id_produk_status)->first();
                    if (!$pick) {
                        $btn .= '<button type="button" onclick="delItem(' . $row->id_produk_status . ')" class="btn btn-icon btn-danger-transparent rounded-pill btn-wave"><i class="fa-solid fa-trash"></i></button>';
                    }


                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.master.status');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $event = Status::create($request->post());
        return response()->json($event);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return Status::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Status::find($id)->update($request->post());
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Status::destroy($id);
        return $data;
    }
}
