<?php

namespace App\Http\Controllers\UP3\Manager_Perencanaan\Calon_Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\CalonPelanggan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CalonPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $dataCaPel = CalonPelanggan::all();
            return DataTables::of($dataCaPel)
                ->addIndexColumn()
                ->addColumn('tindakan', function ($row) {
                    $act['show'] = route('capel-mngr-ren.show', ['capel_mngr_ren' => $row->id]);
                    $act['data'] = $row;

                    return view('components.detail-button', $act)->render();
                })
                ->escapeColumns([])
                // ->rawColumns(['tindakan'])
                ->make(true);
        }
        return view('up3.manager-perencanaan.calon-pelanggan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('up3.manager-perencanaan.calon-pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'nama_pelanggan' => 'required',
            'ulp' => 'required',
            'jenis_permohonan' => 'required',
            'jumlah_pelanggan' => 'numeric'
        ]);
        $dataCaPel = new CalonPelanggan();
        $dataCaPel->nama_pelanggan = $request->input('nama_pelanggan');
        $dataCaPel->alamat_pelanggan = $request->input('alamat_pelanggan');
        $dataCaPel->ulp = $request->input('ulp');
        $dataCaPel->jenis_permohonan = $request->input('jenis_permohonan');
        $dataCaPel->tarif_lama = $request->input('tarif_lama');
        $dataCaPel->daya_lama = intval(str_replace(['.'], '', $request->input('daya_lama')));
        $dataCaPel->tarif_baru = $request->input('tarif_baru');
        $dataCaPel->daya_baru = intval(str_replace(['.'], '', $request->input('daya_baru')));
        $dataCaPel->delta = intval(str_replace(['.'], '', $request->input('delta')));
        $dataCaPel->jumlah_pelanggan = $request->input('jumlah_pelanggan');
        $dataCaPel->nilai_bp = intval(str_replace(['.'], '', $request->input('nilai_bp')));

        $dataCaPel->save();

        return redirect()->route('capel-mngr-ren.index')->with(['Data Calon Pelanggan Berhasil Disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $dataCaPel = CalonPelanggan::findOrFail($id);

        return view('up3.manager-perencanaan.calon-pelanggan.show', compact('dataCaPel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $dataCaPel = CalonPelanggan::findOrFail($id);
        return view('up3.manager-perencanaan.calon-pelanggan.edit', compact('dataCaPel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->validate($request, [
            'nama_pelanggan' => 'required',
            'ulp' => 'required',
            'jenis_permohonan' => 'required',
            'jumlah_pelanggan' => 'numeric'
        ]);
        $dataCaPel = CalonPelanggan::findOrFail($id);
        $dataCaPel->update([
            'nama_pelanggan' => $request->input('nama_pelanggan'),
            'alamat_pelanggan' => $request->input('alamat_pelanggan'),
            'ulp' => $request->input('ulp'),
            'jenis_permohonan' => $request->input('jenis_permohonan'),
            'tarif_lama' => $request->input('tarif_lama'),
            'daya_lama' => intval(str_replace(['.'], '', $request->input('daya_lama'))),
            'tarif_baru' => $request->input('tarif_baru'),
            'daya_baru' => intval(str_replace(['.'], '', $request->input('daya_baru'))),
            'delta' => intval(str_replace(['.'], '', $request->input('delta'))),
            'jumlah_pelanggan' => $request->input('jumlah_pelanggan'),
            'nilai_bp' => intval(str_replace(['.'], '', $request->input('nilai_bp'))),
        ]);

        return redirect()->route('capel-mngr-ren.index')->with(['Data Calon Pelanggan Berhasil Diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $dataCaPel = CalonPelanggan::findOrFail($id);
        $dataCaPel->delete();
        return redirect()->route('capel-mngr-ren.index')->with(['Data Calon Pelanggan Berhasil Dihapus']);
    }
}
