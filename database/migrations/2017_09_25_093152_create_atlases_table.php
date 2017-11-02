<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtlasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atlases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->index()->comment('分类id');
            $table->string('description')->nullable()->comment('描述');
            $table->string('image')->index()->comment('图片');
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
        Schema::dropIfExists('atlases');
    }
}
