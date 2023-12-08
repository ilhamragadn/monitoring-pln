<?php

namespace App\Http\Controllers\Unit\Manager_Unit\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\DataPelanggan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DataPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('unit.manager-unit.pelanggan.index');
    }

    public function IndexDataPelanggan()
    {
        //$dataPelanggan = DataPelanggan::all();

        $dataPelanggan = DataPelanggan::selectRaw('data_pelanggans.*, users.name as tl_teknik_name')
            ->join('users', 'users.id', '=', 'data_pelanggans.id_tl_teknik')
            ->get();

        return DataTables::of($dataPelanggan)
            ->addIndexColumn()
            ->addColumn('tindakan', function ($row) {
                $act['show'] = route('pelanggan-mngr-unit.show', ['pelanggan_mngr_unit' => $row->id]);
                $act['data'] = $row;

                return view('components.detail-button', $act)->render();
            })
            ->addColumn('nama_pelanggan', function ($row) {
                return $row->nama_pelanggan;
            })
            ->addColumn('alamat_pelanggan', function ($row) {
                return $row->alamat_pelanggan;
            })
            ->addColumn('jumlah_pelanggan', function ($row) {
                return $row->jumlah_pelanggan;
            })
            ->addColumn('ulp', function ($row) {
                return $row->ulp;
            })
            ->addColumn('jenis_permohonan', function ($row) {
                return $row->jenis_permohonan;
            })
            ->addColumn('delta', function ($row) {
                return $row->delta;
            })
            ->addColumn('nilai_bp', function ($row) {
                return $row->nilai_bp;
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
    public function show(Request $request, $id)
    {
        //
        // $dataPelanggan = DataPelanggan::findOrFail($id);
        // $dataPelangganPasang = $dataPelanggan->pasangmaterial;

        $dataPelanggan = DataPelanggan::selectRaw('data_pelanggans.*, users.name as tl_teknik_name')
            ->join('users', 'users.id', '=', 'data_pelanggans.id_tl_teknik')
            ->where('data_pelanggans.id', $id)
            ->first();

        return view('unit.manager-unit.pelanggan.show', compact('dataPelanggan'));
    }


    public function ShowDetailDataPelanggan($id)
    {
        $dataPelanggan = DataPelanggan::findOrFail($id);
        $dataPelangganPasang = $dataPelanggan->pasangmaterial;

        return DataTables::of($dataPelangganPasang)
            ->addIndexColumn()
            ->addColumn('material', function ($row) {
                return $row->material;
            })
            ->addColumn('banyak_material', function ($row) {
                return $row->pivot->banyak_material;
            })
            ->addColumn('nilai_rab_mdu', function ($row) {
                return $row->pivot->nilai_rab_mdu;
            })
            ->addColumn('nilai_rab_jasa', function ($row) {
                return $row->pivot->nilai_rab_jasa;
            })
            ->addColumn('ratio', function ($row) {
                return $row->pivot->ratio;
            })
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $dataPelanggan = DataPelanggan::findOrFail($id);
        $dataPelanggan->persetujuan_unit = $request->persetujuan_unit;
        $dataPelanggan->id_mngr_unit = $request->id_mngr_unit;
        $dataPelanggan->save();
        return redirect()->route('pelanggan-mngr-unit.index')->with(['success' => 'Data Pelanggan Berhasil Diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
