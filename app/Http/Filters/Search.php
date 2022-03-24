<?php

namespace App\Http\Filters;

use Closure;
use Illuminate\Contracts\Database\Eloquent\Builder;

class Search
{
    public function handle(Builder $builder, Closure $next): Builder
    {
        if (request()->has('search')) {
            $builder ->where('name', 'like', '%'.request('search').'%');
        }

        return $next($builder);
    }
}
