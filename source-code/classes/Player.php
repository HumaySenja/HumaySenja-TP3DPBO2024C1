<?php

class Player extends DB
{
    function getPlayerJoin()
    {
        $query = "SELECT * FROM player JOIN divisi ON player.divisi_id=divisi.divisi_id JOIN peran ON player.role_id=peran.role_id ORDER BY player.player_id";

        return $this->execute($query);
    }

    function getPlayer()
    {
        $query = "SELECT * FROM player";
        return $this->execute($query);
    }

    function getPlayerById($id)
    {
        $query = "SELECT * FROM player JOIN divisi ON player.divisi_id=divisi.divisi_id JOIN peran ON player.role_id=peran.role_id WHERE player_id=$id";
        return $this->execute($query);
    }

    function searchPlayer($keyword)
    {
        // ...
    }

    function addData($data, $file)
    {
        $player_nama = $data['player_nama'];
        $player_umur = $data['player_umur'];
        $player_semester = $data['player_semester'];
        $divisi_id = $data['divisi_id'];
        $role_id = $data['role_id'];
    
        // File handling - assuming $file contains uploaded file details
        // Check if file was uploaded without errors
        if ($file['error'] === UPLOAD_ERR_OK) {
            // Define target directory to store uploaded files
            $target_dir = "uploads/";
    
            // Generate a unique filename to prevent overwriting existing files
            $player_foto_path = $target_dir . uniqid() . '_' . basename($file['name']);
    
            // Move the uploaded file to the target directory
            if (move_uploaded_file($file['tmp_name'], $player_foto_path)) {
                // Construct the SQL query to insert data into the table
                $query = "INSERT INTO player (player_foto, player_umur, player_nama, player_semester, divisi_id, role_id) 
                          VALUES ('$player_foto_path', '$player_umur', '$player_nama', '$player_semester', $divisi_id, $role_id)";
    
                // Execute the query
                return $this->execute($query);
            } else {
                // File upload failed
                return false;
            }
        } else {
            // File upload error occurred
            return false;
        }
    }

    function updateData($id, $data, $file)
    {
        // ...
    }

    function deleteData($id)
    {
        // ...
    }
}
