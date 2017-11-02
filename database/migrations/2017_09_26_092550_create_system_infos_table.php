<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address')->index()->comment('地址');
            $table->string('phone')->index()->coment('总机');
            $table->string('facsimile')->index()->comment('传真');
            $table->string('email')->index()->comment('邮箱');
            $table->string('image')->index()->comment('地图');
            $table->string('contract_person', 20)->index()->comment('联系人');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_infos');
    }
}
