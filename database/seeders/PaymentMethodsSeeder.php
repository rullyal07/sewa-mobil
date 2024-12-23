<?php

namespace Database\Seeders;

use App\Models\PaymentMethods;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentMethods::create([
            'metode_pembayaran' => 'Cash On Delivery'
        ]);
        PaymentMethods::create([
            'metode_pembayaran' => 'Outlet'
        ]);
        PaymentMethods::create([
            'metode_pembayaran' => 'e-Wallet'
        ]);
        PaymentMethods::create([
            'metode_pembayaran' => 'Transfer'
        ]);
        PaymentMethods::create([
            'metode_pembayaran' => 'Credit Card'
        ]);
    }
}
