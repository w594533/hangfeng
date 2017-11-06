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
            $table->string('hr_email')->nullable()->comment('招聘邮箱');
            $table->text('about_body')->nullable()->comment('航丰概况内容');
            $table->text('about_show_business_images')->nullable()->comment('业务展示图片');
            $table->text('about_honor_images')->nullable()->comment('荣誉');
            $table->string('about_vision_title')->nullable()->comment('愿景标题');
            $table->text('about_vision_body')->nullable()->comment('愿景内容');
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
