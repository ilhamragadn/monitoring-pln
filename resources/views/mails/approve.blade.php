<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Persetujuan Permintaan Data Pelanggan</title>
    </head>

    <body>
        <h2>{{ $MailApprove['judul'] }}</h2>
        <h3>Kepada {{ $MailApprove['nama_penerima'] }}</h3>
        <p>Selamat dengan ini kami memberitahukan bahwasanya permintaan data pelanggan Anda telah disetujui.<br>
            Berikut ini detail data pelanggan yang telah dikonfirmasi:</p>
        <table>
            <tr>
                <td>Nama Pelanggan</td>
                <td>:</td>
                <td>{{ $MailApprove['nama_pelanggan'] }}</td>
            </tr>
            <tr>
                <td>Alamat Pelanggan</td>
                <td>:</td>
                <td>{{ $MailApprove['alamat_pelanggan'] }}</td>
            </tr>
            <tr>
                <td>Jenis Permohonan Pelanggan</td>
                <td>:</td>
                <td>{{ $MailApprove['jenis_permohonan'] }}</td>
            </tr>
            @foreach ($MailApprove['material_pesanan'] as $index => $material)
                <tr>
                    <td>Material</td>
                    <td>:</td>
                    <td>{{ $material }}</td>
                </tr>
                <tr>
                    <td>Banyak Material</td>
                    <td>:</td>
                    <td>{{ $MailApprove['banyak_material'][$index] }}</td>
                </tr>
            @endforeach
        </table>
        <p>Hormat kami,</p>
        <p>Manager Perencanaan {{ $MailApprove['nama_manager_ren'] }}</p>
    </body>

</html>
