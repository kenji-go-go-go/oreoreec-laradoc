<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            UserSeeder::class,
            ProductSeeder::class,
            Delivery_methodSeeder::class,
            StatusSeeder::class,
            DeliverySeeder::class,
            AdministratorSeeder::class,
            TrackSeeder::class,
            Transport_managerSeeder::class,
            DestinationSeeder::class,
            OrderSeeder::class,
            Order_detailSeeder::class,
            Order_breakdownSeeder::class,
            Site_masterSeeder::class,
            Transport_managementSeeder::class,
        ]);
    }
}
