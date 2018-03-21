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

        $user = new User();
        $user->name = 'User';
        $user->email = 'user@mail.com';
        $user->password = bcrypt('user_user');
        $user->save();
        $user->roles()->attach($role_user);

        $buyer = new User();
        $buyer->name = 'Buyer';
        $buyer->email = 'buyer@mail.com';
        $buyer->password = bcrypt('buyer_buyer');
        $buyer->save();
        $buyer->roles()->attach($role_buyer);

        $seller = new User();
        $seller->name = 'Seller';
        $seller->email = 'seller@mail.com';
        $seller->password = bcrypt('seller_seller');
        $seller->save();
        $seller->roles()->attach($role_seller);
    }
}
