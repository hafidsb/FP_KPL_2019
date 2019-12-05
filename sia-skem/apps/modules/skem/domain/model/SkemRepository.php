<?php

namespace Idy\Skem\Domain\Model;

interface SkemRepository{
    public function byId(string $id) : ?Skem;
    public function save(Skem $skem);
}