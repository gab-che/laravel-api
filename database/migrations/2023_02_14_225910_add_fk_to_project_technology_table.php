<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_technology', function (Blueprint $table) {
            $table->unsignedBigInteger('technology_id')->after('project_id');
            $table->foreign('technology_id')
                ->references('id')
                ->on('technologies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_technology', function (Blueprint $table) {
            $table->dropForeign(['technology_id']);
            $table->dropColumn('technology_id');
        });
    }
};
