<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i = 0; $i < 100; $i++)
        {
        	$stmp["name"] = str_random(6);
        	$stmp["password"] = str_random(10);
        	$stmp["email"] = str_random(20)."@qq.com";
        	$stmp["phone"] = str_random(11);
        	$stmp["created_at"] = time();
        	$stmp["updated_at"] = time();
        	$data[] = $stmp;

        }
        DB::table("users") -> insert($data);
    }
}
