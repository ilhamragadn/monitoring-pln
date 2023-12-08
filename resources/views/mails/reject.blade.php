<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Penolakan Permintaan Data Pelanggan</title>
    </head>

    <body>
        <h2>{{ $MailReject['judul'] }}</h2>
        <h3>Kepada {{ $MailReject['nama_penerima'] }}</h3>
        <p>Mohon maaf dengan ini kami memberitahukan bahwasanya permintaan data pelanggan Anda telah ditolak.<br>
            Berikut ini detail data pelanggan yang telah dikonfirmasi:</p>
        <table>
            <tr>
                <td>Nama Pelanggan</td>
                <td>:</td>
                <td>{{ $MailReject['nama_pelanggan'] }}</td>
            </tr>
            <tr>
                <td>Alamat Pelanggan</td>
                <td>:</td>
                <td>{{ $MailReject['alamat_pelanggan'] }}</td>
            </tr>
            <tr>
                <td>Jenis Permohonan Pelanggan</td>
                <td>:</td>
                <td>{{ $MailReject['jenis_permohonan'] }}</td>
            </tr>
            @foreach ($MailReject['material_pesanan'] as $index => $material)
                <tr>
                    <td>Material</td>
                    <td>:</td>
                    <td>{{ $material }}</td>
                </tr>
                <tr>
                    <td>Banyak Material</td>
                    <td>:</td>
                    <td>{{ $MailReject['banyak_material'][$index] }}</td>
                </tr>
            @endforeach
        </table>
        <p>Hormat kami,</p>
        <p>Manager Perencanaan {{ $MailReject['nama_manager_ren'] }}</p>
    </body>

</html>
