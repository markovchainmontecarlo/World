<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locales', function (Blueprint $table) {
            $table->smallIncrements('id')->unsigned();
            $table->string('key')->unique();
            $table->string('name');

            $table->enum('status', [ 'online', 'offline' ])->default('offline');

            $table->timestamps();
        });

        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id')->unsigned();

            $table->string('name');
            $table->string('short_code')->unique();
            $table->string('phone_code');

            $table->enum('status', [ 'online', 'offline' ])->default('offline');

            $table->string('longitude')->nullable()->default(null);
            $table->string('latitude')->nullable()->default(null);
            $table->unsignedSmallInteger('zoom')->nullable()->default(null);

            $table->timestamps();
        });

        Schema::create('states', function (Blueprint $table) {
            $table->increments('id')->unsigned();

            $table->string('name')->index();

            $table->unsignedInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');

            $table->string('longitude')->nullable()->default(null);
            $table->string('latitude')->nullable()->default(null);
            $table->unsignedSmallInteger('zoom')->nullable()->default(null);

            $table->timestamps();
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id')->unsigned();

            $table->string('name')->index();

            $table->unsignedInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade')->onUpdate('cascade');

            $table->string('longitude')->nullable()->default(null);
            $table->string('latitude')->nullable()->default(null);
            $table->unsignedSmallInteger('zoom')->nullable()->default(null);

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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('locales');
        Schema::dropIfExists('countries');
        Schema::dropIfExists('states');
        Schema::dropIfExists('cities');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}