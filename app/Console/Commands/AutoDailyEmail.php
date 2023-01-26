<?php

namespace App\Console\Commands;

use App\Mail\DailyEmail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AutoDailyEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:dailyEmail';

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
        // $users = User::whereMonth('birthdate', date('m'))
        //     ->whereDay('birthdate', date('d'))
        //     ->get();
        $users = User::all();

        if ($users->count() > 0) {
            foreach ($users as $user) {
                $details = ['user' => $user];
                Mail::to($user)->send(new DailyEmail($details));
            }
        }
        return 0;
    }
}
