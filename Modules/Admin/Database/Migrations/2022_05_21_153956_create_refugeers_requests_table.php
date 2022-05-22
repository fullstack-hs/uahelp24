<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefugeersRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refugeers_requests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("refugeerId");
            $table->bigInteger("givingPointId")->nullable();
            $table->text("refugeerRequirements")->nullable();
            $table->string("issueDate")->nullable();
            $table->tinyInteger("status")->default(0);
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
        Schema::dropIfExists('refugeers_requests');
    }
}
