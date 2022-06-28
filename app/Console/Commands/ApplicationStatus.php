<?php

namespace App\Console\Commands;

use App\Models\Application;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ApplicationStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'application:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Application status update';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(){
        // THIS WILL DONE IN PUBLICATION STAGE,
        $application = DB::table('applications')->where('status', 'On-going')->first();

        if($application != null){

            // TODO: Check the application's due date, if match with current date
            // change the status

            Application::where('id', $application->id)->update([

                'status' => 'Closed'
            ]);

        }else{
           echo "Wala na pok";
        }
    }
}
