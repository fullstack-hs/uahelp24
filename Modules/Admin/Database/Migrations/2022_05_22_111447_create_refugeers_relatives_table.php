<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefugeersRelativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refugeers_relatives', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("userId");
            $table->bigInteger("relativeTo");
            $table->boolean("lastNameCoincidence")->default(false);
            $table->boolean("lastNameAndCityCoincidence")->default(false);
            $table->boolean("familyAndCityCoincidence")->default(false);
            $table->boolean("lastNameAndFamilyCoincidence")->default(false);
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
        Schema::dropIfExists('refugeers_relatives');
    }
}
