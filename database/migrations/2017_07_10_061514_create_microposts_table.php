<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMicropostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
        {
            Schema::create('microposts', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned()->index();
                $table->string('content');
                $table->timestamps();
    
                // 外部キー制約
                $table->foreign('user_id')->references('id')->on('users');
            });
        }
    
        public function down()
        {
            Schema::drop('microposts');
        }
        
        public function like_micropost()
        {
            return $this->belongsToMany(User::class, 'user_micropost', 'micropost_id', 'user_id')->withTimestamps();
        }
        
}
