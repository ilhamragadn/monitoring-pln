<?php

namespace App\Http\Controllers\UP3\TL_Rensis\Harga;

use App\Http\Controllers\Controller;
use App\Models\HargaBongkar;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HargaBongkarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $dataHargaBongkar = HargaBongkar::all();
            return DataTables::of($dataHargaBongkar)
                ->addIndexColumn()
                ->addColumn('tindakan', function ($row) {
                    $act['show'] = route('hargabongkar-mngr-ren.show', ['hargabongkar_mngr_ren' => $row->id]);
                    $act['data'] = $row;

                    return view('components.detail-button', $act)->render();
                })
                ->escapeColumns([])
                // ->rawColumns(['tindakan'])
                ->make(true);
        }
        return view('up3.manager-perencanaan.harga.harga-bongkar.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('up3.manager-perencanaan.harga.harga-bongkar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $dataHargaBongkar = new HargaBongkar();
        $dataHargaBongkar->material = $request->input('material');
        $dataHargaBongkar->satuan = $request->input('satuan');
        $dataHargaBongkar->klasifikasi = $request->input('klasifikasi');
        // Mengkonversi dataHargaBongkar harga dari string ke angka
        $dataHargaBongkar->rp_jasa = intval(str_replace(['.'], '', $request->input('rp_jasa')));
        $dataHargaBongkar->rp_mdu = intval(str_replace(['.'], '', $request->input('rp_mdu')));
        $dataHargaBongkar->rp_non_mdu_dan_jasa = intval(str_replace(['.'], '', $request->input('rp_non_mdu_dan_jasa')));
        $dataHargaBongkar->rp_total = intval(str_replace(['.'], '', $request->input('rp_total')));

        // Simpan dataHargaBongkar ke database
        $dataHargaBongkar->save();

        return redirect()->route('hargabongkar-mngr-ren.index')->with(['success' => 'Data Harga Bongkar Berhasil Disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $dataHargaBongkar = HargaBongkar::findOrFail($id);
        return view('up3.manager-perencanaan.harga.harga-bongkar.show', compact('dataHargaBongkar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $dataHargaBongkar = HargaBongkar::findOrFail($id);
        return view('up3.manager-perencanaan.harga.harga-bongkar.edit', compact('dataHargaBongkar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->validate($request, [
            'material' => 'required',
            'satuan' => 'required',
        ]);
        $dataHargaBongkar = HargaBongkar::findOrFail($id);
        $dataHargaBongkar->update([
            'material' => $request->input('material'),
            'satuan' => $request->input('satuan'),
            'klasifikasi' => $request->input('klasifikasi'),
            'rp_jasa' => intval(str_replace(['.'], '', $request->input('rp_jasa'))),
            'rp_mdu' => intval(str_replace(['.'], '', $request->input('rp_mdu'))),
            'rp_non_mdu_dan_jasa' => intval(str_replace(['.'], '', $request->input('rp_non_mdu_dan_jasa'))),
            'rp_total' => intval(str_replace(['.'], '', $request->input('rp_total'))),
        ]);

        return redirect()->route('hargabongkar-mngr-ren.index')->with(['success' => 'Data Harga Bongkar Berhasil Diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $dataHargaBongkar = HargaBongkar::findOrFail($id);

        $dataHargaBongkar->delete();
        return redirect()->route('hargabongkar-mngr-ren.index')->with(['success' => 'Data Harga Bongkar Berhasil Dihapus']);
    }
}
