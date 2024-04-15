<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/CSS" href="style.css">
</head>
<body>
    <header>
        <h1 align = "Center">PT Bersama Jaya</h1>
    </header>
    <ul>
            <li><a href="index.php?home.php">Home</a></li>
            <li><a href="index.php?page=Pengumuman">Data Karyawan</a></li>
            <li><a class="active" href="index.php?page=tambahmhs">Data Gaji</a></li>
            <li><a href="index.php?page=Kegiatan">Data Lembur</a></li>
        </ul>

        <article>
    <form method = "POST">
        <p><label> ID Karyawan  : </label>
        <input type="text" name="KID"></p>
        <p><label> Nama Karyawan    : </label>
        <input type="text" name="Nama"></p>
        <p><label> Gaji Pokok   : </label>
        <input type="text" name="Gaji"></p>
        <p><label> Jabatan  : </label>
        <select name="Jabatan">
            <?php   
            $name = array("Manager","Supervisor","Karyawan Divisi","Teknisi");
            for($i=0;$i< count($name); $i++){
                echo "
                <option value='$name[$i]'> $name[$i] </option>
                ";
            }
            ?>
        </select></p>
        <p><label> Status   : </label>
        <select name="Status">
            <?php   
            $name = array("Menikah","Belum Menikah");
            for($i=0;$i< count($name); $i++){
                echo "
                <option value='$name[$i]'> $name[$i] </option>
                ";
            }
            ?>
        </select></p>
        <p><label> Jumlah Anak  : </label>
        <input type="text" name="Janak"></p>
        <p><label> Jumlah Lembur    : </label>
        <input type="text" name="Jlembur"></p>
        <p><label> Jam Keterlambatan    : </label>
        <input type="text" name="Jlambat"></p>
        <p><input type ="submit" value="Proses" name="proses"></p>
        <p><b>Output Program    :</b></p>
   
<?php
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    $ID = $_POST['KID'];
    $name = $_POST['nama'];
    $salary = (int)$_POST['Gaji'];
    $position = $_POST['Jabatan'];
    $psalary = array('Manager'=>2000000,'Supervisor'=>1500000,'Karyawan Divisi'=>1000000,'Teknisi'=>500000);
    $ssalary = array("Menikah"=>100000,"Belum Menikah"=>0);
    $state = $_POST['Status'];
    $kids = $_POST['Janak'];
    $overtime = (int)$_POST['Jlembur'];
    $late = (int)$_POST['Jlambat'];
   
    if ($kids == 1) {
        $ksalary = 100000;
    } else if ($kids == 2) {
        $ksalary = 200000;
    }

    $ssalary1 = $ssalary[$state];
    $psalary1 = $psalary[$position];
    $totalo = $overtime * 100000;
    $totall = $late * 15000;
    $tax = $salary * 0.1;
    $geta = $salary + $psalary1 + $totalo + $ksalary + $ssalary1;
    $getb = $tax + $totall;
    $total = $geta - $getb ;
    $test = 1;



    echo "<table border='1' width='80%'>
    <tr>
        <td>ID</td>
        <td>Nama</td>
        <td>Gaji Pokok</td>
        <td>Jabatan</td>
        <td>Tunjangan Jabatan</td>
        <td>Tunjangan Istri</td>
        <td>Tunjangan Anak</td>
        <td>Uang Lembur</td>
        <td>Potongan Keterlambatan</td>
        <td>Total Gaji</td>
    </tr>
    <tr>
        <td>$ID</td>
        <td>$name</td>
        <td>$salary</td>
        <td>$position</td>
        <td>$psalary1</td>
        <td>$ssalary1</td>
        <td>$ksalary</td>
        <td>$totalo</td>
        <td>$totall</td>
        <td>$total</td>
    </tr>

</table>";
?>
</article>    


</body>
</html>