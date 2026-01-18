<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class OrdersSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();

        if ($products->count() === 0) {
            $this->command->warn('لا يوجد منتجات، أضف منتجات أولاً');
            return;
        }

        for ($i = 1; $i <= 10; $i++) {

            $order = Order::create([
                'customer_name'        => 'عميل رقم ' . $i,
                'customer_email'       => "customer{$i}@mail.com",
                'customer_phone_one'   => '010' . rand(10000000, 99999999),
                'customer_phone_two'   => '011' . rand(10000000, 99999999),
                'customer_governoment'  => 'الجيزة',
                'customer_town'        => 'مدينة ' . $i,
                'customer_address'     => 'شارع رقم ' . rand(1, 50),
                'delivery_price'       => 50,
                'total_price'          => 0,
                'status'               => collect(['pending','processing','shipped','delivered'])->random(),
            ]);

            $total = 0;

            foreach ($products->random(rand(1, 2)) as $product) {

                $qty   = rand(1, 5);
                $price = $product->price;

                OrderItem::create([
                    'order_id'  => $order->id,
                    'product_id'=> $product->id,
                    'quantity'  => $qty,
                    'price'     => $price,
                ]);

                $total += $price * $qty;
            }

            $order->update([
                'total_price' => $total + $order->delivery_price
            ]);
        }
    }
}
