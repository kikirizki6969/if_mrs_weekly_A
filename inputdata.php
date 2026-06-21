<?php

    require 'fungsi.php';
    /// variable super global namanya $_POST
    if(isset($_POST["submit"]))
    {

        $nama = $_POST["nama"];
        $nim = $_POST["nim"];
        $jurusan = $_POST["jurusan"];
        $email = $_POST["email"];
        $nohp = $_POST["nohp"];
        $foto = $_POST["foto"];

        $query = "INSERT INTO mahasiswa (nama, nim, jurusan, email, no_hp, foto)
        VALUES ('$nama','$nim', '$jurusan', '$email', '$nohp', '$foto' )";

        mysqli_query($koneksi, $query);

        if(mysqli_affected_rows($koneksi) > 0)
        {
            echo "<script>
                    alert('data berhasil ditambahkan!!');
                    window.location.href='mahasiswa.php'; 
                  <script>";
        }
        else
        {
            echo "<script>
                    alert('data gagal');
                    window.location.href='mahasiswa.php'; 
                  <script>";
        }
    }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data mahasiswa</title>
</head>
<body>
    <h2>Tambah data mahasiswa</h2>
     <form action="" method="post">
        <table cellpadding="5px">
    
            <tr>
                <td><label for="nama">Nama</label></td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama" required /></td>
            </tr>

            <tr>
                <td><label for="nim">nim</label></td>
                <td>:</td>
                <td><input type="number" name="nim" id="nim" required /></td>
            </tr>

            <tr>
                <td><label for="jurusan">jurusan</label></td>
                <td>:</td>
                <td><input type="text" name="jurusan" id="jurusan"required /></td>
            </tr>

            <tr>
                <td><label for="email">email</label></td>
                <td>:</td>
                <td><input type="email" name="email" id="email"></td>
            </tr>

            <tr>
                <td><label for="nohp">nomor hp</label></td>
                <td>:</td>
                <td><input type="number" name="nohp" id="nohp"></td>
            </tr>

             <tr>
                <td><label for="foto">foto</label></td>
                <td>:</td>
                <td><input type="file" name="foto" id="foto"></td>
            </tr>

          </table>
          <button type="submit" name="submit">Tambah Data</button>
          <!--KUNCI DARI FORM ADALAH NAME DARI SUBMIT -->

          <form>
</body>
</html>   