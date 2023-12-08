<?php

namespace App\Http\Controllers\Unit\TL_Teknik\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\DataPelanggan;
use App\Models\HargaPasang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class DataPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('unit.tl-teknik.pelanggan.index');
    }

    public function IndexDataPelanggan()
    {
        $dataPelanggan = DataPelanggan::selectRaw('data_pelanggans.*, users.name as tl_teknik_name')
            ->join('users', 'users.id', '=', 'data_pelanggans.id_tl_teknik')
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
        return view('unit.tl-teknik.pelanggan.create');
    }

    public function AddDataPelanggan()
    {
        $dataHargaPasang = HargaPasang::all();

        return DataTables::of($dataHargaPasang)
            ->addIndexColumn()
            ->addColumn('banyak_material', function ($row) {
                return $row->banyak_material;
            })
            ->addColumn('total_rp_mdu', function ($row) {
                return $row->total_rp_mdu;
            })
            ->addColumn('total_rp_jasa', function ($row) {
                return $row->total_rp_jasa;
            })
            ->addColumn('nilai_rab_mdu', function ($row) {
                return $row->nilai_rab_mdu;
            })
            ->addColumn('nilai_rab_jasa', function ($row) {
                return $row->nilai_rab_jasa;
            })
            ->addColumn('ratio', function ($row) {
                return $row->ratio;
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_pelanggan' => 'required',
            'ulp' => 'required',
            'jenis_permohonan' => 'required',
            'jumlah_pelanggan' => 'integer',
            'foto_survei.*' => 'image|mimes:jpeg,jpg,png|max:3072'
        ]);

        // Unggah file foto_survei
        $data = [];
        if ($request->hasFile('foto_survei')) {
            foreach ($request->file('foto_survei') as $fotoSurvei) {
                $name = $fotoSurvei->getClientOriginalName();
                $fotoSurvei->storeAs('public/pelanggans', $name);
                $data[] = $name;
            }
        }

        $dataPelanggan = new DataPelanggan();
        $dataPelanggan->fill($request->all());
        $dataPelanggan->id_tl_teknik = $request->id_tl_teknik;
        $dataPelanggan->no_regis = $request->no_regis;
        $dataPelanggan->nama_pelanggan = $request->nama_pelanggan;
        $dataPelanggan->alamat_pelanggan = $request->alamat_pelanggan;
        $dataPelanggan->ulp = $request->ulp;
        $dataPelanggan->jenis_permohonan = $request->jenis_permohonan;
        $dataPelanggan->tarif_lama = $request->tarif_lama;
        $dataPelanggan->tarif_baru = $request->tarif_baru;
        $dataPelanggan->daya_lama = intval(str_replace(['.'], '', $request->daya_lama));
        $dataPelanggan->daya_baru = intval(str_replace(['.'], '', $request->daya_baru));
        $dataPelanggan->delta = intval(str_replace(['.'], '', $request->delta));
        $dataPelanggan->jumlah_pelanggan = $request->jumlah_pelanggan;
        $dataPelanggan->nilai_bp = intval(str_replace(['Rp', "\u{A0}", '.', ',00'], '', $request->nilai_bp));
        $dataPelanggan->kepastian_pelanggan = $request->kepastian_pelanggan;
        $dataPelanggan->vendor = $request->vendor;
        $dataPelanggan->lama_bayar = $request->lama_bayar;
        $dataPelanggan->tgl_dpb_ulp = $request->tgl_dpb_ulp;
        $dataPelanggan->tgl_kajian_ren = $request->tgl_kajian_ren;
        $dataPelanggan->tgl_logistik_kons = $request->tgl_logistik_kons;
        $dataPelanggan->tgl_reservasi_kons = $request->tgl_reservasi_kons;
        $dataPelanggan->tgl_register_pp = $request->tgl_register_pp;
        $dataPelanggan->tgl_bayar_pp = $request->tgl_bayar_pp;
        $dataPelanggan->tgl_pdl_pp = $request->tgl_pdl_pp;

        // Simpan foto_survei
        $dataPelanggan->foto_survei = json_encode($data);
        $dataPelanggan->save();

        // Simpan relasi dengan pasangmaterial
        if ($request->has('material_id')) {
            $pasangmaterial = [];
            foreach ($request->material_id as $key => $materialId) {
                $banyakMaterial = $request->banyak_material[$key];
                $RABMDU = intval(str_replace(['Rp', "\u{A0}", '.', ',00'], '', $request->nilai_rab_mdu[$materialId]));
                $RABJasa = intval(str_replace(['Rp', "\u{A0}", '.', ',00'], '', $request->nilai_rab_jasa[$materialId]));
                $ratio = floatval(str_replace([','], '.', $request->ratio[$materialId]));
                $pasangmaterial[$materialId] = [
                    'banyak_material' => $banyakMaterial,
                    'nilai_rab_mdu' =>   $RABMDU,
                    'nilai_rab_jasa' => $RABJasa,
                    'ratio' => $ratio,
                ];
            }
            $dataPelanggan->pasangmaterial()->sync($pasangmaterial);
        }
        return redirect()->route('pelanggan-tl-teknik.index')->with(['success' => 'Data Pelanggan Berhasil Disimpan']);
    }

    public function show($id)
    {
        //
        // $dataPelanggan = DataPelanggan::findOrFail($id);
        // $dataPelangganPasang = $dataPelanggan->pasangmaterial;

        $dataPelanggan = DataPelanggan::selectRaw('data_pelanggans.*, pelanggan_pasangs.*, users.name as tl_teknik_name')
            ->join('users', 'users.id', '=', 'data_pelanggans.id_tl_teknik')
            ->join('pelanggan_pasangs', 'pelanggan_pasangs.id_pelanggan', '=', 'data_pelanggans.id')
            ->where('data_pelanggans.id', $id)
            ->first();
        // dd($dataPelanggan);
        return view('unit.tl-teknik.pelanggan.show', compact('dataPelanggan'));
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

    public function edit($id)
    {
        //
        $dataPelanggan = DataPelanggan::findOrFail($id);
        $dataPelangganPasang = $dataPelanggan->pasangmaterial;
        return view('unit.tl-teknik.pelanggan.edit', compact('dataPelanggan', 'dataPelangganPasang'));
    }

    public function EditDataPelanggan($id)
    {
        $dataPelanggan = DataPelanggan::findOrFail($id);
        $dataPelangganPasang = $dataPelanggan->pasangmaterial;
        $dataHargaPasang = HargaPasang::all();
        $mergedData = $dataHargaPasang->merge($dataPelangganPasang);

        return DataTables::of($mergedData)
            ->addIndexColumn()
            ->addColumn('material', function ($row) {
                return $row->material;
            })
            ->addColumn('satuan', function ($row) {
                return $row->satuan;
            })
            ->addColumn('rp_mdu', function ($row) {
                return $row->rp_mdu;
            })
            ->addColumn('rp_jasa', function ($row) {
                return $row->rp_jasa;
            })
            ->addColumn('banyak_material', function ($row) {
                return $row->pivot ? $row->pivot->banyak_material : null;
            })
            ->addColumn('total_rp_mdu', function ($row) {
                return $row->total_rp_mdu;
            })
            ->addColumn('total_rp_jasa', function ($row) {
                return $row->total_rp_jasa;
            })
            ->addColumn('nilai_rab_mdu', function ($row) {
                return $row->pivot ? $row->pivot->nilai_rab_mdu : null;
            })
            ->addColumn('nilai_rab_jasa', function ($row) {
                return $row->pivot ? $row->pivot->nilai_rab_jasa : null;
            })
            ->addColumn('ratio', function ($row) {
                return $row->pivot ? $row->pivot->ratio : null;
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama_pelanggan' => 'required',
            'ulp' => 'required',
            'jenis_permohonan' => 'required',
            'jumlah_pelanggan' => 'integer',
            'foto_survei.*' => 'image|mimes:jpeg,jpg,png|max:3072'
        ]);

        $dataPelanggan = DataPelanggan::findOrFail($id);

        $data = [];
        if ($request->hasFile('foto_survei')) {
            foreach ($request->file('foto_survei') as $fotoSurvei) {
                $name = $fotoSurvei->getClientOriginalName();
                $fotoSurvei->storeAs('public/pelanggans', $name);
                $data[] = $name;
            }
            if ($dataPelanggan->foto_survei) {
                $fileNames = json_decode($dataPelanggan->foto_survei, true);

                // Periksa apakah $fileNames benar-benar array sebelum menghapus
                if (is_array($fileNames)) {
                    foreach ($fileNames as $fileName) {
                        Storage::delete('public/pelanggans/' . $fileName);
                    }
                }
            }
            $dataPelanggan->foto_survei = json_encode($data);
        } elseif (empty($dataPelanggan->foto_survei)) {
            foreach ($request->file('foto_survei') as $fotoSurvei) {
                $name = $fotoSurvei->getClientOriginalName();
                $fotoSurvei->storeAs('public/pelanggans', $name);
                $data[] = $name;
            }
            $dataPelanggan->foto_survei = json_encode($data);
        }

        $dataPelanggan->fill($request->except('foto_survei'));
        $dataPelanggan->no_regis = $request->no_regis;
        $dataPelanggan->nama_pelanggan = $request->nama_pelanggan;
        $dataPelanggan->alamat_pelanggan = $request->alamat_pelanggan;
        $dataPelanggan->ulp = $request->ulp;
        $dataPelanggan->jenis_permohonan = $request->jenis_permohonan;
        $dataPelanggan->tarif_lama = $request->tarif_lama;
        $dataPelanggan->tarif_baru = $request->tarif_baru;
        $dataPelanggan->daya_lama = intval(str_replace(['.'], '', $request->daya_lama));
        $dataPelanggan->daya_baru = intval(str_replace(['.'], '', $request->daya_baru));
        $dataPelanggan->delta = intval(str_replace(['.'], '', $request->delta));
        $dataPelanggan->jumlah_pelanggan = $request->jumlah_pelanggan;
        $dataPelanggan->nilai_bp = intval(str_replace(['Rp', "\u{A0}", '.', ',00'], '', $request->nilai_bp));
        $dataPelanggan->kepastian_pelanggan = $request->kepastian_pelanggan;
        $dataPelanggan->vendor = $request->vendor;
        $dataPelanggan->lama_bayar = $request->lama_bayar;
        $dataPelanggan->tgl_dpb_ulp = $request->tgl_dpb_ulp;
        $dataPelanggan->tgl_kajian_ren = $request->tgl_kajian_ren;
        $dataPelanggan->tgl_logistik_kons = $request->tgl_logistik_kons;
        $dataPelanggan->tgl_reservasi_kons = $request->tgl_reservasi_kons;
        $dataPelanggan->tgl_register_pp = $request->tgl_register_pp;
        $dataPelanggan->tgl_bayar_pp = $request->tgl_bayar_pp;
        $dataPelanggan->tgl_pdl_pp = $request->tgl_pdl_pp;
        $dataPelanggan->update();

        if ($request->has('material_id')) {
            $pasangmaterial = [];
            foreach ($request->material_id as $key => $materialId) {
                $banyakMaterial = $request->banyak_material[$key];
                $RABMDU = intval(str_replace(['Rp', "\u{A0}", '.', ',00'], '', $request->nilai_rab_mdu[$materialId]));
                $RABJasa = intval(str_replace(['Rp', "\u{A0}", '.', ',00'], '', $request->nilai_rab_jasa[$materialId]));
                $ratio = floatval(str_replace([','], '.', $request->ratio[$materialId]));
                $pasangmaterial[$materialId] = [
                    'banyak_material' => $banyakMaterial,
                    'nilai_rab_mdu' =>   $RABMDU,
                    'nilai_rab_jasa' => $RABJasa,
                    'ratio' => $ratio,
                ];
            }
            $dataPelanggan->pasangmaterial()->sync($pasangmaterial);
        }
        return redirect()->route('pelanggan-tl-teknik.index')->with(['success' => 'Data Pelanggan Berhasil Diperbarui']);
    }

    public function destroy($id)
    {
        //
        $dataPelanggan = DataPelanggan::findOrFail($id);
        $dataPelanggan->pasangmaterial()->detach();
        $dataPelanggan->delete();
        return redirect()->route('pelanggan-tl-teknik.index')->with(['success' => 'Data Pelanggan Berhasil Dihapus']);
    }
}
