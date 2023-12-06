<?php

namespace App\Http\Controllers\Unit\TL_Teknik\Harga;

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
        return view('unit.tl-teknik.harga.harga-pasang.index');
    }

    public function IndexDataHargaPasang()
    {
        $dataHargaPasang = HargaPasang::all();
        return DataTables::of($dataHargaPasang)
            ->addIndexColumn()
            ->addColumn('tindakan', function ($row) {
                $act['show'] = route('hargapasang-tl-teknik.show', ['hargapasang_tl_teknik' => $row->id]);
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

        return view('unit.tl-teknik.harga.harga-pasang.show', compact('dataHargaPasang'));
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
