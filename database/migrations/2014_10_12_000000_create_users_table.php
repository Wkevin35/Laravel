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
    // public function up()
    // {
    //     Schema::create('users', function (Blueprint $table) {
    //         $table->increments('id');
    //         $table->string('name');
    //         $table->string('email')->unique();
    //         $table->timestamp('email_verified_at')->nullable();
    //         $table->string('password');
    //         $table->rememberToken();
    //         $table->timestamps();
    //     });
    // }

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //會員編號
            $table->increments('id');
            //Email
            $table->string('email',150);
            //密碼
            $table->string('password',60);
            //帳號類型
            //- A(Admin):管理者
            //- G(General):一般會員
            $table->string('type',1)->defaault('G'); //帳號狀態
            //暱稱
            $table->string('nickname',50);
            //時間戳記
            $table->timestamps();

            //鍵值索引
            $table->unique(['email'],'user_email_uk');
            // $table->unique(['id', 'transaction_id'],'user_transactions');
        });
    
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
