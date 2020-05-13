<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;

class insPostData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     *
     * 指令的名稱
     */
    protected $signature = 'insData';

    /**
     * The console command description.
     *
     * @var string
     *
     * 指令的說明
     */
    protected $description = 'insert post data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     *
     * 執行指令
     */
    public function handle()
    {
        date_default_timezone_set("Asia/Shanghai");
        DB::table('post')->insert([
            'title' => date('Y-m-d H:i:s'),
            'content' => 'test'
        ]);
    }
}
