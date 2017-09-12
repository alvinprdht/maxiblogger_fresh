<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('post'))  
        {

        }
        else
        {
            Schema::create('post', function (Blueprint $table) {
                $table->increments('id')->length(3);
                $table->string('title',255);
                $table->text('content');
                $table->tinyInteger('status')->length(1)->unsigned();
                $table->string('featured_images',255);
                $table->tinyInteger('created_by')->length(3)->unsigned();
                $table->tinyInteger('published_by')->length(3)->unsigned();
                $table->string('tags',255)->nullable();
                $table->tinyInteger('category_id')->unsigned();
                $table->tinyInteger('is_hide')->length(1)->unsigned();
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
        
    }
}
