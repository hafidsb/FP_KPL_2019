<?php

namespace SiaSkem\Skem\Infrastructure;

use SiaSkem\Skem\Domain\Model\RealisasiSkemRepository;
use SiaSkem\Skem\Domain\Model\RealisasiSkemFactory;
use SiaSkem\Skem\Domain\Model\RealisasiSkem;
use Phalcon\Db\Column;

class MySqlRealisasiSkemRepository implements RealisasiSkemRepository{

    private $db;
    private $skemTableName;

    public function __construct($di)
    {
        $this->db = $di->get('db');
        $this->skemTableName = "realisasi_skems";
    }

    public function all() : array
    {
        $query = 
            "SELECT id, skem_id, deskripsi, semester, tervalidasi, tanggal 
            FROM {$this->skemTableName}";
        $result = $this->db->query($query);
        $rows = $result->fetchAll();
        $realisasiSkems = array();
        foreach ($rows as $row) {
            $realisasi = RealisasiSkemFactory::create(
                $row["id"],
                $row["skem_id"],
                $row["deskripsi"],
                $row["semester"],
                $row["tanggal"]

            );
            array_push($realisasiSkems, $realisasi);
        }
        return $realisasiSkems;
    }

    public function byId(string $id) : ?RealisasiSkem
    {
        $query = $this->db->prepare(
            "SELECT skem_id, deskripsi, semester, tervalidasi, tanggal
            FROM {$this->skemTableName}
            WHERE id = :id"
        );
        $placeholders = [
            "id" => $id
        ];
        $dataTypes = [
            "id" => Column::BIND_PARAM_STR
        ];
        $result = $this->db->executePrepared($query, $placeholders, $dataTypes); 
        $row = $result->fetch();
        if ($row == false) {
            return null;
        }
        $realisasi = RealisasiSkemFactory::create(
            $id,
            $row["skem_id"],
            $row["deskripsi"],
            $row["semester"],
            $row["tanggal"]
        );
        return $realisasi;
    }

    public function bySemester(int $semester) : ?RealisasiSkem
    {
        $query = $this->db->prepare(
            "SELECT id, skem_id, deskripsi, tervalidasi, tanggal
            FROM {$this->skemTableName}
            WHERE semester = :semester"
        );
        $placeholders = [
            "semester" => $semester
        ];
        $dataTypes = [
            "semester" => Column::BIND_PARAM_INT
        ];
        $result = $this->db->executePrepared($query, $placeholders, $dataTypes); 
        $row = $result->fetch();
        if ($row == false) {
            return null;
        }
        $realisasi = RealisasiSkemFactory::create(
            $row["id"],
            $row["skem_id"],
            $row["deskripsi"],
            $semester,
            $row["tanggal"]
        );
        return $realisasi;
    }

    public function save(RealisasiSkem $realisasiSkem)
    {
        $isExist = $this->exist($realisasiSkem);
        $placeholders = [
            "id" => $realisasiSkem->id()->id(),
            "skem_id" => $realisasiSkem->skemId()->id(),
            "deskripsi" => $realisasiSkem->deskripsi(),
            "semester" => $realisasiSkem->semester(),
            "tanggal" => $realisasiSkem->tanggal()
        ];
        $dataTypes = [
            "id" => Column::BIND_PARAM_STR,
            "skem_id" => Column::BIND_PARAM_STR,
            "deskripsi" => Column::BIND_PARAM_STR,
            "semester" => Column::BIND_PARAM_INT
        ];
        $query = "";
        if(!$isExist){
            $query =
                "INSERT INTO {$this->skemTableName}(id, skem_id, deskripsi, semester)
                VALUE (:id, :skem_id, :deskripsi, :semester)";  
        } else {
            $query =
                "UPDATE {$this->skemTableName} SET
                deskripsi=:deskripsi, semester=:semester
                WHERE id = :id";
        }
        $success = $this->db->execute($query, $placeholders, $dataTypes);
        if (!$success) {
            throw new DatabaseExecutionFailedException("Something wrong with database connection or query");  
        }
    }

    public function deleteById(string $id): ?RealisasiSkem
    {
        $isExist = $this->exist($realisasiSkem);
        $placeholders = [
            "id" => $realisasiSkem->id()->id(),
            "skem_id" => $realisasiSkem->skemId()->id(),
            "deskripsi" => $realisasiSkem->deskripsi(),
            "semester" => $realisasiSkem->semester(),
            "tanggal" => $realisasiSkem->tanggal()
        ];
        $dataTypes = [
            "id" => Column::BIND_PARAM_STR,
            "skem_id" => Column::BIND_PARAM_STR,
            "deskripsi" => Column::BIND_PARAM_STR,
            "semester" => Column::BIND_PARAM_INT
        ];
        $query = "";
        if($isExist){
            $query = 
                "DELETE FROM {$this->skemTableName} WHERE id=:id";
            $success = $this->db->execute($query, $placeholders, $dataTypes);
            if (!$success) {
                throw new DatabaseExecutionFailedException("Something wrong with database connection or query");  
            }
        } 
    }

    public function exist(RealisasiSkem $realisasiSkem) : bool
    {
        $query = $this->db->prepare(
            "SELECT 1 FROM {$this->skemTableName} WHERE id = :id"
        );
        $placeholders = [
            "id" => $realisasiSkem->id()->id()
        ];
        $dataTypes = [
            "id" => Column::BIND_PARAM_STR
        ];
        $result = $this->db->executePrepared($query, $placeholders, $dataTypes); 
        $row = $result->fetch();
        return !($row == false);
    }
}