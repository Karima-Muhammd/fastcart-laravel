<?php
use \App\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Package::create(['name' => 'الباقه الماسيه', 'no_station' => 5, 'no_orderPerMonth' => 150, 'no_orderFree'=>3, 'orderPrice'=>3, 'subscribePrice'=>450]);
        Package::create(['name' => 'الباقه الذهبيه', 'no_station' => 3, 'no_orderPerMonth' => 90, 'no_orderFree'=>2, 'orderPrice'=>4, 'subscribePrice'=>360]);
        Package::create(['name' => 'الباقه الفضيه', 'no_station' => 1, 'no_orderPerMonth' =>30, 'no_orderFree'=>1, 'orderPrice'=>6, 'subscribePrice'=>180]);
    }
}
