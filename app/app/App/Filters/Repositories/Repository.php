<?php

namespace App\App\Filters\Repositories;

use App\App\Filters\FilterResource;
use Illuminate\Database\Eloquent\Model;
use App\App\Filters\PrimitiveObjects\FilterObject;
use App\App\Filters\PrimitiveObjects\SortPrimitive;
use App\App\Filters\PrimitiveObjects\LimitPrimitive;
use App\App\Filters\PrimitiveObjects\OffsetPrimitive;
use App\App\Filters\PrimitiveObjects\FilterParamsPrimitive;

abstract class Repository implements RepositoryInterface
{
    protected Model $model;

    public function filter(FilterObject $filter): FilterResource
    {
        $query = $this->model::query();
        $query = $this->paramsHandle($filter->getFilterParams(), $query);
        $query = $this->sortOffsetLimitHandle($filter->getSort(), $filter->getOffset(), $filter->getLimit(), $query);

        return new FilterResource($query->count(), $query->get());
    }

    abstract protected function paramsHandle(FilterParamsPrimitive $filterParams, $query);

    abstract protected function sortOffsetLimitHandle(
        SortPrimitive $sort,
        OffsetPrimitive $offset,
        LimitPrimitive $limit,
        $query
    );

}