<?php

namespace App\Http\Controllers\UP3\Manager_Perencanaan\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\DataPelanggan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DataPelangganController extends Controller
{
    //
    public function index()
    {
        //
        return view('up3.manager-perencanaan.pelanggan.index');
    }

    public function IndexDataPelanggan()
    {
        $dataPelanggan = DataPelanggan::selectRaw('data_pelanggans.*, pelanggan_pasangs.*, users.name as tl_rensis_name, tl_teknik.name as tl_teknik_name')
            ->leftJoin('users', 'users.id', '=', 'data_pelanggans.id_tl_rensis')
            ->leftJoin('users as tl_teknik', 'tl_teknik.id', '=', 'data_pelanggans.id_tl_teknik')
            ->join('pelanggan_pasangs', 'pelanggan_pasangs.id_pelanggan', '=', 'data_pelanggans.id')
            ->where('data_pelanggans.persetujuan_rensis', 'SETUJU')
            ->get();

        return DataTables::of($dataPelanggan)
            ->addIndexColumn()
            ->addColumn('tindakan', function ($row) {
                $act['show'] = route('pelanggan-mngr-ren.show', ['pelanggan_mngr_ren' => $row->id]);
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


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
        // $dataPelanggan = DataPelanggan::findOrFail($id);
        // $dataPelangganPasang = $dataPelanggan->pasangmaterial;

        $dataPelanggan = DataPelanggan::selectRaw('data_pelanggans.*, pelanggan_pasangs.*, users.name as tl_rensis_name, tl_teknik.name as tl_teknik_name')
            ->leftJoin('users', 'users.id', '=', 'data_pelanggans.id_tl_rensis')
            ->leftJoin('users as tl_teknik', 'tl_teknik.id', '=', 'data_pelanggans.id_tl_teknik')
            ->join('pelanggan_pasangs', 'pelanggan_pasangs.id_pelanggan', '=', 'data_pelanggans.id')
            ->where('data_pelanggans.persetujuan_unit', 'SETUJU')
            ->where('data_pelanggans.persetujuan_rensis', 'SETUJU')
            ->where('data_pelanggans.id', $id)
            ->first();
        return view('up3.manager-perencanaan.pelanggan.show', compact('dataPelanggan'));
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

    public function UpdateApprovalRen(Request $request, $id)
    {
        //
        $dataPelanggan = DataPelanggan::findOrFail($id);
        $dataPelanggan->persetujuan_ren = $request->persetujuan_ren;
        $dataPelanggan->id_mngr_ren = $request->id_mngr_ren;
        $dataPelanggan->update();
        return redirect()->route('pelanggan-mngr-ren.index')->with(['success' => 'Data Pelanggan Berhasil Diperbarui']);
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
