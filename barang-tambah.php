<?php
include 'koneksi.php';
?>
<link rel="stylesheet" href="style.css">
<h3> Tambah Barang</h3>
<form action="" method="post">
    <table>
    <tr>
        <td width="120"> Kode Barang</td>
        <td> <input type="text" name="kode_barang"> </td>
    </tr>
    <tr>
        <td> Nama Barang </td>
        <td> <input type="text" name="nama_barang"> </td>
    </tr>
    <tr>
        <td> Harga </td>
        <td> <input type="text" name="harga_barang"> </td>
    </tr>
    <tr>
        <td></td>
        <td> <input type="submit" name="proses" value="Simpan"> </td>
    </tr>
    </table>
</form>

<?php
include "koneksi.php";

if(isset($_POST['proses'])){
    mysqli_query($koneksi,"insert into barang set
    kode_barang = '$_POST[kode_barang]',
    nama_barang = '$_POST[nama_barang]',
    harga_barang = '$_POST[harga_barang]'");

    echo "Data baru telah di tersimpan";
    echo "<meta http-equiv=refresh content=2;URL='barang-tambah.php>'";
}
?>
<table border="1">
    <tr>
        <th>No</th>
        <th width="100">Kode Barang</th>
        <th width="200">Nama Barang</th>
        <th width="150">Harga</th>
        <th colspan="2">Aksi</th>
    </tr>

    <?php
    include "koneksi.php";

    $no=1;
    $ambildata = mysqli_query($koneksi,"select * from barang");
    /* While untuk mengulang*/
    while($tampil = mysqli_fetch_array($ambildata)){
        $warna = ($no%2==1)?"while":"steelblue";
        echo"
        <tr bgcolor='$warna'>
            <td align=center>$no</td>
            <td align=center>$tampil[kode_barang]</td>
            <td align=center>$tampil[nama_barang]</td>
            <td align=center>$tampil[harga_barang]</td>
            <td><a href='?kode=$tampil[kode_barang]'><input type='button' class='btn-delete'></a></td>
            <td><a href='barang-ubah.php?kode=$tampil[kode_barang]'><input type='button' class='btn-update'></a></td>
        </tr>";
        $no++;
    }
    ?>
</table>
<?php
if (isset($_GET['kode'])){
    mysqli_query($koneksi,"delete from barang where kode_barang='$_GET[kode]'");
    echo "data telah dihapus";
    echo "<meta http-equiv=refresh content=2;URL='barang-tambah.php>'";
}
?>
