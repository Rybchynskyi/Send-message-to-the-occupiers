<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Param;
use App\Models\User;
use Database\Factories\ParamsFactory;
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
        User::factory(1)->create([
            "name" => "SuperAdmin",
            "email" => "admin@all4ukraine.org",
            "is_admin" => 1,
            "password" => bcrypt("12345")
        ]);

        Param::factory(1)->create([
            "param" => "quantity_in_package",
            "value" => "2"
        ]);

        Param::factory(1)->create([
            "param" => "telegram_id",
            "value" => "-828642263"
        ]);

        Param::factory(1)->create([
            "param" => "signal_id",
            "value" => ""
        ]);

        Param::factory(1)->create([
            "param" => "send_message",
            "value" => "off"
        ]);

        Param::factory(1)->create([
            "param" => "add_order",
            "value" => "off"
        ]);

        Param::factory(1)->create([
            "param" => "order_by_default",
            "value" => ""
        ]);
        Param::factory(1)->create([
            "param" => "currency",
            "value" => "37"
        ]);
        Param::factory(1)->create([
            "param" => "telegram_group",
            "value" => "-1001709913879"
        ]);
        Param::factory(1)->create([
            "param" => "send_message_to_group",
            "value" => "off"
        ]);
    }
}
