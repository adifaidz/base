<?php

namespace AdiFaidz\Base;

use Laratrust\LaratrustRole;
use AdiFaidz\Base\Traits\TableInfoTrait;

class BaseRole extends LaratrustRole
{
    use TableInfoTrait;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('basetrust.roles_table');
    }
}
