<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\SyncController;

class DeleteTemp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete_temp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'appointment reminder mail';

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
        $controller = new SyncController();
        $controller->deleteFolderTemp();
    }
}
