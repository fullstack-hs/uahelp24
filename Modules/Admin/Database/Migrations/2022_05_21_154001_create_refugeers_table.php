<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefugeersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refugeers', function (Blueprint $table) {
            $table->id();
            $table->string("phoneNumber");
            $table->string("firstName");
            $table->string("lastName");
            $table->string("secondName");
            $table->string("email")->nullable();
            $table->string("region");
            $table->string("district");
            $table->string("city");
            $table->string("temporaryAddress");
            $table->integer("adults")->default(0);
            $table->integer("childs")->default(0);
            $table->integer("disabledPersons")->default(0);
            $table->integer("pregnantPersons")->default(0);
            $table->string("specialMarks")->nullable();
            $table->boolean("highlighted")->default(false);
            $table->string("socialNetworks")->nullable();
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
        Schema::dropIfExists('refugeers');
    }
}
