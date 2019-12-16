<?php

namespace SiaSkem\Skem\Infrastructure;

use SiaSkem\Skem\Domain\Model\Skem;
use SiaSkem\Skem\Domain\Model\SkemId;
use SiaSkem\Skem\Domain\Model\SkemFactory;
use SiaSkem\Skem\Domain\Model\SkemRepository;
use Phalcon\Db\Column;

class MySqlSkemRepository implements SkemRepository{
    
    private $db;
    private $skemTableName;

    public function __construct($di)
    {
        $this->db = $di->get('db');
        $this->skemTableName = "skems";
    }

    public function all() : array
    {
        $query = 
            "SELECT id, nama_kegiatan, jenis_kegiatan, lingkup, poin 
            FROM {$this->skemTableName}";
        $result = $this->db->query($query);
        $rows = $result->fetchAll();
        $skems = array();
        foreach ($rows as $row){
            $skem = SkemFactory::create(
                $row["id"], 
                $row["nama_kegiatan"],
                $row["jenis_kegiatan"], 
                $row["lingkup"],
                $row["poin"]
            );
            array_push($skems, $skem);
        }
        return $skems;
    }

    public function byId(string $id) : ?Skem
    {
         $query = $this->db->prepare(
            "SELECT nama_kegiatan, jenis_kegiatan, lingkup, poin
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
        $skem = SkemFactory::create(
            $id,
            $row["nama_kegiatan"],
            $row["jenis_kegiatan"], 
            $row["lingkup"],
            $row["poin"]
        );
        return $skem;
    }

    public function save(Skem $skem)
    {
        $isExist = $this->exist($skem);
        $placeholders = [
            "id" => $skem->id()->id(),
            "namaKegiatan" => $skem->kegiatan()->nama(),
            "jenisKegiatan" => $skem->kegiatan()->jenis(),
            "lingkup" => $skem->lingkup(),
            "poin" => $skem->poin(),
        ];
        $dataTypes = [
            "id" => Column::BIND_PARAM_STR,
            "namaKegiatan" => Column::BIND_PARAM_STR,
            "jenisKegiatan" => Column::BIND_PARAM_STR,
            "lingkup" => Column::BIND_PARAM_STR,
            "poin" => Column::BIND_PARAM_INT,
        ];
        $query = "";
        if(!$isExist){
            $query =
                "INSERT INTO {$this->skemTableName}(id, nama_kegiatan, jenis_kegiatan, lingkup, poin)
                VALUE (:id, :namaKegiatan, :jenisKegiatan, :lingkup, :poin)";  
        } else {
            $query =
                "UPDATE {$this->skemTableName} SET
                nama_kegiatan=:namaKegiatan, jenis_kegiatan=:jenisKegiatan,
                lingkup=:lingkup, poin=:poin
                WHERE id = :id";
        }
        $success = $this->db->execute($query, $placeholders, $dataTypes);
        if (!$success) {
            throw new DatabaseExecutionFailedException("Something wrong with database connection or query");  
        }
    }

    private function exist(Skem $skem) : bool
    {
        $query = $this->db->prepare(
            "SELECT 1 FROM {$this->skemTableName} WHERE id = :id"
        );
        $placeholders = [
            "id" => $skem->id()->id()
        ];
        $dataTypes = [
            "id" => Column::BIND_PARAM_STR
        ];
        $result = $this->db->executePrepared($query, $placeholders, $dataTypes); 
        $row = $result->fetch();
        return !($row == false);
    }
}