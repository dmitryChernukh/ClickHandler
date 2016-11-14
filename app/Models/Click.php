<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    /**
     * @var string
     */
    protected $table = 'click';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ua',
        'ip',
        'ref',
        'param1',
        'param2'
    ];

    /**
     * @param $data
     * @return mixed
     * We are looking for a bunch of four unique values
     */
    public static function getBunchOfUniqueData ($data) {
        $bunch = Click::where('ua', '=', $data['user_agent'])
               ->where('ip', '=',  $data['ip']);
        /** if referrer value == null, we search without ref. Search only by three values */
        if(!is_null($data['ref'])){
               $bunch->where('ref', '=', $data['ref']);
        };
        $bunch->where('param1', '=', $data['param1']);//->toSql();

        return $bunch->first();
    }

    /**
     * @return int
     */
    public static function getAutoIncrementValue () {
        $last = self::select('id')->orderBy('id', 'desc')->limit(1)->first();
        if($last){
            return ($last->id)+1;
        } else return 1;
    }


}
