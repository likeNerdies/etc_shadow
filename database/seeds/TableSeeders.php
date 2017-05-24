<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
use App\Admin;
use App\Plan;
use App\Address;
use App\Brand;
use App\Transporter;
use App\Category;
use App\Ingredient;
use App\Allergy;
class TableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_ES');

        Admin::create(["name" => "Razon", "first_surname" => "Miah", "password" => Hash::make("12345678"), "email" => "miahrazon@gmail.com", "can_create" => 1]);
        Admin::create(["name" => "Clara", "first_surname" => "Ameller", "password" => Hash::make("12345678"), "email" => "cameller@gmail.com", "can_create" => 1]);
        Admin::create(['name' => "Adria", 'first_surname' => "Vinas", 'email' => "avinas@gmail.com", 'password' => Hash::make("NtRnStR1617"), "can_create" => 1]);
        Admin::create(['name' => "Admin1", 'first_surname' => "Test1", 'email' => "testadmin1@gmail.com", 'password' => Hash::make("12345678"), "can_create" => 1]);
        Admin::create(['name' => "Admin2", 'first_surname' => "Test2", 'email' => "testadmin2@gmail.com", 'password' => Hash::make("12345678"), "can_create" => 1]);
        Admin::create(['name' => "Admin3", 'first_surname' => "Test3", 'email' => "testadmin3@gmail.com", 'password' => Hash::make("12345678")]);
        Admin::create(['name' => "Admin4", 'first_surname' => "Test4", 'email' => "testadmin4@gmail.com", 'password' => Hash::make("12345678")]);
        Admin::create(['name' => "Admin5", 'first_surname' => "Test5", 'email' => "testadmin5@gmail.com", 'password' => Hash::make("12345678")]);
        Admin::create(['name' => "Admin6", 'first_surname' => "Test6", 'email' => "testadmin6@gmail.com", 'password' => Hash::make("12345678"), "can_create" => 1]);


        Plan::create(['name' => "charming", "price" => 9.95, "info" => "Plan for poors"]);
        Plan::create(['name' => "pro", "price" => 18.95, "info" => "Plan for poors"]);
        Plan::create(['name' => "premium", "price" => 29.95, "info" => "Plan for poors"]);


        Category::create(['name' => "Milk","info" => "milk and things"]);
        Category::create(['name' => "Drinks", "info" => "drink and think"]);


        Ingredient::create(['name' => "Sugar", "info" => "sugar de la vitta"]);
        Ingredient::create(['name' => "Water", "info" => "water de la vitta"]);
        Ingredient::create(['name' => "flour", "info" => "flour de la vitta"]);

        Allergy::create(['name' => "Conjunctivitis"]);
        Allergy::create(['name' => "Decongestant"]);
        Allergy::create(['name' => "Epinephrine "]);
        Allergy::create(['name' => "Bronchodilators"]);


        Transporter::create(['name' => "Seur", "CIF" => "A96321456", "phone_number" => 934567891]);
        Transporter::create(['name' => "Envialia", "CIF" => "Z54258645", "phone_number" => 932354655]);
        Transporter::create(['name' => "Transportes Ramon y Cajal", "CIF" => "C56432186", "phone_number" => 936857846]);
        //brands
        foreach (range(1, 5) as $index) {
            $brands = Brand::create([
                'name' => $faker->company,
                'info' => $faker->realText(100),
            ]);
        }

/*************************************************************USER CREATING****/
        //users without plan
        foreach (range(1, 500) as $index) {
            $user = User::create([
                'dni' => $faker->dni,
                'name' => $faker->name,
                'first_surname' => $faker->firstName,
                'second_surname' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('secret'),
                'phone_number' => $faker->phoneNumber,
                // 'plan_id'=>$faker->numberBetween(1,3),
                'subscribed_at' => $faker->dateTimeBetween('2017-01-01', 'now'),
                'remember_token' => str_random(10),
            ]);
        }

        //users with plan MAY
        foreach (range(1, 350) as $index) {
            $user = User::create([
                'dni' => $faker->dni,
                'name' => $faker->name,
                'first_surname' => $faker->firstName,
                'second_surname' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('secret'),
                'phone_number' => $faker->phoneNumber,
                'plan_id' => $faker->numberBetween(1, 3),
                'subscribed_at' => $faker->dateTimeBetween('2017-05-01', 'now'),
                'remember_token' => str_random(10),
            ]);
            $address = Address::create([
                'street' => $faker->streetName,
                'building_number' => $faker->numberBetween(1, 400),
                'floor' => $faker->numberBetween(1, 10),
                'door' => $faker->numberBetween(1, 5),
                'postal_code' => $faker->numberBetween(1000, 9999),
                'town' => $faker->city,
                'province' => $faker->city,
                'country' => $faker->country,
            ]);
            $address->user()->associate($user);
            $address->save();
        }

        //users with plan April
        foreach (range(1, 300) as $index) {
            $user = User::create([
                'dni' => $faker->dni,
                'name' => $faker->name,
                'first_surname' => $faker->firstName,
                'second_surname' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('secret'),
                'phone_number' => $faker->phoneNumber,
                'plan_id' => $faker->numberBetween(1, 3),
                'subscribed_at' => $faker->dateTimeBetween('2017-04-01', '2017-04-31'),
                'remember_token' => str_random(10),
            ]);
            $address = Address::create([
                'street' => $faker->streetName,
                'building_number' => $faker->numberBetween(1, 400),
                'floor' => $faker->numberBetween(1, 10),
                'door' => $faker->numberBetween(1, 5),
                'postal_code' => $faker->numberBetween(1000, 9999),
                'town' => $faker->city,
                'province' => $faker->city,
                'country' => $faker->country,
            ]);
            $address->user()->associate($user);
            $address->save();
        }

        //users with plan March
        foreach (range(1, 250) as $index) {
            $user = User::create([
                'dni' => $faker->dni,
                'name' => $faker->name,
                'first_surname' => $faker->firstName,
                'second_surname' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('secret'),
                'phone_number' => $faker->phoneNumber,
                'plan_id' => $faker->numberBetween(1, 3),
                'subscribed_at' => $faker->dateTimeBetween('2017-03-01', '2017-03-31'),
                'remember_token' => str_random(10),
            ]);
            $address = Address::create([
                'street' => $faker->streetName,
                'building_number' => $faker->numberBetween(1, 400),
                'floor' => $faker->numberBetween(1, 10),
                'door' => $faker->numberBetween(1, 5),
                'postal_code' => $faker->numberBetween(1000, 9999),
                'town' => $faker->city,
                'province' => $faker->city,
                'country' => $faker->country,
            ]);
            $address->user()->associate($user);
            $address->save();
        }

        //users with plan February
        foreach (range(1, 200) as $index) {
            $user = User::create([
                'dni' => $faker->dni,
                'name' => $faker->name,
                'first_surname' => $faker->firstName,
                'second_surname' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('secret'),
                'phone_number' => $faker->phoneNumber,
                'plan_id' => $faker->numberBetween(1, 3),
                'subscribed_at' => $faker->dateTimeBetween('2017-02-01', '2017-02-31'),
                'remember_token' => str_random(10),
            ]);
            $address = Address::create([
                'street' => $faker->streetName,
                'building_number' => $faker->numberBetween(1, 400),
                'floor' => $faker->numberBetween(1, 10),
                'door' => $faker->numberBetween(1, 5),
                'postal_code' => $faker->numberBetween(1000, 9999),
                'town' => $faker->city,
                'province' => $faker->city,
                'country' => $faker->country,
            ]);
            $address->user()->associate($user);
            $address->save();
        }

        //users with plan January
        foreach (range(1, 100) as $index) {
            $user = User::create([
                'dni' => $faker->dni,
                'name' => $faker->name,
                'first_surname' => $faker->firstName,
                'second_surname' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('secret'),
                'phone_number' => $faker->phoneNumber,
                'plan_id' => $faker->numberBetween(1, 3),
                'subscribed_at' => $faker->dateTimeBetween('2017-01-01', '2017-01-31'),
                'remember_token' => str_random(10),
            ]);
            $address = Address::create([
                'street' => $faker->streetName,
                'building_number' => $faker->numberBetween(1, 400),
                'floor' => $faker->numberBetween(1, 10),
                'door' => $faker->numberBetween(1, 5),
                'postal_code' => $faker->numberBetween(1000, 9999),
                'town' => $faker->city,
                'province' => $faker->city,
                'country' => $faker->country,
            ]);
            $address->user()->associate($user);
            $address->save();
        }

/********************************************************************END USER CREATING*/
    }
}
