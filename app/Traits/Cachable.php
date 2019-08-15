<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

/**
 * Trait Cachable
 * @package App\Traits
 */
trait Cachable
{
    /**
     * This function calls the Cache's remember function which fetches the objects from the Cache. Pass
     * the $minutesToBeCachedFor -1 if we want to store this Object into cache indefinitely.
     *
     * @param $key
     * @param callable $callback
     * @param int $minutesToBeCachedFor
     *
     * @return mixed
     */
    public function fetchFromCache($key, callable $callback, $minutesToBeCachedFor = 15)
    {
        $key = $key . "_".config('app.name');
        if($minutesToBeCachedFor == -1) {
            //Store this indefinitely
            return Cache::rememberForever($key, $callback);
        }

        // Return what we have found
        return Cache::remember($key, $minutesToBeCachedFor, $callback);
    }

    /**
     * @param $key
     * @return mixed
     */
    public function removeFromCache($key)
    {
         $key = $key . "_".config('app.name');
        return Cache::pull($key);
    }
}
