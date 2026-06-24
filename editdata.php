<?php

    require 'fungsi.php';

    $id = $_GET["id"];

    $query = "SELECT * FROM mahasiswa WHERE id=$id";

    $mhs = tampildata($query)[0];


    /// variable super global namanya $_POST
    if(isset($_POST["submit"]))
    {

        if(editdata($_POST, $id) > 0) ///query ok
        {
            echo "<script>
                    alert('data berhasil diedit!!');
                    window.location.href='mahasiswa.php'; 
                  <script>";
        }
        else
        {
            echo "<script>
                    alert('data gagal diedit');
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
    <title>Edit Data</title>
</head>
<body>
    <h2>Edit data mahasiswa</h2>
     <form action="" method="post">
        <table cellpadding="5px">
    
            <tr>
                <td><label for="nama">Nama</label></td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama"
                id="nama" value="<?= $mhs["nama"] ?>" required /></td>
            </tr>

            <tr>
                <td><label for="nim">nim</label></td>
                <td>:</td>
                <td><input type="number" name="nim" id="nim" value="<?= $mhs["nim"] ?>" required /></td>
            </tr>

            <tr>
                <td><label for="jurusan">jurusan</label></td>
                <td>:</td>
                <td><input type="text" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"] ?>" required /></td>
            </tr>

            <tr>
                <td><label for="email">email</label></td>
                <td>:</td>
                <td><input type="email" name="email" id="email" value="<?= $mhs["email"] ?>" ></td>
            </tr>

            <tr>
                <td><label for="nohp">nomor hp</label></td>
                <td>:</td>
                <td><input type="number" name="nohp" id="nohp"value="<?= $mhs["no_hp"] ?>" ></td>
            </tr>

             <tr>
                <td><label for="foto">foto</label></td>
                <td>:</td>
                <td><input type="file" name="foto" id="foto"value="<?= $mhs["foto"] ?>" ></td>
            </tr>

          </table>
          <button type="submit" name="submit">Edit Data</button>
          <!--KUNCI DARI FORM ADALAH NAME DARI SUBMIT -->

          <form>
</body>
</html>   