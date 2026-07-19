<?php
     
    $koneksi = mysqli_connect("localhost", "root", "root", "ifrizkiweekly");

    function tampildata($query)
    {
        global $koneksi;

        $result = mysqli_query($koneksi,$query);

        $rows = []; // siapkan wadahnya

        while ($row = mysqli_fetch_assoc($result)) // selama lemari masih ada isinya sesuai perintah
        {
            $rows[] = $row; // ambil datanya masukkan ke wadah
        }
        return $rows; // bawa kedepan rumah

    }

    function inputdata($data, $foto)
    {
        global $koneksi;

        $nama = htmlspecialchars($data["nama"]);
        $nim = htmlspecialchars($data["nim"]);
        $jurusan = htmlspecialchars ($data["jurusan"]);
        $email = htmlspecialchars ($data["email"]);
        $nohp = htmlspecialchars ($data["nohp"]);
        
        $namafoto = $foto["name"];
        $newnamefoto = date('dmYhis_').$namafoto;
        $tmpfoto = $foto["tmp_name"];

        $path = "asset/images/$newnamefoto";

        if(move_uploaded_file($tmpfoto,$path));
        {
           $query = "INSERT INTO mahasiswa (nama, nim, jurusan, email, no_hp, foto)
           VALUES ('$nama','$nim', '$jurusan', '$email', '$nohp', '$newnamefoto')";

           mysqli_query($koneksi, $query);
        }

        return mysqli_affected_rows($koneksi);

    }


    function deletedata($id)
    {
        global $koneksi;

        $query = "DELETE FROM mahasiswa WHERE ID = $id";

        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }

    function editdata($data, $id)
    {
        global $koneksi;

        $nama = htmlspecialchars($data["nama"]);
        $nim = htmlspecialchars($data["nim"]);
        $jurusan = htmlspecialchars ($data["jurusan"]);
        $email = htmlspecialchars ($data["email"]);
        $nohp = htmlspecialchars ($data["nohp"]);
        $foto = htmlspecialchars ($data["foto"]);

        $query = "INSERT INTO mahasiswa (nama, nim, jurusan, email, no_hp, foto)
        VALUES ('$nama','$nim', '$jurusan', '$email', '$nohp', '$foto' )";

        $query = "UPDATE mahasiswa SET
                    nama ='$nama', 
                    nim='$nim',
                    jurusan='$jurusan',
                    email='$email',
                    no_hp='$nohp',
                    foto='$foto'
                WHERE id=$id
               ";

        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
        
    }

    function register($data)
    {
        $username = stripslashes($data["username"]); ///dijadikan kecil semua
        $passsword1 = mysqli_real_escape_string($koneksi, $data["password1"]);
        $passsword2 = mysqli_real_escape_string($koneksi, $data["password2"]);

        if($passsword1 != $passsword2)
        {
            echo "<script>
                alert('konfirmasi ulang password tidak sesuai');
            </script>";
            return false;
        }
    }


?>