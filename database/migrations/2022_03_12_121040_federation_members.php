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
        Schema::create('federation_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('federation_id');
            $table->foreignId('service_provider_id');
            //$table->timestamp('valid_from')->nullable();
           // $table->timestamp('valid_to')->nullable();
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
        Schema::dropIfExists('federation_members');
    }
};
