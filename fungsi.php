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
?>