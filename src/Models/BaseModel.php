<?php


namespace Khokon\filterbuilder\Models;


use Illuminate\Database\Eloquent\Model;
use Khokon\filterbuilder\Builder\BaseFilter;

class BaseModel extends Model
{
    public function scopeFilters($query, BaseFilter $filter)
    {
        return $filter->apply($query);
    }
}
