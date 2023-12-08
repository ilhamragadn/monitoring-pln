<?php

namespace App\Http\Controllers\UP3\Manager_Perencanaan\Pelanggan;

use App\Http\Controllers\Controller;
use App\Mail\ApprovalRen;
use App\Mail\RejectRen;
use App\Models\DataPelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        $dataPelanggan = DataPelanggan::selectRaw('data_pelanggans.*, users.name as tl_rensis_name, tl_teknik.name as tl_teknik_name')
            ->leftJoin('users', 'users.id', '=', 'data_pelanggans.id_tl_rensis')
            ->leftJoin('users as tl_teknik', 'tl_teknik.id', '=', 'data_pelanggans.id_tl_teknik')
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


    public function show($id, Request $request)
    {
        //
        $dataPelanggan = DataPelanggan::selectRaw('data_pelanggans.*, users.name as tl_rensis_name, tl_teknik.name as tl_teknik_name')
            ->leftJoin('users', 'users.id', '=', 'data_pelanggans.id_tl_rensis')
            ->leftJoin('users as tl_teknik', 'tl_teknik.id', '=', 'data_pelanggans.id_tl_teknik')
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
        $dataPelanggan = DataPelanggan::selectRaw('data_pelanggans.*, users.name as tl_rensis_name, tl_teknik.name as tl_teknik_name')
            ->leftJoin('users', 'users.id', '=', 'data_pelanggans.id_tl_rensis')
            ->leftJoin('users as tl_teknik', 'tl_teknik.id', '=', 'data_pelanggans.id_tl_teknik')
            ->where('data_pelanggans.persetujuan_unit', 'SETUJU')
            ->where('data_pelanggans.persetujuan_rensis', 'SETUJU')
            ->where('data_pelanggans.id', $id)
            ->first();

        $dataPelanggan->persetujuan_ren = $request->persetujuan_ren;
        $dataPelanggan->id_mngr_ren = $request->id_mngr_ren;
        $dataPelanggan->update();

        //DISETUJUI
        if ($dataPelanggan->id_tl_teknik != null && $request->persetujuan_ren == 'SETUJU') {
            //
            $nama_penerima = $dataPelanggan->tl_teknik->name;
            $email_penerima = $dataPelanggan->tl_teknik->email;
            $nama_manager_ren = auth()->user()->name;
            $nama_pelanggan = $dataPelanggan->nama_pelanggan;
            $alamat_pelanggan = $dataPelanggan->alamat_pelanggan;
            $jenis_permohonan = $dataPelanggan->jenis_permohonan;
            $detailPesanan = $dataPelanggan->pasangmaterial;
            $MailApprove = [
                'judul' => 'Pemberitahuan Konfirmasi Data Pelanggan Atas Nama: ' . $nama_pelanggan,
                'nama_penerima' => $nama_penerima,
                'nama_manager_ren' => $nama_manager_ren,
                'nama_pelanggan' => $nama_pelanggan,
                'alamat_pelanggan' => $alamat_pelanggan,
                'jenis_permohonan' => $jenis_permohonan,
                'material_pesanan' => $detailPesanan->pluck('material')->toArray(),
                'banyak_material' => $detailPesanan->pluck('pivot.banyak_material')->toArray(),
            ];
            // dd($MailApprove . $email_penerima);
            Mail::to($email_penerima)->send(new ApprovalRen($MailApprove));
        }
        //DITOLAK
        else if ($dataPelanggan->id_tl_teknik != null && $request->persetujuan_ren == 'TOLAK') {
            //
            $nama_penerima = $dataPelanggan->tl_teknik->name;
            $email_penerima = $dataPelanggan->tl_teknik->email;
            $nama_manager_ren = auth()->user()->name;
            $nama_pelanggan = $dataPelanggan->nama_pelanggan;
            $alamat_pelanggan = $dataPelanggan->alamat_pelanggan;
            $jenis_permohonan = $dataPelanggan->jenis_permohonan;
            $detailPesanan = $dataPelanggan->pasangmaterial;
            $MailReject = [
                'judul' => 'Pemberitahuan Konfirmasi Data Pelanggan Atas Nama: ' . $nama_pelanggan,
                'nama_penerima' => $nama_penerima,
                'nama_manager_ren' => $nama_manager_ren,
                'nama_pelanggan' => $nama_pelanggan,
                'alamat_pelanggan' => $alamat_pelanggan,
                'jenis_permohonan' => $jenis_permohonan,
                'material_pesanan' => $detailPesanan->pluck('material')->toArray(),
                'banyak_material' => $detailPesanan->pluck('pivot.banyak_material')->toArray(),
            ];
            // dd($MailReject . $email_penerima);
            Mail::to($email_penerima)->send(new RejectRen($MailReject));
        }
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
