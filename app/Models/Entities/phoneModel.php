<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class phoneModel extends Model
{
    /**
     * 與模型關聯的資料表。
     *
     * @var string
     */
    protected $table = 'phone';

    /**
     * 說明模型是否應該被戳記時間。
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * 取得擁有手機的使用者。
     */
    public function user()
    {
        return $this->belongsTo('App\Models\Entities\userModel','u_id');
    }
}
