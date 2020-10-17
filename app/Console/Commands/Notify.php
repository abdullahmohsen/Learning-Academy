<?php

namespace App\Console\Commands;

use App\Models\Student;
use App\Mail\NotifyEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Notify extends Command
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
    protected $description = 'Send email notify for all student every day';

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
        //$student = Student::where('email')->get();
        $emails = Student::pluck('email')->toArrary(); //bageb el emails kolha fe array
        $data = ['title'=>'programming', 'body'=>'php'];
        foreach ($emails as $email)
        {
            //how to send emails in laravel
            Mail::to($email)->send(new NotifyEmail($data));
        }
        // return 0;
    }
}
