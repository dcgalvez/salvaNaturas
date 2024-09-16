<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class DatabaseRepository
{
    public function callStoredProcedure($procedureName, $params)
    {
        return DB::procedure($procedureName, $params);
    }
}
// CTDL