<?php

namespace App\Console\Commands;

use App\Models\Entry;
use Illuminate\Console\Command;

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
    protected $description = 'This command deletes old entries from the database wich are older than 30 minutes.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Deleting old entries...');
        $entries = Entry::where('created_at', '<', now()->subMinutes(30))->get();
        foreach ($entries as $entry) {
            $entry->delete();
        }
        $this->info('Done!');
    }
}
