<?php

namespace App\Console\Commands;

use App\Mail\notifyEmail;
use Illuminate\Console\Command;
use app\User;
use Illuminate\Support\Facades\Mail;

class notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email nptify for all users every day';

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
       // $user = user::select('email')->get();
        $emails = User::pluck('email')->toArray();
        foreach($emails as $email) {
            //how to send emails in laravel
            Mail::to($email)->send(new notifyEmail());
        }
    }
}
