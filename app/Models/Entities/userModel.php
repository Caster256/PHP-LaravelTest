<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{
    /**
     * 與模型關聯的資料表。
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * 說明模型是否應該被戳記時間。
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * 取得與使用者有關的電話記錄。
     */
    public function phone()
    {
        //一對一
        //return $this->hasone('App\Models\Entities\phoneModel','u_id');
        //一對多
//        return $this->hasMany('App\Models\Entities\phoneModel','u_id');
        //多對多
        return $this->belongsToMany('App\Models\Entities\phoneModel', 'score', 'u_id', 'p_id');
    }
}
