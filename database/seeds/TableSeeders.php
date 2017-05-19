<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
use App\Admin;
use App\Plan;
use App\Address;
use App\Brand;
use App\Transporter;
class TableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_US');

        Admin::create(["name"=>"Razon","first_surname"=>"Miah","password"=>Hash::make("12345678"),"email"=>"miahrazon@gmail.com","can_create"=>1]);
        Admin::create(["name"=>"Clara","first_surname"=>"Ameller","password"=>Hash::make("12345678"),"email"=>"cameller@gmail.com","can_create"=>1]);
        Admin::create(['name'=>"Adria",'first_surname'=>"Vinas",'email'=>"avinas@gmail.com",'password'=>Hash::make("NtRnStR1617"),"can_create"=>1]);
        Admin::create(['name'=>"Admin",'first_surname'=>"Test",'email'=>"testadmin@gmail.com",'password'=>Hash::make("12345678")]);

        Plan::create(['name' => "charming", "price" => 9.95]);
        Plan::create(['name' => "pro", "price" => 18.95]);
        Plan::create(['name' => "premium", "price" => 29.95]);

        Transporter::create(['name' => "Seur", "CIF" => "A96321456","phone_number"=>934567891]);
        Transporter::create(['name' => "Envialia", "CIF" => "Z54258645","phone_number"=>932354655]);
        Transporter::create(['name' => "Transportes Ramos y Cajal", "CIF" => "C56432186","phone_number"=>936857846]);
        //brands
        foreach (range(1, 250) as $index) {
            $brands = Brand::create([
                'name' => $faker->company,
                'info' =>$faker->text(100),
            ]);
        }

        //address
        foreach (range(1, 500) as $index) {
            $address = Address::create([
                'street' => $faker->streetName,
                'building_number'=>$faker->numberBetween(1,400),
                'floor' => $faker->numberBetween(1,10),
                'door' => $faker->numberBetween(1,5),
                'postal_code'=>$faker->numberBetween(1000,9999),
                'town'=>$faker->city,
                'province' => $faker->city,
                'country' => $faker->country
            ]);
        }

        //users without plan
        foreach (range(1, 300) as $index) {
            $user = User::create([
                'name' => $faker->name,
                'first_surname' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('secret'),
                'phone_number' => 123456789,
                // 'plan_id'=>$faker->numberBetween(1,3),
                'subscribed_at' => $faker->dateTimeBetween("-1years", "now"),
                'remember_token' => str_random(10),
            ]);
        }

        //users with plan
        foreach (range(1, 350) as $index) {
            $user = User::create([
                'name' => $faker->name,
                'first_surname' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('secret'),
                'phone_number' => 123456789,
                'plan_id'=>$faker->numberBetween(1,3),
                'subscribed_at' => $faker->dateTimeBetween("-1years", "now"),
                'remember_token' => str_random(10),
                'address_id'=>$faker->numberBetween(1,3),
            ]);
        }
    }
}
