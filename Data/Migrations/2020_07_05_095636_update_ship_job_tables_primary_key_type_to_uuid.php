<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateShipJobTablesPrimaryKeyTypeToUuid extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        if (Config::get('queue.default') == 'database') {

            // First drop `id` column, so they can be re-added with new type.
            Schema::table('jobs', function (Blueprint $table) {
                $table->dropColumn('id');
            });

            // Now Add `id` columns and update foreign keys
            Schema::table('jobs', function (Blueprint $table) {
                $table->uuid('id')->primary()->first();
            });
        }

        // First drop `id` column, so they can be re-added with new type.
        Schema::table('failed_jobs', function (Blueprint $table) {
            $table->dropColumn('id');
        });

        // Now Add `id` columns and update foreign keys
        Schema::table('failed_jobs', function (Blueprint $table) {
            $table->uuid('id')->primary()->first();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {

    }
}
