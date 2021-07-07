<?php


namespace Khokon\filterbuilder\Builder;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

abstract class BaseFilter
{

    protected $request;

    protected $builder;

    /**
     * BaseFilter constructor.
     * @param $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;

        foreach ($this->filters() as $name => $value) {
            $method_name = Str::camel($name);
            if (method_exists($this, $method_name)) {
                call_user_func_array([$this, $method_name], array_filter([$value]));
            }
        }

        return $this->builder;
    }

    public function filters(): array
    {
        return $this->request->all();
    }


}
