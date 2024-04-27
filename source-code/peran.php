<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Peran.php');
include('classes/Template.php');

$peran = new Peran($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$peran->open();
$peran->getPeran();

if (!isset($_GET['id'])) {
    if (isset($_POST['submit'])) {
        if ($peran->addPeran($_POST) > 0) {
            echo "<script>
                alert('Data berhasil ditambah!');
                document.location.href = 'peran.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambah!');
                document.location.href = 'peran.php';
            </script>";
        }
    }

    $btn = 'Tambah';
    $title = 'Tambah';
}

$view = new Template('templates/skintabel.html');

$mainTitle = 'Peran';
$header = '<tr>
<th scope="row">No.</th>
<th scope="row">Nama Peran</th>
<th scope="row">Aksi</th>
</tr>';
$data = null;
$no = 1;
$formLabel = 'peran';

while ($div = $peran->getResult()) {
    $data .= '<tr>
    <th scope="row">' . $no . '</th>
    <td>' . $div['role_nama'] . '</td>
    <td style="font-size: 22px;">
        <a href="peran.php?id=' . $div['role_id'] . '" title="Edit Data"><i class="bi bi-pencil-square text-warning"></i></a>&nbsp;<a href="divisi.php?hapus=' . $div['role_id'] . '" title="Delete Data"><i class="bi bi-trash-fill text-danger"></i></a>
        </td>
    </tr>';
    $no++;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        if (isset($_POST['submit'])) {
            if ($peran->updatePeran($id, $_POST) > 0) {
                echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'peran.php';
            </script>";
            } else {
                echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'peran.php';
            </script>";
            }
        }

        $peran->getPeranById($id);
        $row = $peran->getResult();

        $dataUpdate = $row['role_nama'];
        $btn = 'Simpan';
        $title = 'Ubah';

        $view->replace('DATA_VAL_UPDATE', $dataUpdate);
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        if ($peran->deletePeran($id) > 0) {
            echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'peran.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = 'peran.php';
            </script>";
        }
    }
}

$peran->close();

$view->replace('DATA_MAIN_TITLE', $mainTitle);
$view->replace('DATA_TABEL_HEADER', $header);
$view->replace('DATA_TITLE', $title);
$view->replace('DATA_BUTTON', $btn);
$view->replace('DATA_FORM_LABEL', $formLabel);
$view->replace('DATA_TABEL', $data);
$view->write();
