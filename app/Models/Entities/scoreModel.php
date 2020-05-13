<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class scoreModel extends Model
{
    /**
     * 與模型關聯的資料表。
     *
     * @var string
     */
    protected $table = 'score';

    /**
     * 說明模型是否應該被戳記時間。
     *
     * @var bool
     */
    public $timestamps = false;
}
