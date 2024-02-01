<?php

namespace App\Http\Controllers\Unit\Manager_Unit\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\DataPelanggan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use ZipArchive;

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
        //
        $dataPelanggan = DataPelanggan::selectRaw('data_pelanggans.*, users.name as tl_teknik_name')
            ->join('users', 'users.id', '=', 'data_pelanggans.id_tl_teknik')
            ->with('pasangmaterial')
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

    public function downloadData(Request $request)
    {
        $selectedData = $request->input('selected_data');

        if (!empty($selectedData)) {
            $zip = new ZipArchive;
            $downloadDate = Carbon::now();
            $zipFileName = 'Dalang Saekapraya_' . $downloadDate->format('Y-m-d_H-i-s') . '.zip';
            $zipFilePath = public_path($zipFileName);

            if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
                foreach ($selectedData as $dataId) {
                    $dataPelanggan = DataPelanggan::findOrFail($dataId);
                    $dataPelangganPasang = $dataPelanggan->pasangmaterial;
                    $formatDate = Carbon::createFromFormat('Y-m-d H:i:s', $dataPelanggan->created_at)->format('d-m-Y');
                    $csvFileName = 'DS_' . $dataPelanggan->id . '_' . $dataPelanggan->nama_pelanggan . '_' . $formatDate . '.csv';

                    $csvFilePath = storage_path('app/public/pelanggans/' . $csvFileName);
                    $handle = fopen($csvFilePath, 'w');

                    fputcsv($handle, ['No. Registrasi', 'Nama Pelanggan', 'Alamat Pelanggan', 'Jumlah Pelanggan', 'Jenis Permohonan', 'ULP', 'Tarif Lama', 'Daya Lama', 'Tarif Baru', 'Daya Baru', 'Delta', 'Nilai BP', 'Kepastian Pelanggan', 'Vendor', 'Lama Bayar', 'Tgl DPB (ULP)', 'Tgl Kajian (REN)', 'Tgl Logistik (Kons)', 'Tgl Reservasi (Kons)', 'Tgl Register (PP)', 'Tgl Bayar (PP)', 'Tgl PDL (PP)', 'Hasil Gambar Survei']);
                    fputcsv($handle, [
                        $dataPelanggan->no_regis ?? 'No. Regis Kosong',
                        $dataPelanggan->nama_pelanggan ?? 'Nama Pelanggan Kosong',
                        $dataPelanggan->alamat_pelanggan ?? 'Alamat Pelanggan Kosong',
                        $dataPelanggan->jenis_permohonan ?? 'Jenis Permohonan Kosong',
                        $dataPelanggan->ulp ?? 'ULP Kosong',
                        $dataPelanggan->tarif_lama ?? 'Tarif Lama Kosong',
                        $dataPelanggan->daya_lama ?? 'Daya Lama Kosong',
                        $dataPelanggan->tarif_baru ?? 'Tarif Baru Kosong',
                        $dataPelanggan->daya_baru ?? 'Daya Baru Kosong',
                        $dataPelanggan->delta ?? 'Delta Kosong',
                        $dataPelanggan->nilai_bp ?? 'Nilai BP Kosong',
                        $dataPelanggan->kepastian_pelanggan ?? 'Kepastian Pelanggan Kosong',
                        $dataPelanggan->vendor ?? 'Vendor Kosong',
                        $dataPelanggan->lama_bayar ?? 'Lama Bayar Kosong',
                        $dataPelanggan->tgl_dpb_ulp ?? 'Tgl DPB (ULP) Kosong',
                        $dataPelanggan->tgl_kajian_ren ?? 'Tgl Kajian (REN) Kosong',
                        $dataPelanggan->tgl_logistik_kons ?? 'Tgl Logistik (Kons) Kosong',
                        $dataPelanggan->tgl_reservasi_kons ?? 'Tgl Reservasi (Kons) Kosong',
                        $dataPelanggan->tgl_register_pp ?? 'Tgl Register (PP) Kosong',
                        $dataPelanggan->tgl_bayar_pp ?? 'Tgl Bayar (PP) Kosong',
                        $dataPelanggan->tgl_pdl_pp ?? 'Tgl PDL (PP) Kosong',
                        $dataPelanggan->foto_survei ?? 'Hasil Gambar Survei Kosong'
                    ]);
                    fwrite($handle, "\n");
                    fputcsv($handle, ['Material', 'Satuan', 'RP MDU', 'RP Jasa', 'Banyak Material', 'Total Jumlah RP MDU', 'Total Jumlah RP Jasa', 'Nilai RAB (MDU)', 'Nilai RAB (Jasa)', 'Ratio']);
                    foreach ($dataPelangganPasang as $dataRelation) {
                        fputcsv($handle, [
                            $dataRelation->material ?? 'Material Kosong',
                            $dataRelation->satuan ?? 'Satuan Kosong',
                            $dataRelation->rp_mdu ?? 'RP MDU Kosong',
                            $dataRelation->rp_jasa ?? 'RP Jasa Kosong',
                            $dataRelation->pivot->banyak_material ?? 'Banyak Material Kosong',
                            $dataRelation->pivot->jumlah_total_mdu ?? 'Total Jumlah RP MDU Kosong',
                            $dataRelation->pivot->jumlah_total_jasa ?? 'Total Jumlah RP Jasa Kosong',
                            $dataRelation->pivot->nilai_rab_mdu ?? 'Nilai RAB (MDU) Kosong',
                            $dataRelation->pivot->nilai_rab_jasa ?? 'Nilai RAB Jasa Kosong',
                            $dataRelation->pivot->ratio ?? 'Ratio Kosong'
                        ]);
                    }

                    fclose($handle);

                    // Add CSV to ZIP
                    $zip->addFile($csvFilePath, $csvFileName);

                    $surveiFileNames = json_decode($dataPelanggan->foto_survei, true);
                    foreach ($surveiFileNames as $surveiFileName) {
                        $surveiPath = storage_path('app/public/pelanggans/' . $surveiFileName);

                        if (file_exists($surveiPath)) {
                            $zip->addFile($surveiPath, 'DS_' . $dataPelanggan->id . '_' . $dataPelanggan->nama_pelanggan . '_' . $surveiFileName);
                        }
                    }
                }

                $zip->close();

                // Download ZIP
                return response()->download($zipFilePath)->deleteFileAfterSend(true);
            } else {
                abort(500, 'Cannot create ZIP archive');
            }
        } else {
            abort(404, 'No data selected');
        }
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
        $dataPelanggan = DataPelanggan::selectRaw('data_pelanggans.*, users.name as tl_teknik_name, users.role as tl_teknik_role, users.ulp as tl_teknik_ulp')
            ->join('users', 'users.id', '=', 'data_pelanggans.id_tl_teknik')
            ->where('data_pelanggans.id', $id)
            ->first();

        $formatDate = Carbon::createFromFormat('Y-m-d H:i:s', $dataPelanggan->created_at)->format('d-m-Y');

        return view('unit.manager-unit.pelanggan.show', compact('dataPelanggan', 'formatDate'));
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
            ->addColumn('total_rp_mdu', function ($row) {
                return $row->total_rp_mdu;
            })
            ->addColumn('jumlah_total_mdu', function ($row) {
                return $row->jumlah_total_mdu;
            })
            ->addColumn('total_rp_jasa', function ($row) {
                return $row->total_rp_jasa;
            })
            ->addColumn('jumlah_total_jasa', function ($row) {
                return $row->jumlah_total_jasa;
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

    // Download file survei
    public function downloadSurvei($fileName)
    {
        $path = storage_path('app/public/pelanggans/' . $fileName);

        if (file_exists($path)) {
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $contentType = $this->getContentType($extension);

            $headers = ['Content-Type' => $contentType];

            return response()->download($path, $fileName, $headers);
        } else {
            abort(404);
        }
    }

    private function getContentType($extension)
    {
        $contentTypes = [
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'pdf' => 'application/pdf',
        ];

        return $contentTypes[$extension] ?? 'application/octet-stream';
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
        $dataPelanggan->alasan_tolak_unit = $request->alasan_tolak_unit;
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
