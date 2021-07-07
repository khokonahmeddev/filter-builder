<?php


namespace Khokon\filterbuilder\Traits;


use Khokon\filterbuilder\Builder\BaseFilter;

trait ScopeFilterTrait
{

    public function scopeFilters($query, BaseFilter $filter)
    {
        return $filter->apply($query);
    }
}
