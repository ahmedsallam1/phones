<?php

namespace App\Console\Commands;

use App\Models\Customer;
use App\Models\Phone;
use Illuminate\Console\Command;

class PopulatePhonesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'phones:populate';

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

        print("==== Populating Data ==== \n ");
        $customers = Customer::all();
        $phones = [];
        foreach ($customers as $customer) {
            $phones[] = [
                "country" => $customer->country,
                "country_code" => $customer->country_code,
                "phone_number" => $customer->phone_number,
                "state" => $customer->state,
            ];
        }
        Phone::truncate();
        Phone::insert($phones);

        print("==== Data Populated ==== \n ");
    }
}
