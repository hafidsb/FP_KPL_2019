<?php

namespace SiaSkem\Skem\Domain\Model;

interface RencanaSkemRepository
{
    public function all(): array;
    public function save(RencanaSkem $rencanaSkem);
    public function deleteById(string $id);

}