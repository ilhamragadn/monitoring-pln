<?php

namespace App\Http\Controllers\Unit\Manager_Unit\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DataPelanggan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        //
        return view('unit.manager-unit.dashboard.dashboard');
    }

    public function DashboardUnitTerkonfirmasi()
    {
        //
        $dataPelanggan = DataPelanggan::selectRaw('data_pelanggans.*, pelanggan_pasangs.*, users.name as tl_teknik_name')
            ->join('users', 'users.id', '=', 'data_pelanggans.id_tl_teknik')
            ->join('pelanggan_pasangs', 'pelanggan_pasangs.id_pelanggan', '=', 'data_pelanggans.id')
            ->where(function ($query) {
                $query->where('data_pelanggans.persetujuan_unit', 'SETUJU')
                    ->orWhere('data_pelanggans.persetujuan_unit', 'TOLAK');
            })
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
            ->addColumn('persetujuan_unit', function ($row) {
                return $row->persetujuan_unit;
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

    public function DashboardUnitTunggu()
    {
        //
        $dataPelanggan = DataPelanggan::selectRaw('data_pelanggans.*, pelanggan_pasangs.*, users.name as tl_teknik_name')
            ->join('users', 'users.id', '=', 'data_pelanggans.id_tl_teknik')
            ->join('pelanggan_pasangs', 'pelanggan_pasangs.id_pelanggan', '=', 'data_pelanggans.id')
            ->where('data_pelanggans.persetujuan_unit', 'TUNGGU')
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
            ->addColumn('persetujuan_unit', function ($row) {
                return $row->persetujuan_unit;
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
}
