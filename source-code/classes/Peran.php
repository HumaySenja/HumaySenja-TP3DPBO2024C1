<?php

class Peran extends DB
{
    function getPeran()
    {
        $query = "SELECT * FROM peran";
        return $this->execute($query);
    }

    function getPeranById($id)
    {
        $query = "SELECT * FROM peran WHERE role_id=$id";
        return $this->execute($query);
    }

    function addPeran($data)
    {
        // ...
    }

    function updatePeran($id, $data)
    {
        // ...
    }

    function deletePeran($id)
    {
        // ...
    }
}
