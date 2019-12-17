<?php

namespace SiaSkem\Skem\Infrastructure;

use SiaSkem\Skem\Domain\Model\RencanaSkem;
use SiaSkem\Skem\Domain\Model\RencanaSkemId;
use SiaSkem\Skem\Domain\Model\SkemId;
use SiaSkem\Skem\Domain\Model\SkemFactory;
use SiaSkem\Skem\Domain\Model\RencanaSkemRepository;
use Phalcon\Db\Column;

class MySqlRencanaSkemRepository implements RencanaSkemRepository
{
    private $db;
    private $tableName;

    public function __construct($di)
    {
        $this->db = $di->get('db');
        $this->tableName = "rencana_skem";
    }

    public function all() : array
    {
        $query = 
            "SELECT id, skem_id, deskripsi, semester 
            FROM {$this->tableName}";
        
        $result = $this->db->query($query);
        $rows = $result->fetchAll();
        $rencanaSkems = array();
        foreach($rows as $row)
        {
            $rencanaSkem = new RencanaSkem(
                new RencanaSkemId($row["id"]),
                new SkemId($row["skem_id"]),
                $row["deskripsi"],
                $row["semester"]
            );
            array_push($rencanaSkems, $rencanaSkem);
        }
        return $rencanaSkems;
    }

    public function save(RencanaSkem $rencanaSkem)
    {
        $placeholders = [
            "id" => $rencanaSkem->id()->id(),
            "skemId" => $rencanaSkem->skemId()->id(),
            "deskripsi" => $rencanaSkem->deskripsi(),
            "semester" => $rencanaSkem->semester(),
        ];

        $dataTypes = [
            "id" => Column::BIND_PARAM_STR,
            "skemId" => Column::BIND_PARAM_STR,
            "deskripsi" => Column::BIND_PARAM_STR,
            "semester" => Column::BIND_PARAM_INT,
        ];
        
        $query = "INSERT INTO {$this->tableName}(id, skem_id, deskripsi, semester)
                    VALUE (:id, :skemId :deskripsi, :semester)";
        $success = $this->db->execute($query, $placeholders, $dataTypes);
        if (!$success) 
        {
            throw new DatabaseExecutionFailedException("Something wrong with database connection or query");  
        }
    }

    public function deleteById(string $id)
    {
        $query = $this->db->prepare(
            "DELETE FROM {$this->tableName}
            WHERE id = :id"
        );

        $placeholders = [
            "id" => $id
        ];
        $dataTypes = [
            "id" => Column::BIND_PARAM_STR
        ];
        $success = $this->db->executePrepared($query, $placeholders, $dataTypes); 
        if(!$success)
        {
            throw new DatabaseExecutionFailedException("Something wrong with database connection or query");
        }


    }


}