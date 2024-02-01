<?php

namespace App\Http\Controllers\Unit\TL_Teknik\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DataPelanggan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        //
        return view('unit.tl-teknik.dashboard.dashboard');
    }

    public function DashboardTeknikProgress()
    {
        $dataPelanggan = DataPelanggan::selectRaw('data_pelanggans.*, users.name as tl_teknik_name')
            ->join('users', 'users.id', '=', 'data_pelanggans.id_tl_teknik')
            ->where(function ($query) {
                $query->where('data_pelanggans.persetujuan_unit', 'SETUJU')
                    ->orWhere('data_pelanggans.persetujuan_unit', 'TUNGGU')
                    ->orWhere('data_pelanggans.persetujuan_unit', 'TOLAK');
            })
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
            ->with('pasangmaterial')
            ->get();

        return DataTables::of($dataPelanggan)
            ->addIndexColumn()
            ->addColumn('tindakan', function ($row) {
                $act['show'] = route('pelanggan-tl-teknik.show', ['pelanggan_tl_teknik' => $row->id]);
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
