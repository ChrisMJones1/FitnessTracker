<?php
namespace fitnessTracker\Models\Route;
use fitnessTracker\Models\Feature\Feature;
require_once 'Feature.php';

class Route implements Feature
{
    public function GetById($dbcon, $id)
    {
        $sql = "SELECT * FROM routes WHERE id = :id";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->execute();
        return $pdostm->fetchObject(\PDO::FETCH_OBJ);
    }

    public function GetAll($dbcon)
    {
        $sql = "SELECT * FROM routes";
        $pdostm =  $dbcon->prepare($sql);
        $pdostm->execute();

        $routes = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $routes;
    }

    public function Add($dbcon, $inputs)
    {
        $sql = "INSERT INTO routes (name, start_address, end_address) values (:name, :startAddress, :endAddress)";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':name', $inputs['name']);
        $pdostm->bindParam(':startAddress', $inputs['startAddress']);
        $pdostm->bindParam(':endAddress', $inputs['endAddress']);
        $numRowsAffected = $pdostm->execute();

        if ($numRowsAffected) {
            echo "Inserted a route";
            header("Location: List.php");
            exit;
        }
        else {
            echo "Problem inserting";
        }
    }

    public function Update($dbcon, $inputs)
    {
        $sql = "Update routes
                set name = :name,
                start_address = :startAddress,
                end_address = :endAddress
                WHERE id = :id
            ";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':name', $inputs['name']);
        $pdostm->bindParam(':startAddress', $inputs['startAddress']);
        $pdostm->bindParam(':endAddress', $inputs['endAddress']);
        $pdostm->bindParam(':id', $inputs['id']);
        $numRowsAffected = $pdostm->execute();

        if ($numRowsAffected) {
            echo "Update a route";
            header("Location: List.php");
            exit;
        } else {
            echo "Problem updating a route";
        }
    }

    public function Delete($dbcon, $id)
    {
        //Delete the data (row) from the database
        $sql = "DELETE FROM routes WHERE id = :id";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $numRowsAffected = $pdostm->execute();

        if ($numRowsAffected) {
            echo "Delete a route";
            header("Location: List.php");
            exit;
        } else {
            echo "Problem deleting a route";
        }
    }
}
?>