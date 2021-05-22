<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateAuthorizationContainerTablesPrimaryKeyTypeToUuid extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        $tableNames = config('permission.table_names');
        $foreignKeys = config('permission.foreign_keys');

        // First drop `id` reference, used as foreign key
        Schema::table($tableNames['model_has_permissions'], function (Blueprint $table) {
            $table->dropForeign('model_has_permissions_permission_id_foreign');
        });

        Schema::table($tableNames['role_has_permissions'], function (Blueprint $table) {
            $table->dropForeign('role_has_permissions_permission_id_foreign');
        });

        Schema::table($tableNames['model_has_roles'], function (Blueprint $table) {
            $table->dropForeign('model_has_roles_role_id_foreign');
        });

        Schema::table($tableNames['role_has_permissions'], function (Blueprint $table) {
            $table->dropForeign('role_has_permissions_role_id_foreign');
        });


        // Now drop `id` column, so they can be re-added with new type.
        Schema::table($tableNames['permissions'], function (Blueprint $table) {
            $table->dropColumn('id');
        });

        Schema::table($tableNames['roles'], function (Blueprint $table) {
            $table->dropColumn('id');
        });


        // Now Add `id` columns and update foreign keys
        Schema::table($tableNames['permissions'], function (Blueprint $table) {
            $table->uuid('id')->primary()->first();
        });

        Schema::table($tableNames['roles'], function (Blueprint $table) {
            $table->uuid('id')->primary()->first();
        });

        Schema::table($tableNames['model_has_permissions'], function (Blueprint $table) {
            $table->uuid('permission_id')->change();
            $table->uuid('model_id')->change();
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
        });

        Schema::table($tableNames['model_has_roles'], function (Blueprint $table) {
            $table->uuid('role_id')->change();
            $table->uuid('model_id')->change();

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });

        Schema::table($tableNames['role_has_permissions'], function (Blueprint $table) {
            $table->uuid('permission_id')->change();
            $table->uuid('role_id')->change();

            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {

    }
}
