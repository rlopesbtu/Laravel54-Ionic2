<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserAdminData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \CodeFlix\Models\User::create([
           'name' => env('ADMIN_DEFAULT_NAME','Administrator'),
           'email' => env('ADMIN_DEFAULT_EMAIL','admin@user.com'),
           'password'=>bcrypt(env('ADMIN_DEFAULT_PASSWORD','admin@user.com','secret')),
           'role' => \CodeFlix\Models\User::ROLE_ADMIN
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $user = \CodeFlix\Models\User::where('email','=',env('ADMIN_DEFAULT_EMAIL','admin@user.com'))->first();
        if($user instanceof \CodeFlix\Models\User) {
            $user->delete();
        }
    }
}
