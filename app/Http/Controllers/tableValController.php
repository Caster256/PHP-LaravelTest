<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\Entities\test;

class tableValController extends Controller
{
    private $test;

    public function __construct(test $test)
    {
        $this->test = $test;
    }

    public function index()
    {
        for($i = 1;$i < 4;$i++) {
            $this->test->setTable('test'.$i);
            $t = $this->test->newInstance();
            //由於這是臨時回傳的model，所以不能使用靜態的query，因為它會吃到預設的table
            $list = $t->get();

            echo '<pre>';
            print_r($list[0]['content']);
            echo '</pre>';
        }
    }
}
