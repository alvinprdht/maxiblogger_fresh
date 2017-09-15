<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('users'))  
        {
            if(!Schema::hasColumn('users','status') && !Schema::hasColumn('users','role'))
            {
                Schema::table('users', function (Blueprint $table) {
                    $table->tinyInteger('status')->length(1)->unsigned()->after('password')->default(1);
                    $table->tinyInteger('role')->length(1)->unsigned()->after('status')->default(1);
                });
            }
            else
            {
                $table->tinyInteger('name')->default('');
            }
        }
        else
        {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('email');
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('users');
    }
}
