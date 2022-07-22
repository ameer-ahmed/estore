<?php

namespace Database\Seeders;

use App\Models\Admin\Seller;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seller::create([
            'username' => 'estore',
            'email' => 'seller@estore.com',
            'password' => Hash::make('12345678'),
            'first_name' => 'e-Store',
            'zone' => 13837, // Al Mansurah, Egypt
            'address1' => '14 Toriel Street',
            'phone1' => '+201000000001',
            'postal_code' => '35511',
            'type' => 1, // Company
            'no' => '8743978019', // Company = Commercial Registration No, Person = National ID
            'is_verified' => 1, // Verified
            'account_status' => 1, // Normal
        ]);
    }
}
