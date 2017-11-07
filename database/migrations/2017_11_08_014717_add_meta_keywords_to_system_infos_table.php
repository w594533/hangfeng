<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMetaKeywordsToSystemInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('system_infos', function (Blueprint $table) {
            $table->string('meta_keywords')->default('')->nullable()->comment('关键词');
            $table->string('meta_description')->default('')->nullable()->comment('描述');
            $table->string('meta_title')->default('')->nullable()->comment('标题');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('system_infos', function (Blueprint $table) {
            $table->dropColumn(['meta_keywords', 'meta_description', 'meta_title']);
        });
    }
}
