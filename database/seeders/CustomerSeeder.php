<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/pod-data.csv"), "r");

        $customers = [];

        $firstline = true;
        while (($data = fgetcsv($csvFile, null, ",")) !== FALSE) {
            if (!$firstline) {
                array_push($customers, $data['0']);
            }
            $firstline = false;
        }

        $customers = array_unique($customers);

        foreach ($customers as $customer){
            Customer::create(['name' => $customer]);
        }

        fclose($csvFile);
    }
}
