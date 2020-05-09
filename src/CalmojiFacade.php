<?php

namespace Ahmad\Calmoji;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ahmad\Calmoji\Skeleton\SkeletonClass
 */
class CalmojiFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'calmoji';
    }
}
