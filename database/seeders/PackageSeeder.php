<?php

namespace Database\Seeders;

use App\Models\Package;
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
        Package::query()->updateOrCreate([
            'name'        => 'Free',
            'slug'        => 'free',
            'description' => 'This is Free plan, In this plan You can short 10 links per months.',
            'price'       => 0,
            'links_limit' => 10,
            'status'      => true,
        ]);

        Package::query()->updateOrCreate([
            'name'          => 'Premium',
            'slug'          => 'premium',
            'description'   => 'This is Premium plan, In this plan You can short 100 links per months.',
            'price'         => 5,
            'compare_price' => 10,
            'billing_type'  => 'monthly',
            'links_limit'   => 100,
            'status'        => true,
        ]);

        Package::query()->updateOrCreate([
            'name'          => 'Business',
            'slug'          => 'business',
            'description'   => 'This is Business plan, In this plan You can short 500 links per months.',
            'price'         => 20,
            'compare_price' => 40,
            'billing_type'  => 'monthly',
            'links_limit'   => 100,
            'status'        => true,
        ]);
    }
}
