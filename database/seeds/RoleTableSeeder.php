<?php

use Illuminate\Database\Seeder;
use App\Role;


class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new Role();
        $role_user->name = 'User';
        $role_user->description = 'A normal User';
        $role_user->save();

        $role_user = new Role();
        $role_user->name = 'Buyer';
        $role_user->description = 'A Buyer';
        $role_user->save();

        $role_user = new Role();
        $role_user->name = 'Seller';
        $role_user->description = 'A Seller';
        $role_user->save();
    }
}
