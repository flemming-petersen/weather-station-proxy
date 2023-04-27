<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Entry;

class DeleteOldEntries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'foerde:delete-old-entries';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command deletes old entries from the database wich are older than 3 days.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Deleting old entries...');
        $entries = Entry::where('created_at', '<', now()->subDays(3))->get();
        foreach ($entries as $entry) {
            $entry->delete();
        }
        $this->info('Done!');
    }
}
