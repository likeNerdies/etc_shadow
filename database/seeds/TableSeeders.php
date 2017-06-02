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
use App\Product;
use App\Box;
use App\Delivery;
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
        Admin::create(['name' => "Admin7", 'first_surname' => "Test7", 'email' => "testadmin7@gmail.com", 'password' => Hash::make("12345678")]);
        Admin::create(['name' => "Admin8", 'first_surname' => "Test8", 'email' => "testadmin8@gmail.com", 'password' => Hash::make("12345678"), "can_create" => 1]);


        Plan::create(['name' => "charming", "price" => 9.95, "info" => "The Charming plan is small but plenty of delightfulness. 4 products: One drink (no dairy milk or juicies), a cookies box, a cereal box and a bar pack."]);
        Plan::create(['name' => "pro", "price" => 18.95, "info" => "The Pro plan is as pro as you are. 8 products: One drink (no dairy milk or juicies), a cookies box, a cereal box and a bar pack."]);
        Plan::create(['name' => "premium", "price" => 29.95, "info" => "The Premium plan will change you. 12 products: One drink (no dairy milk or juicies), a cookies box, a cereal box and a bar pack."]);


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

        Product::create(["name"=>"Cashew Drink","price"=>"2.50","description"=>"Cashew: it’s like a tiny tree cow. Of all nuts, cashews are the milkiest. They’re soft and creamy to begin with; we just roast them lightly to bring out their full nutty flavour, then combine them with spring water and a pinch of sea salt – and nothing else.","expiration_date"=>"2017-09-20 00:00:00","dimension"=>1,"weight"=>1000,"real_weight"=>1030,"stock"=>1865,"vegetarian"=>1,"organic"=>1,"vegan"=>1]);
        Product::create(["name"=>"Hazelnut Drink","price"=>"2.20","description"=>"Hazelnut Drink. We’d like to take the credit for making this drink delicious, but the truth is that nature did all the work on this one. Its rich, sweet flavour comes from roasted Italian tondo gentile hazelnuts, the best in the world. Its silky texture comes from a little rice that we blend into the mountain spring water. It’s as close as you can get to perfect hazelnuts in liquid form.","expiration_date"=>"2017-10-21 00:00:00","dimension"=>1,"weight"=>1000,"real_weight"=>1030,"stock"=>2365,"vegetarian"=>1,"organic"=>1,"vegan"=>1]);
        Product::create(["name"=>"Coconut Drink","price"=>"1.90","description"=>"Coconut Drink. A refreshing alternative to milk. We take all the lovely white stuff from coconuts and whip it up until it’s smooth. Then we blend it with rice, pure mountain spring water and a pinch of sea salt. The coconut’s good oils give it a creamy texture, while giving you all kinds of nutrient goodies","expiration_date"=>"2017-10-11 00:00:00","dimension"=>1,"weight"=>1000,"real_weight"=>1030,"stock"=>2865,"vegetarian"=>1,"organic"=>1,"vegan"=>1]);
        Product::create(["name"=>"Cacao & Vanilla Granola","price"=>"2.90","description"=>"Cacao nibs are chocolate in its purest form – they taste sharp, not sweet, just like the Aztecs used to eat them. The Aztecs didn’t add sugar to compliment the sweetness; they used vanilla. That’s exactly what we’ve done with our Cacao & Vanilla granola. When you add milk, the flavours all combine to give a rich, smooth taste with a sophisticated chocolaty hint.","expiration_date"=>"2018-09-21 00:00:00","dimension"=>1,"weight"=>40,"real_weight"=>45,"stock"=>2200,"vegetarian"=>1,"organic"=>1,"vegan"=>0]);
        Product::create(["name"=>"Super Seed Muesli","price"=>"2.90","description"=>"Six seeds and six grains. A farmer’s dozen. We’ve combined six seeds with six grains to make it feel like there’s a harvest festival going on in your mouth. Big fat sunflower and pumpkin seeds jostle with two different kinds of linseeds, exotic coconut and tiny chia and poppy seeds. There’s oats, joined with spelt and quinoa flakes for crunch, rye and buckwheat for deep notes, and handfuls of fruit because we just couldn’t stop ourselves.","expiration_date"=>"2018-10-21 00:00:00","dimension"=>1,"weight"=>40,"real_weight"=>45,"stock"=>2200,"vegetarian"=>1,"organic"=>1,"vegan"=>0]);
        Product::create(["name"=>"The Ultimate Muesli","price"=>"2.90","description"=>"The Ultimate Muesli. Why make a muesli with 23 ingredients when most have fewer than 12? Because it means that every spoonful is different. Sometimes you get some plump blueberries with a bit of Brazil nuts and Almonds. Sometimes you get soft Apricots and tingly little seeds. We’ve even made the grains interesting. There’s no wheat, just Quinoa, Oats, Rye and Barley Flakes to make it light and crunchy. After this, other breakfasts are going to seem a bit dull.","expiration_date"=>"2018-10-21 00:00:00","dimension"=>1,"weight"=>40,"real_weight"=>45,"stock"=>2200,"vegetarian"=>1,"organic"=>1,"vegan"=>0]);
        Product::create(["name"=>"Bircher Soft and Fruity","price"=>"2.90","description"=>"Bircher Soft and Fruity. Original Swiss muesli, invented by Dr Bircher, was made the night before to let the flavours all flow together into a smooth, comforting breakfast. We’ve milled these oats extra fine, so they go soft and creamy immediately. It’s as if you’ve made muesli the old Swiss way, without the wait. The fruit’s chopped really small, so the sweetness spreads through the milk, making a kind of fruity porridge.","expiration_date"=>"2018-10-21 00:00:00","dimension"=>1,"weight"=>40,"real_weight"=>45,"stock"=>2200,"vegetarian"=>1,"organic"=>1,"vegan"=>0]);
        Product::create(["name"=>"Almond Butter with Sea Salt","price"=>"3.90","description"=>"Latte. Croissants. Chocolate. Let’s face it, everything is better when you add almonds, and after extensive research, we’ve decided that porridge is no exception. We roast the almonds just before we create the porridge, so they keep more of their flavour, then we chop them up in two different ways: bigger pieces for crunch and finely ground ones to give it a satisfying silky texture.  ","expiration_date"=>"2018-10-21 00:00:00","dimension"=>1,"weight"=>150,"real_weight"=>155,"stock"=>2200,"vegetarian"=>1,"organic"=>1,"vegan"=>1]);
        Product::create(["name"=>"Puffed Brown Rice","price"=>"3.50","description"=>"Puffed Brown Rice. Silent but lovely: why Real Puffed Rice is different. Real puffed rice doesn’t make a sound when you pour milk on it. Most puffed rice is pulped, reconstitute, fortified, sugar-coated and flash-fried. No wonder it explodes on contact with liquid. We only use wholegrain brown rice from Italy’s Po Valley. We compress it, we pause for a moment, then we release the pressure… and foop! It turns into tasty little bubbles of fun, with all the crunch and flavour you could possibly need. If you want a tasty breakfast, we’re always happy to help. If you want a noisy one, turn up the radio.","expiration_date"=>"2018-10-11 00:00:00","dimension"=>2,"weight"=>390,"real_weight"=>410,"stock"=>1899,"vegetarian"=>1,"organic"=>1,"vegan"=>1]);
        Product::create(["name"=>"Honey Multiflakes","price"=>"3.50","description"=>"Honey Multiflakes. A bowlful of multigrain flakes always puts an extra bounce in our pogo stick. It’s the combination of colours and flavours that does it. Every flake in this packs started as an individual grain, waving around on a stalk in a field. We just harvest, steam, roll and toast them. Then we add a drizzle of maple syrup and honey over the top, making them even crispier. So you get a triple whammy of wholegrain taste and nutrtion, to keep you boinging off the walls all day.","expiration_date"=>"2018-10-11 00:00:00","dimension"=>2,"weight"=>390,"real_weight"=>410,"stock"=>1899,"vegetarian"=>1,"organic"=>1,"vegan"=>1]);
        Product::create(["name"=>"Oat & Spelt Crackers","price"=>"2.50","description"=>"Organic Oat & Spelt Crackers. Whether you’re picnicking on a mountainside or nibbling at a cocktail party, our Oaty Crackers will keep you going all day and all night. We take the finest organic oats and spelt, puff them and turn them into big, satisfying circles for you. They have a nutty sophistication all by themselves, or you can pile more yummy stuff on top.","expiration_date"=>"2018-10-11 00:00:00","dimension"=>1,"weight"=>190,"real_weight"=>195,"stock"=>1899,"vegetarian"=>1,"organic"=>1,"vegan"=>0]);
        Product::create(["name"=>"Ginger & Turmeric Oaty","price"=>"2.49","description"=>"Turmeric and ginger may not grow near Inverness, but they go surprisingly well with oats. Turmeric is soft and earthy, while ginger gives it a little zing and warmth. Together they create something unique: satisfying, aromatic and golden.","expiration_date"=>"2018-10-11 00:00:00","dimension"=>1,"weight"=>290,"real_weight"=>300,"stock"=>1400,"vegetarian"=>1,"organic"=>0,"vegan"=>0]);
        Product::create(["name"=>"Ginger & Turmeric Oaty","price"=>"2.49","description"=>"Turmeric and ginger may not grow near Inverness, but they go surprisingly well with oats. Turmeric is soft and earthy, while ginger gives it a little zing and warmth. Together they create something unique: satisfying, aromatic and golden.","expiration_date"=>"2018-10-11 00:00:00","dimension"=>1,"weight"=>290,"real_weight"=>300,"stock"=>1400,"vegetarian"=>1,"organic"=>0,"vegan"=>0]);
        Product::create(["name"=>"The Beetroot","price"=>"1.49","description"=>"The Beetroot. Rude Health’s snack bars are an allotment full of fruit & veg in a fudgy bar with seeds & nuts thrown in for good measure. And if that isn’t enough they are wheat-free, gluten free and made  with no refined sugar.","expiration_date"=>"2018-10-11 00:00:00","dimension"=>1,"weight"=>90,"real_weight"=>92,"stock"=>2900,"vegetarian"=>1,"organic"=>1,"vegan"=>0]);
        Product::create(["name"=>"Sprouted Porridge Oats","price"=>"5.49","description"=>"These Sprouted Porridge Oats are as pure as can be. Normally oats are steamed before being turned into flakes, but our sprouted oats are simply rolled – that’s it. Sprouting the oats makes it comes to life and releases its vital nutrients, making it easier to digest. This also means that the flavour is more oaty and complex, the texture is creamy but with a delicious bite.","expiration_date"=>"2018-10-11 00:00:00","dimension"=>1,"weight"=>145,"real_weight"=>155,"stock"=>2578,"vegetarian"=>0,"organic"=>1,"vegan"=>0]);
        Product::create(["name"=>"Water","price"=>"4.49","description"=>"Fresh pure water from the Rock Mountain","expiration_date"=>"2018-10-31","dimension"=>1,"weight"=>1500,"real_weight"=>1505,"stock"=>2900,"vegetarian"=>1,"organic"=>1,"vegan"=>1]);

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

        //users with plan Juny
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
                'subscribed_at' => $faker->dateTimeBetween('2017-06-01', 'now'),
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


        //users with plan MAY
        foreach (range(1, 320) as $index) {
            $user = User::create([
                'dni' => $faker->dni,
                'name' => $faker->name,
                'first_surname' => $faker->firstName,
                'second_surname' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('secret'),
                'phone_number' => $faker->phoneNumber,
                'plan_id' => $faker->numberBetween(1, 3),
                'subscribed_at' => $faker->dateTimeBetween('2017-05-01', '2017-05-31'),
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

            $box=new Box;
            $box->save();
            $box->created_at="2017-06-01";
            $box->products()->attach([$faker->numberBetween(1, 16),$faker->numberBetween(1, 16),$faker->numberBetween(1, 16),$faker->numberBetween(1, 16),$faker->numberBetween(1, 16)]);
            $box->save();
            $delivery=new Delivery;
            $delivery->save();
            $delivery->created_at="2017-06-01";
            $delivery->user()->associate($user);
            $delivery->transporter()->associate(Transporter::find($faker->numberBetween(1, 3)));
            $delivery->box()->associate($box);
            $delivery->save();
        }

        //users with plan April
        foreach (range(1, 290) as $index) {
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

            $box=new Box;
            $box->save();
            $box->created_at="2017-05-01";
            $box->products()->attach([$faker->numberBetween(1, 16),$faker->numberBetween(1, 16),$faker->numberBetween(1, 16),$faker->numberBetween(1, 16),$faker->numberBetween(1, 16)]);
            $box->save();
            $delivery=new Delivery;
            $delivery->save();
            $delivery->user()->associate($user);
            $delivery->created_at="2017-05-01";
            $delivery->transporter()->associate(Transporter::find($faker->numberBetween(1, 3)));
            $delivery->box()->associate($box);
            $delivery->save();
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

            $box=new Box;
            $box->save();
            $box->created_at="2017-04-01";
            $box->products()->attach([$faker->numberBetween(1, 16),$faker->numberBetween(1, 16),$faker->numberBetween(1, 16),$faker->numberBetween(1, 16),$faker->numberBetween(1, 16)]);
            $box->save();
            $delivery=new Delivery;
            $delivery->save();
            $delivery->user()->associate($user);
            $delivery->created_at="2017-04-01";
            $delivery->transporter()->associate(Transporter::find($faker->numberBetween(1, 3)));
            $delivery->box()->associate($box);
            $delivery->save();
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

            $box=new Box;
            $box->save();
            $box->created_at="2017-03-01";
            $box->products()->attach([$faker->numberBetween(1, 16),$faker->numberBetween(1, 16),$faker->numberBetween(1, 16),$faker->numberBetween(1, 16),$faker->numberBetween(1, 16)]);
            $box->save();
            $delivery=new Delivery;
            $delivery->save();
            $delivery->user()->associate($user);
            $delivery->created_at="2017-03-01";
            $delivery->transporter()->associate(Transporter::find($faker->numberBetween(1, 3)));
            $delivery->box()->associate($box);
            $delivery->save();
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

            $box=new Box;
            $box->save();
            $box->created_at="2017-02-01";
            $box->products()->attach([$faker->numberBetween(1, 16),$faker->numberBetween(1, 16),$faker->numberBetween(1, 16),$faker->numberBetween(1, 16),$faker->numberBetween(1, 16)]);
            $box->save();
            $delivery=new Delivery;
            $delivery->save();
            $delivery->user()->associate($user);
            $delivery->created_at="2017-02-01";
            $delivery->transporter()->associate(Transporter::find($faker->numberBetween(1, 3)));
            $delivery->box()->associate($box);
            $delivery->save();
        }

/********************************************************************END USER CREATING*/
    }
}
