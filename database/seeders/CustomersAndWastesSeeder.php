<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Waste;

class CustomersAndWastesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/pod-data.csv"), "r");

//        $customers = [];

        $firstline = true;
        while (($data = fgetcsv($csvFile, null, ",")) !== FALSE) {
            if (!$firstline) {
                $customer = Customer::firstOrCreate(['name' => $data[0]]);
                $waste = Waste::create([
                    'customer_id' => $customer->id,
                    'site' => $data[1],
                    'year' => $data[2],
                    'month' => $data[3],
                    'waste_type' => str_replace(' ', '_', strtolower($data[4])),
                    'estimated_quantity' => $data[5] != '' ? $data[5] : null,
                    'actual_quantity' => $data[6] != '' ? $data[6] : null,
                ]);
//                array_push($customers, $data['0']);
            }
            $firstline = false;
        }

//        $customers = array_unique($customers);

//        foreach ($customers as $customer){
//            Customer::create(['name' => $customer]);
//        }

        fclose($csvFile);
    }
}
