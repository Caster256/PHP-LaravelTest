<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;

class delPostData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete post data';

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
     */
    public function handle()
    {
        DB::table('post')->truncate();
    }
}
