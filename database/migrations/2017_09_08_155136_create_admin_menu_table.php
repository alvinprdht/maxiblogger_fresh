<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('admin_menu'))  
        {
            
        }
        else
        {
            Schema::create('admin_menu', function (Blueprint $table) {
                $table->increments('id')->length(3);
                $table->tinyInteger('role_id')->length(3)->unsigned();
                $table->string('name',255);
                $table->tinyInteger('level')->length(1)->unsigned();
                $table->tinyInteger('parent')->length(1)->unsigned();
                $table->tinyInteger('status')->length(1)->unsigned();
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
        //
    }
}
