<?php

namespace App\Http\Controllers\UP3\TL_Rensis\Harga;

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
        return view('up3.tl-rensis.harga.harga-pasang.index');
    }

    public function IndexDataHargaPasang()
    {
        $dataHargaPasang = HargaPasang::all();
        return DataTables::of($dataHargaPasang)
            ->addIndexColumn()
            ->addColumn('tindakan', function ($row) {
                $act['show'] = route('hargapasang-tl-rensis.show', ['hargapasang_tl_rensi' => $row->id]);
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
        return view('up3.tl-rensis.harga.harga-pasang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'material' => 'required',
            'satuan' => 'required',
        ]);

        $dataHargaPasang = new HargaPasang();
        $dataHargaPasang->id_tl_rensis = $request->id_tl_rensis;
        $dataHargaPasang->material = $request->material;
        $dataHargaPasang->satuan = $request->satuan;
        $dataHargaPasang->klasifikasi = $request->klasifikasi;
        $dataHargaPasang->rp_jasa = intval(str_replace(['Rp', "\u{A0}", '.'], '', $request->rp_jasa));
        $dataHargaPasang->rp_mdu = intval(str_replace(['Rp', "\u{A0}", '.'], '', $request->rp_mdu));
        $dataHargaPasang->rp_non_mdu_dan_jasa = intval(str_replace(['Rp', "\u{A0}", '.'], '', $request->rp_non_mdu_dan_jasa));
        $dataHargaPasang->rp_total = intval(str_replace(['Rp', "\u{A0}", '.'], '', $request->rp_total));

        // Simpan dataHargaPasang ke database
        $dataHargaPasang->save();

        return redirect()->route('hargapasang-tl-rensis.index')->with(['success' => 'Data Harga Pasang Berhasil Disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $dataHargaPasang = HargaPasang::findOrFail($id);

        return view('up3.tl-rensis.harga.harga-pasang.show', compact('dataHargaPasang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $dataHargaPasang = HargaPasang::findOrFail($id);
        return view('up3.tl-rensis.harga.harga-pasang.edit', compact('dataHargaPasang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'material' => 'required',
            'satuan' => 'required',
        ]);
        $dataHargaPasang = HargaPasang::findOrFail($id);
        $dataHargaPasang->fill($request->all());
        $dataHargaPasang->material = $request->material;
        $dataHargaPasang->satuan = $request->satuan;
        $dataHargaPasang->klasifikasi = $request->klasifikasi;
        $dataHargaPasang->rp_mdu = intval(str_replace(['Rp', "\u{A0}", '.'], '', $request->rp_mdu));
        $dataHargaPasang->rp_jasa = intval(str_replace(['Rp', "\u{A0}", '.'], '', $request->rp_jasa));
        $dataHargaPasang->rp_non_mdu_dan_jasa = intval(str_replace(['Rp', "\u{A0}", '.'], '', $request->rp_non_mdu_dan_jasa));
        $dataHargaPasang->rp_total = intval(str_replace(['Rp', "\u{A0}", '.'], '', $request->rp_total));
        $dataHargaPasang->update();

        return redirect()->route('hargapasang-tl-rensis.index')->with(['success' => 'Data Harga Pasang Berhasil Diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $dataHargaPasang = HargaPasang::findOrFail($id);

        $dataHargaPasang->delete();
        return redirect()->route('hargapasang-tl-rensis.index')->with(['success' => 'Data Harga Pasang Berhasil Dihapus']);
    }
}
