<?php

namespace App\Console\Commands;

use App\Models\admin;
use App\Models\pricing;
use App\Models\profile;
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
        Artisan::call('migrate:fresh');
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');

        // creating a new user
        $user = new User();
        $user->name = 'Shakeel Ahmad';
        $user->username = 'shakeel2717';
        $user->email = 'shakeel2717@gmail.com';
        $user->password = Hash::make('asdfasdf');
        $user->code = userCode();
        $user->save();

        // creating a new profile
        $profile = new profile();
        $profile->user_id = $user->id;
        $profile->title = "Shakeel Ahmad";
        $profile->about = "Hi, I\'m Graphic Designer, Please let me know if you have any questions.";
        $profile->save();



        // creating a new admin
        $user = new admin();
        $user->username = 'test';
        $user->password = Hash::make('test');
        $user->save();

        // creating pricing
        $price = new pricing();
        $price->title = "Classic";
        $price->type = "Silver Foil on Matte Black";
        $price->price = '79.99';
        $price->img = '1.png';
        $price->save();

        // creating pricing
        $price = new pricing();
        $price->title = "Ceramic White";
        $price->type = "Gold Foil on Matte White";
        $price->price = '79.99';
        $price->img = '2.png';
        $price->save();

        // creating pricing
        $price = new pricing();
        $price->title = "Classic Gold";
        $price->type = "Gold Foil on Matte Black";
        $price->price = '79.99';
        $price->img = '3.png';
        $price->save();

        return Command::SUCCESS;
    }
}
