<?php

namespace App\Redis;

use Illuminate\Support\Facades\Redis;

class RedisManagerService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function handleIdempotency($key)
    {
        $keyUnit = 'idempotency:' . $key;
        
        return Redis::set($keyUnit, 'processing', 'EX', 100, 'NX');
    }
}
