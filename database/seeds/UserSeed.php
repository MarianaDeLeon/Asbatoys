<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '$2y$10$0ZwSI6MXzv1lPL0EBLoMk.vPRSgmHN8H2ZOnk8wE1qNA8DTKtxYBW', 'remember_token' => '',],
            ['id' => 2, 'name' => 'Mariana de leon gonzalez', 'email' => 'al221410144@gmail.com', 'password' => '$2y$10$k13e0yCOXy/f71E0JGH4X.Tw6HS8l1LHpz.K8fwVT8U.xt2wLkwOm', 'remember_token' => null,],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
