<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('mobile')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'InnoDB';
        });

        // password is 123456

        $data = [
          'name' => 'Hardik Solanki',
          'email' => 'hardik@hardiksolanki.com',
          'password' => '$2y$10$OCa1BzO27PaJhh2ywN0cBu5veGwSjtO4G6wtlnjQp7CC5VPKHb1qe'
        ];
        \Illuminate\Support\Facades\DB::table('admin_users')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_users');
    }
}