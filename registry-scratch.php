<?php

use PHPNomad\Registry\Interfaces\CanDelete;
use PHPNomad\Registry\Interfaces\CanGet;
use PHPNomad\Registry\Interfaces\CanSet;

interface HasRegistries{
    /**
     * @return (CanGet|CanSet|CanDelete)[]
     */
    public function getRegistries(): array;
}