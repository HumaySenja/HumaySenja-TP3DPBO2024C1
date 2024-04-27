<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Divisi.php');
include('classes/Peran.php');
include('classes/Player.php');
include('classes/Template.php');

$player = new Player($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$player->open();

$data = nulL;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $player->getPlayerById($id);
        $row = $player->getResult();

        $data .= '<div class="card-header text-center">
        <h3 class="my-0">Detail ' . $row['player_nama'] . '</h3>
        </div>
        <div class="card-body text-end">
            <div class="row mb-5">
                <div class="col-3">
                    <div class="row justify-content-center">
                        <img src="assets/images/' . $row['player_foto'] . '" class="img-thumbnail" alt="' . $row['player_foto'] . '" width="60">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="card px-3">
                            <table border="0" class="text-start">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>' . $row['player_nama'] . '</td>
                                </tr>
                                <tr>
                                    <td>Umur</td>
                                    <td>:</td>
                                    <td>' . $row['player_umur'] . '</td>
                                </tr>   
                                <tr>
                                    <td>Divisi</td>
                                    <td>:</td>
                                    <td>' . $row['divisi_nama'] . '</td>
                                </tr>
                                <tr>
                                    <td>Peran</td>
                                    <td>:</td>
                                    <td>' . $row['role_nama'] . '</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="#"><button type="button" class="btn btn-success text-white">Ubah Data</button></a>
                <a href="#"><button type="button" class="btn btn-danger">Hapus Data</button></a>
            </div>';
    }
}

$player->close();
$detail = new Template('templates/skindetail.html');
$detail->replace('DATA_DETAIL_PLAYER', $data);
$detail->write();
