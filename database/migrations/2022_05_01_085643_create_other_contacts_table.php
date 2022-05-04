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
        Schema::create('other_contacts', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->string('resourceName');
            $table->string('etag')->nullable();
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
        Schema::dropIfExists('other_contacts');
    }
};
