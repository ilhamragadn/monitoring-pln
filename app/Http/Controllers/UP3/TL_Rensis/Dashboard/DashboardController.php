<?php

namespace App\Http\Controllers\UP3\TL_Rensis\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DataPelanggan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    //

    public function index()
    {
        return view('up3.tl-rensis.dashboard.dashboard');
    }

    public function DashboardPersetujuanRen()
    {
        $dataPelanggan = DataPelanggan::selectRaw('data_pelanggans.*, users.name as tl_rensis_name, tl_teknik.name as tl_teknik_name')
            ->leftJoin('users', 'users.id', '=', 'data_pelanggans.id_tl_rensis')
            ->leftJoin('users as tl_teknik', 'tl_teknik.id', '=', 'data_pelanggans.id_tl_teknik')
            ->where('data_pelanggans.persetujuan_unit', 'SETUJU')
            ->where(function ($query) {
                $query->where('data_pelanggans.persetujuan_rensis', 'SETUJU')
                    ->orWhere('data_pelanggans.persetujuan_rensis', 'TUNGGU')
                    ->orWhere('data_pelanggans.persetujuan_rensis', 'TOLAK');
            })
            ->where(function ($query) {
                $query->where('data_pelanggans.persetujuan_ren', 'SETUJU')
                    ->orWhere('data_pelanggans.persetujuan_ren', 'TOLAK');
            })
            ->get();

        return DataTables::of($dataPelanggan)
            ->addIndexColumn()
            ->addColumn('tindakan', function ($row) {
                $act['show'] = route('pelanggan-tl-rensis.show', ['pelanggan_tl_rensi' => $row->id]);
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
            ->addColumn('persetujuan_ren', function ($row) {
                return $row->persetujuan_ren;
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

    public function DashboardPersetujuanRensis()
    {
        $dataPelanggan = DataPelanggan::selectRaw('data_pelanggans.*, users.name as tl_rensis_name, tl_teknik.name as tl_teknik_name')
            ->leftJoin('users', 'users.id', '=', 'data_pelanggans.id_tl_rensis')
            ->leftJoin('users as tl_teknik', 'tl_teknik.id', '=', 'data_pelanggans.id_tl_teknik')
            ->where('data_pelanggans.persetujuan_unit', 'SETUJU')
            ->where(function ($query) {
                $query->where('data_pelanggans.persetujuan_rensis', 'SETUJU')
                    ->orWhere('data_pelanggans.persetujuan_rensis', 'TUNGGU')
                    ->orWhere('data_pelanggans.persetujuan_rensis', 'TOLAK');
            })
            ->get();

        return DataTables::of($dataPelanggan)
            ->addIndexColumn()
            ->addColumn('tindakan', function ($row) {
                $act['show'] = route('pelanggan-tl-rensis.show', ['pelanggan_tl_rensi' => $row->id]);
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
            ->addColumn('persetujuan_rensis', function ($row) {
                return $row->persetujuan_rensis;
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

    public function DashboardRensisProgress()
    {
        $dataPelanggan = DataPelanggan::selectRaw('data_pelanggans.*, users.name as tl_rensis_name, tl_teknik.name as tl_teknik_name')
            ->leftJoin('users', 'users.id', '=', 'data_pelanggans.id_tl_rensis')
            ->leftJoin('users as tl_teknik', 'tl_teknik.id', '=', 'data_pelanggans.id_tl_teknik')
            ->where('data_pelanggans.persetujuan_unit', 'SETUJU')
            ->where(function ($query) {
                $query->where('data_pelanggans.persetujuan_rensis', 'SETUJU')
                    ->orWhere('data_pelanggans.persetujuan_rensis', 'TUNGGU')
                    ->orWhere('data_pelanggans.persetujuan_rensis', 'TOLAK');
            })
            ->where(function ($query) {
                $query->where('data_pelanggans.persetujuan_ren', 'SETUJU')
                    ->orWhere('data_pelanggans.persetujuan_ren', 'TUNGGU')
                    ->orWhere('data_pelanggans.persetujuan_ren', 'TOLAK');
            })
            ->get();

        return DataTables::of($dataPelanggan)
            ->addIndexColumn()
            ->addColumn('tindakan', function ($row) {
                $act['show'] = route('pelanggan-tl-rensis.show', ['pelanggan_tl_rensi' => $row->id]);
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
            ->addColumn('persetujuan_rensis', function ($row) {
                return $row->persetujuan_rensis;
            })
            ->addColumn('persetujuan_ren', function ($row) {
                return $row->persetujuan_ren;
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
