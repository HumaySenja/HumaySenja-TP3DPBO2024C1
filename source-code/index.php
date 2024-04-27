<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Divisi.php');
include('classes/Peran.php');
include('classes/Player.php');
include('classes/Template.php');

// buat instance player
$listPlayer = new Player($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// buka koneksi
$listPlayer->open();
// tampilkan data player
$listPlayer->getPlayerJoin();

// cari player
if (isset($_POST['btn-cari'])) {
    // methode mencari data player
    $listPlayer->searchPlayer($_POST['cari']);
} else {
    // method menampilkan data player
    $listPlayer->getPlayerJoin();
}

$data = null;

// ambil data player
// gabungkan dgn tag html
// untuk di passing ke skin/template
while ($row = $listPlayer->getResult()) {
    $data .= '<div class="col gx-2 gy-3 justify-content-center">' .
        '<div class="card pt-4 px-2 pengurus-thumbnail">
        <a href="detail.php?id=' . $row['player_id'] . '">
            <div class="row justify-content-center">
                <img src="assets/images/' . $row['player_foto'] . '" class="card-img-top" alt="' . $row['player_foto'] . '">
            </div>
            <div class="card-body">
                <p class="card-text pengurus-nama my-0">' . $row['player_nama'] . '</p>
                <p class="card-text divisi-nama">' . $row['divisi_nama'] . '</p>
                <p class="card-text jabatan-nama my-0">' . $row['role_nama'] . '</p>
            </div>
        </a>
    </div>    
    </div>';
}

// tutup koneksi
$listPlayer->close();

// buat instance template
$home = new Template('templates/skin.html');

// simpan data ke template
$home->replace('DATA_PLAYER', $data);
$home->write();
