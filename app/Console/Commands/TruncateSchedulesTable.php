<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TruncateSchedulesTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedules:truncate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Safely truncate the schedules table by first removing related records';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if ($this->confirm('This will delete all schedules and related absences. Are you sure?')) {
            DB::beginTransaction();
            try {
                // Disable foreign key checks
                DB::statement('SET FOREIGN_KEY_CHECKS=0');
                
                // Truncate both tables
                DB::table('absences')->truncate();
                DB::table('schedules')->truncate();
                
                // Re-enable foreign key checks
                DB::statement('SET FOREIGN_KEY_CHECKS=1');
                
                DB::commit();
                $this->info('Successfully truncated schedules and absences tables.');
            } catch (\Exception $e) {
                DB::rollBack();
                // Make sure to re-enable foreign key checks even if there's an error
                DB::statement('SET FOREIGN_KEY_CHECKS=1');
                $this->error('An error occurred: ' . $e->getMessage());
            }
        } else {
            $this->info('Operation cancelled.');
        }
    }
}
