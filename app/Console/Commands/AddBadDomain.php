<?php

namespace App\Console\Commands;

use App\Models\BadDomain;
use Illuminate\Console\Command;

class AddBadDomain extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'domain:add {domain}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new bad domain to the table';

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
        $this->info('Started adding domain ...');
        $domain = $this->argument('domain');

        if(BadDomain::where('name','=', $domain)->first()){
            $this->error('Sorry! This domain already in database! Please, try another!');
        } else {
            $newDomain = new BadDomain();
            $newDomain->name = trim($domain);
            $newDomain->save();

            $this->info('Success! Just added - '.$domain);
        };
    }
}
