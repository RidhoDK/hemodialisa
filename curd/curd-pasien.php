<?php
session_start();
include('../libs/koneksi.php');

$sess_type = $_SESSION['type'];

if (isset($_POST['bsimpan'])) {
    $query = "INSERT INTO tbl_pasien (nama_pasien, no_rm, umur, jenis_kelamin, tanggal, durasi, tensi, berat_badan, diagnosa, obat) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);

    mysqli_stmt_bind_param(
        $stmt,
        "ssisssssss",
        $_POST['tnama_pasien'],
        $_POST['tno_rm'],
        $_POST['tumur'],
        $_POST['tjk'],
        $_POST['ttgl'],
        $_POST['tdurasi'],
        $_POST['ttensi'],
        $_POST['tberatbadan'],
        $_POST['tdiagnosa'],
        $_POST['tobat']
    );

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
            alert('ADD DATA SUCCESSFULLY');
            window.location.href = '../html/$sess_type/pasien.php';
        </script>";
    } else {
        echo "<script>
            alert('ADD DATA FAILED');
            window.location.href = '../html/$sess_type/pasien.php';
        </script>";
    }
    mysqli_stmt_close($stmt);
}

if (isset($_POST['bedit'])) {
    $query = "UPDATE tbl_pasien SET 
                nama_pasien = ?, 
                no_rm = ?, 
                umur = ?, 
                jenis_kelamin = ?, 
                tanggal = ?, 
                durasi = ?, 
                tensi = ?, 
                berat_badan = ?, 
                diagnosa = ?, 
                obat = ? 
              WHERE id_pasien = ?";
    $stmt = mysqli_prepare($koneksi, $query);

    mysqli_stmt_bind_param(
        $stmt,
        "ssisssssssi",
        $_POST['tnama_pasien'],
        $_POST['tno_rm'],
        $_POST['tumur'],
        $_POST['tjk'],
        $_POST['ttgl'],
        $_POST['tdurasi'],
        $_POST['ttensi'],
        $_POST['tberatbadan'],
        $_POST['tdiagnosa'],
        $_POST['tobat'],
        $_POST['id_pasien']
    );

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
            alert('EDIT DATA SUCCESSFULLY');
            window.location.href = '../html/$sess_type/pasien.php';
        </script>";
    } else {
        echo "<script>
            alert('EDIT DATA FAILED');
            window.location.href = '../html/$sess_type/pasien.php';
        </script>";
    }
    mysqli_stmt_close($stmt);
}

if (isset($_POST['bhapus'])) {
    $query = "DELETE FROM tbl_pasien WHERE id_pasien = ?";
    $stmt = mysqli_prepare($koneksi, $query);

    mysqli_stmt_bind_param($stmt, "i", $_POST['id_pasien']);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_query($koneksi, "ALTER TABLE tbl_pasien AUTO_INCREMENT = 1");
        echo "<script>
            alert('DELETE DATA SUCCESSFULLY');
            window.location.href = '../html/$sess_type/pasien.php';
        </script>";
    } else {
        echo "<script>
            alert('DELETE DATA FAILED');
            window.location.href = '../html/$sess_type/pasien.php';
        </script>";
    }
    mysqli_stmt_close($stmt);
}
