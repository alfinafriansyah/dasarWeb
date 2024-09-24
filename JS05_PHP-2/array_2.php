<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <!-- <?php
        $Dosen = [
            'nama' => 'Elok Nur Hamdana',
            'domisili' => 'Malang',
            'jenis_kelamin' => 'Perempuan' ];
        echo "Nama : {$Dosen ['nama']} <br>";
        echo "Domisili : {$Dosen ['domisili']} <br>";
        echo "Jenis Kelamin : {$Dosen ['jenis_kelamin']} <br>";
    ?> -->
    <table border = "1">
        <tr style="background-color: lightblue;">
            <td>Nama</td>
            <td>Domisili</td>
            <td>Jenis Kelamin</td>
        </tr>
        <tr style="background-color: beige;">
            <td><?php echo "{$Dosen ['nama']}"?></td>
            <td><?php echo "{$Dosen ['domisili']}"?></td>
            <td><?php echo "{$Dosen ['jenis_kelamin']}"?></td>
        </tr>
    </table>
</body>
</html>