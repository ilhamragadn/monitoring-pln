<?php

namespace App\Http\Controllers\UP3\Manager_Perencanaan\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DataPelanggan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        return view('up3.manager-perencanaan.dashboard.dashboard');
    }

    public function DashboardRenTerkonfirmasi()
    {
        $dataPelanggan = DataPelanggan::selectRaw('data_pelanggans.*, users.name as tl_rensis_name, tl_teknik.name as tl_teknik_name')
            ->leftJoin('users', 'users.id', '=', 'data_pelanggans.id_tl_rensis')
            ->leftJoin('users as tl_teknik', 'tl_teknik.id', '=', 'data_pelanggans.id_tl_teknik')
            ->where('data_pelanggans.persetujuan_unit', 'SETUJU')
            ->where('data_pelanggans.persetujuan_rensis', 'SETUJU')
            ->where(function ($query) {
                $query->where('data_pelanggans.persetujuan_ren', 'SETUJU')
                    ->orWhere('data_pelanggans.persetujuan_ren', 'TOLAK');
            })
            ->with('pasangmaterial')
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
            ->addColumn('created_at', function ($row) {
                $formatDate = Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->format('d-m-Y');
                return $formatDate;
            })
            ->addColumn('ratio', function ($row) {
                $ratios = [];
                foreach ($row->pasangmaterial as $pasangmaterial) {
                    $ratios[] = $pasangmaterial->pivot->ratio;
                }
                return end($ratios);
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

    public function DashboardRenTunggu()
    {
        $dataPelanggan = DataPelanggan::selectRaw('data_pelanggans.*, users.name as tl_rensis_name, tl_teknik.name as tl_teknik_name')
            ->leftJoin('users', 'users.id', '=', 'data_pelanggans.id_tl_rensis')
            ->leftJoin('users as tl_teknik', 'tl_teknik.id', '=', 'data_pelanggans.id_tl_teknik')
            ->where('data_pelanggans.persetujuan_unit', 'SETUJU')
            ->where('data_pelanggans.persetujuan_rensis', 'SETUJU')
            ->where('data_pelanggans.persetujuan_ren', 'TUNGGU')
            ->with('pasangmaterial')
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
            ->addColumn('created_at', function ($row) {
                $formatDate = Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->format('d-m-Y');
                return $formatDate;
            })
            ->addColumn('ratio', function ($row) {
                $ratios = [];
                foreach ($row->pasangmaterial as $pasangmaterial) {
                    $ratios[] = $pasangmaterial->pivot->ratio;
                }
                return end($ratios);
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
