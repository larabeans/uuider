<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateNotifiableMorphToUuidMorph extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        if(Config::get('beaner.uuider')){

            Schema::table('notifications', function (Blueprint $table) {
                $table->dropMorphs('notifiable');
            });

            Schema::table('notifications', function (Blueprint $table) {
                // Not using morph, as this doesn't supports after modifier
                // $table->uuidMorphs('notifiable');

                // Manual implementation of morph
                $table->string("notifiable_type")->after('id');
                $table->uuid("notifiable_id")->after('id');
                $table->index(["notifiable_id", "notifiable_type"]);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {

    }
}
