<?php

namespace App\Http\Controllers\Harga;

use App\Http\Controllers\Controller;
use App\Models\HargaPasang;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HargaPasangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $dataHargaPasang = HargaPasang::all();
            return DataTables::of($dataHargaPasang)
                ->addIndexColumn()
                ->addColumn('tindakan', function ($row) {
                    $act['show'] = route('harga-pasang.show', ['harga_pasang' => $row->id]);
                    $act['data'] = $row;

                    return view('components.detail-button', $act)->render();
                })
                ->escapeColumns([])
                // ->rawColumns(['tindakan'])
                ->make(true);
        }
        return view('harga.harga-pasang.index');
    }

    public function data()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('harga.harga-pasang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $dataHargaPasang = new HargaPasang();
        $dataHargaPasang->material = $request->input('material');
        $dataHargaPasang->satuan = $request->input('satuan');
        $dataHargaPasang->klasifikasi = $request->input('klasifikasi');
        // Mengkonversi dataHargaPasang harga dari string ke angka
        $dataHargaPasang->rp_jasa = intval(str_replace(['.'], '', $request->input('rp_jasa')));
        $dataHargaPasang->rp_mdu = intval(str_replace(['.'], '', $request->input('rp_mdu')));
        $dataHargaPasang->rp_non_mdu_dan_jasa = intval(str_replace(['.'], '', $request->input('rp_non_mdu_dan_jasa')));
        $dataHargaPasang->rp_total = intval(str_replace(['.'], '', $request->input('rp_total')));

        // Simpan dataHargaPasang ke database
        $dataHargaPasang->save();

        return redirect()->route('harga-pasang.index')->with(['success' => 'Data Harga Pasang Berhasil Disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $dataHargaPasang = HargaPasang::findOrFail($id);

        return view('harga.harga-pasang.show', compact('dataHargaPasang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $dataHargaPasang = HargaPasang::findOrFail($id);
        return view('harga.harga-pasang.edit', compact('dataHargaPasang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'material' => 'required',
            'satuan' => 'required',
        ]);
        $dataHargaPasang = HargaPasang::findOrFail($id);
        $dataHargaPasang->update([
            'material' => $request->input('material'),
            'satuan' => $request->input('satuan'),
            'klasifikasi' => $request->input('klasifikasi'),
            'rp_jasa' => intval(str_replace(['.'], '', $request->input('rp_jasa'))),
            'rp_mdu' => intval(str_replace(['.'], '', $request->input('rp_mdu'))),
            'rp_non_mdu_dan_jasa' => intval(str_replace(['.'], '', $request->input('rp_non_mdu_dan_jasa'))),
            'rp_total' => intval(str_replace(['.'], '', $request->input('rp_total'))),
        ]);

        return redirect()->route('harga-pasang.index')->with(['success' => 'Data Harga Pasang Berhasil Diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $dataHargaPasang = HargaPasang::findOrFail($id);

        $dataHargaPasang->delete();
        return redirect()->route('harga-pasang.index')->with(['success' => 'Data Harga Pasang Berhasil Dihapus']);
    }
}
