<?php

namespace SiaSkem\Skem\Domain\Model;

interface SkemRepository{
    public function all() : array;
    public function byId(string $id) : ?Skem;
    public function deleteById(string $id);
    public function save(Skem $skem);
}