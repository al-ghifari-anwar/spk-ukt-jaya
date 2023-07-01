<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $rank['nama_mahasiswa'] ?></title>
</head>

<body>
    <style>
        .left {
            text-align: left;
        }
    </style>

    <h2 style="text-align: center; text-decoration: underline;">Pengumuman Penerima <?= $beasiswa['nama_beasiswa'] ?></h2>

    <p style="margin-top: 50px; text-indent: 10%;">Berdasarkan hasil perhitungan dan verifikasi berkas <?= $beasiswa['nama_beasiswa'] ?>, maka nama mahasiswa yang tercantum di bawah ini:</p>

    <table style="margin-left: 10%;">
        <tr>
            <td class="left">Nama</td>
            <td>:</td>
            <td class="left"><?= $rank['nama_mahasiswa'] ?></td>
        </tr>
        <tr>
            <td class="left">NIM</td>
            <td>:</td>
            <td class="left"><?= $rank['nim_mahasiswa'] ?></td>
        </tr>
        <tr>
            <td class="left">Prodi</td>
            <td>:</td>
            <td class="left"><?= $prodi['nama_prodi'] ?></td>
        </tr>
    </table>

    <p style="text-indent: 10%;">Dinyatakan <?= ($rank['status_hasil'] == 'eligible') ? 'LULUS' : 'TIDAK LULUS' ?> seleksi <?= $beasiswa['nama_beasiswa'] ?> Dengan keterangan data dan berkas mahasiswa sebagai berikut:</p>

    <?php
    $this->db->join('tb_kriteria', 'tb_kriteria.id_kriteria = tb_data_mahasiswa.id_kriteria');
    $dataMhs = $this->db->get_where('tb_data_mahasiswa', ['id_mahasiswa' => $rank['id_mahasiswa']])->result_array();
    ?>

    <table style="margin-left: 10%;">
        <?php foreach ($dataMhs as $dataMhs) : ?>
            <tr>
                <td class="left"><?= $dataMhs['nama_kriteria'] ?></td>
                <td>:</td>
                <td class="left"><?= $dataMhs['value'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p style="text-indent: 10%;">Demikian pengumuman ini disampaikan untuk diperhatikan.</p>

</body>

</html>