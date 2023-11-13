<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Customer;
use App\Models\Package;

class RegisterPackageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'package:register {customerId} {packageId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Register a package for a customer';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $customerId = $this->argument('customerId');
        $packageId = $this->argument('packageId');

        // Fetch the customer and package from the database
        $customer = Customer::find($customerId);
        $package = Package::find($packageId);

        // Check if customer and package exist
        if (!$customer || !$package) {
            $this->error('Customer or Package not found.');
            return 1;
        }

        // Logic to check package availability and register the package
        // ...

        $this->info('Package registered successfully.');
        return 0;
    }
}
