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
        Schema::create('service_providers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organisation_id');
            $table->string('entity_id');
            $table->text('description')->nullable();
            $table->enum('type',['SP','IDP','BOTH']);
            $table->json('name_ids')->nullable();
            $table->boolean('wants_assertions_signed')->nullable();
            $table->boolean('want_authn_requests_signed')->nullable();
            //$table->boolean('authnreq_signed')->nullable();
            $table->timestamp('valid_from')->nullable();
            $table->timestamp('valid_to')->nullable();
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
        Schema::dropIfExists('service_providers');
    }
};
