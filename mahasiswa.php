<?php
    
    require 'fungsi.php';
    $qmahasiswa = "SELECT * FROM mahasiswa";
    $mahasiswas = tampildata($qmahasiswa); // wadah dengan data mahasiswa

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>WEB INFORMATIKA A</h1>
    <hr>
    <table border="1" cellspacing="0" cellpadding="15px">
        <tr>
            <td> <a href="index.php">Home</a>
            </td>

            <td> <a href="profile.php">Profile</a>
            </td>

            <td> <a href="contact.php">Contact</a>
            </td>

            <td> <a href="mahasiswa.php">data mahasiswa</a>
            </td>
         <tr>
    <table>
        <h2>Data Mahasiswa</h2>
        <a href="inputdata.php">
            <button>Tambah data</button>
        
        <table border="1" cellpadding="spx">
        <tr>
            <th >No</th>
            <th >Nama</th>
            <th >Nim</th>
            <th >Jurusan</th>
            <th >Email</th>
            <th>NO. Hp</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        <?php 
            $i = 1;
            foreach($mahasiswas as $mhs)
            {
        ?>
        <tr>
            <td align="center"><?php $i ?></td>
            <td><?php echo $mhs["nama"] ?></td>
            <td align="center"><?php echo $mhs["nim"] ?></td>
            <td align="center"><?php echo $mhs["jurusan"] ?></td>
            <td align="center"><?php echo $mhs["email"] ?></td>
            <td align="center"><?php echo $mhs["no_hp"] ?></td>
            <td align="center"><img src="asset/images/<?= $mhs["foto"]?>" width="70px" /></td>
            <td><a href="editdata.php?id=<?= $mhs["id"] ?>"><button>EDIT</button></a>  
                <a href ="deletedata.php?id=<?= $mhs["id"] ?>" onclick="return confirm('Yakinnnn?')"><button>DELETE</button></a>
            </td>
        </tr>
        <?php 
            $i++;
            }       
        ?>

</body>
</html>