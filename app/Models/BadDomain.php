<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BadDomain extends Model
{
    /**
     * @var string
     */
    protected $table = 'bad_domains';

    /**
     * @param $ip
     * @return mixed
     */
    public static function findBadDomain ($ip) {
        return self::where('name','=', $ip)->first();
    }

}
