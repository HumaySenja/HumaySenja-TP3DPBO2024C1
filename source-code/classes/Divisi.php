<?php

class Divisi extends DB
{
    function getDivisi()//fungsi untuk mengambil isi tabel divisi dari database
    {
        $query = "SELECT * FROM divisi";
        return $this->execute($query);
    }

    function getDivisiById($id)//fungsi untuk mengambil divisi berdasarkan idnya
    {
        $query = "SELECT * FROM divisi WHERE divisi_id=$id";
        return $this->execute($query);
    }

    function addDivisi($data)//fungsi untuk menambah divisi baru
    {
        $nama = $data['nama'];
        $query = "INSERT INTO divisi VALUES('', '$nama')";
        return $this->executeAffected($query);
    }

    function updateDivisi($id, $data)//fungsi untuk mengubah divisi yang sudah ada
    {
        // ...
    }

    function deleteDivisi($id)//fungsi untuk menghapus divisi
    {
        // ...
    }
}
