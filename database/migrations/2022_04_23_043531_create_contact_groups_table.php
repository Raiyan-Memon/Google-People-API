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
        Schema::create('contact_groups', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->string('resourceName');
            $table->string('etag')->nullable();
            $table->string('groupType');
            $table->string('name');
            $table->string('formattedName');
            $table->string('memberCount')->nullable();
            $table->string('user_id')->foreign()->references('id')->nullable();
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
        Schema::dropIfExists('contact_groups');
    }
};
