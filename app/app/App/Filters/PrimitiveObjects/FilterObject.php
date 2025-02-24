<?php

namespace App\App\Filters\PrimitiveObjects;

final class FilterObject
{
    public function __construct(
        private FilterParamsPrimitive $filterParams,
        private ?LimitPrimitive $limit,
        private ?SortPrimitive $sort,
        private ?OffsetPrimitive $offset,
    ) {
    }

    public function getFilterParams(): FilterParamsPrimitive {
        return $this->filterParams;
    }

    public function getLimit(): ?LimitPrimitive {
        return $this->limit;
    }

    public function getSort(): ?SortPrimitive {
        return $this->sort;
    }

    public function getOffset(): ?OffsetPrimitive {
        return $this->offset;
    }

    public function setFilterParams(FilterParamsPrimitive $filterParams): void
    {
        $this->filterParams = $filterParams;
    }

    public function setLimit(?LimitPrimitive $limit): void {
        $this->limit = $limit;
    }

    public function setSort(?SortPrimitive $sort): void {
        $this->sort = $sort;
    }

    public function setOffset(?OffsetPrimitive $offset): void {
        $this->offset = $offset;
    }
}