<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'User')->first();
        $role_buyer = Role::where('name', 'Buyer')->first();
        $role_seller = Role::where('name', 'Seller')->first();

        $toshe = new User();
        $toshe->name = 'todor';
        $toshe->email = 'tosheee@abv.bg';
        $toshe->password = bcrypt('kawasaki');
        $toshe->verifyToken = str_random(40);
        $toshe->provider = '';
        $toshe->provider_id = '';
        $toshe->save();
        $toshe->roles()->attach($role_seller);

        $user = new User();
        $user->name = 'User';
        $user->email = 'user@mail.com';
        $user->password = bcrypt('user_user');
        $user->verifyToken = str_random(40);
        $user->provider = '';
        $user->provider_id = '';
        $user->save();
        $user->roles()->attach($role_user);

        $buyer = new User();
        $buyer->name = 'Buyer';
        $buyer->email = 'buyer@mail.com';
        $buyer->password = bcrypt('buyer_buyer');
        $buyer->verifyToken = str_random(40);
        $buyer->provider = '';
        $buyer->provider_id = '';
        $buyer->save();
        $buyer->roles()->attach($role_buyer);

        $seller = new User();
        $seller->name = 'Seller';
        $seller->email = 'seller@mail.com';
        $seller->password = bcrypt('seller_seller');
        $seller->verifyToken = str_random(40);
        $seller->provider = '';
        $seller->provider_id = '';
        $seller->save();
        $seller->roles()->attach($role_seller);
    }
}
