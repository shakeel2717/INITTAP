<?php

namespace App\Console\Commands;

use App\Models\admin;
use App\Models\Corporate;
use App\Models\Option;
use App\Models\pricing;
use App\Models\profile;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class clean extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
    public function handle()
    {
        $this->call('migrate:fresh');
        $this->call('cache:clear');
        $this->call('config:clear');
        $this->call('view:clear');
        $this->call('route:clear');
        $this->call('clear-compiled');

        // creating a new admin
        $user = new admin();
        $user->username = 'test';
        $user->password = Hash::make('test');
        $user->save();


        $option = new Option();
        $option->type = 'corporate_subscription_fees';
        $option->value = 100;
        $option->save();


        $option = new Option();
        $option->type = 'transactionId';
        $option->value = 5000500;
        $option->save();

    }
}
