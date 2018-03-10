<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id');
            $table->boolean('active_company');
            $table->string('brand_name')->unique();
            $table->text('brand_description');
            $table->string('brand_logo');
            $table->string('brand_banner');
            $table->string('company_name')->unique();
            $table->string('company_vat')->unique();
            $table->string('company_phone')->unique();
            $table->integer('country_id');
            $table->integer('city_id');
            $table->text('company_address');
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
        Schema::dropIfExists('sellers');
    }
}
