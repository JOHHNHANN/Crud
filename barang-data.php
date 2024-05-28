<h3> Data barang </h3>

<table border="1">
    <tr>
        <th>No</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Harga</th>
    </tr>

    <?php
    include "koneksi.php";

    $no=1;
    $ambildata = mysqli_query($koneksi,"select * from barang");
    /* While untuk mengulang*/
    while($tampil = mysqli_fetch_array($ambildata)){
        echo"
        <tr>
            <td>$no</td>
            <td>$tampil[kode_barang]</td>
            <td>$tampil[nama_barang]</td>
            <td>$tampil[harga_barang]</td>
        </tr>";
        $no++;
    }
    ?>
</table>
