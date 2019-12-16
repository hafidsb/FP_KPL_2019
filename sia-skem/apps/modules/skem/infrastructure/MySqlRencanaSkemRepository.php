<?php

namespace SiaSkem\Skem\Infrastructure;

use SiaSkem\Skem\Domain\Model\RencanaSkem;
use SiaSkem\Skem\Domain\Model\SkemFactory;
use SiaSkem\Skem\Domain\Model\RencanaSkemRepository;
use Phalcon\Db\Column;

class MySqlRencanaSkemRepository implements RencanaSkemRepository
{
    private $db;
    private $tableName;

    
}