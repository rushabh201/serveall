<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('brand_id');
            $table->string('model_id');
            $table->string('vehicle_registration_number');
            $table->date('purchase_date');
            $table->date('manufacturing_date');
            $table->string('engine_number');
            $table->string('chasis_number');
            $table->integer('insurance_id');
            $table->string('insurer_gstin');
            $table->string('insurer_address');
            $table->string('policy_number');
            $table->date('insurance_expiry_date');
            $table->string('registration_certificate_img');
            $table->string('insurance_img');
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
        Schema::dropIfExists('vehicles');
    }
}
