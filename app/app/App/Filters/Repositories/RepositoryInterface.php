<?php

namespace App\App\Filters\Repositories;

use App\App\Filters\FilterResource;
use App\App\Filters\PrimitiveObjects\FilterObject;

interface RepositoryInterface
{
    public function filter(FilterObject $filter): FilterResource;
}