<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        //
        $user_object = new UserModel();

		$user_object->insertBatch([
			[
				"name" => "admin",
				"email" => "admin@gmail.com",
				"phone_no" => "7899654125",
				"role" => "admin",
				"password" => password_hash("12345678", PASSWORD_DEFAULT)
			],
			[
				"name" => "krishna",
				"email" => "krishna@gmail.com",
				"phone_no" => "8888888888",
				"role" => "client",
				"password" => password_hash("12345678", PASSWORD_DEFAULT)
			]
		]);

    }
}
