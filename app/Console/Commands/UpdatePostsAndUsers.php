<?php

namespace App\Console\Commands;

use App\Libraries\UsersAndPostsUpdater;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UpdatePostsAndUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command will update posts and users tables with data from https://jsonplaceholder.typicode.com/';

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
     * @return int
     */
    public function handle(UsersAndPostsUpdater $updater)
    {
        $updater->update();
        return 0;
    }
}
