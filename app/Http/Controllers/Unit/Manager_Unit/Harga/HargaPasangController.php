<?php

namespace App\Http\Controllers\Unit\Manager_Unit\Harga;

use App\Http\Controllers\Controller;
use App\Models\HargaPasang;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HargaPasangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('unit.manager-unit.harga.harga-pasang.index');
    }

    public function IndexDataHargaPasang()
    {
        $dataHargaPasang = HargaPasang::all();
        return DataTables::of($dataHargaPasang)
            ->addIndexColumn()
            ->addColumn('tindakan', function ($row) {
                $act['show'] = route('hargapasang-mngr-unit.show', ['hargapasang_mngr_unit' => $row->id]);
                $act['data'] = $row;

                return view('components.detail-button', $act)->render();
            })
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('unit.manager-unit.harga.harga-pasang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $dataHargaPasang = HargaPasang::findOrFail($id);

        return view('unit.manager-unit.harga.harga-pasang.show', compact('dataHargaPasang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
