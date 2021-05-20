<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complain', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("drugID");
            $table->text("reason");
            $table->string("sideEffect");
            // $table->string("effective");
            $table->string("alergies");
            $table->string("addictive");
            $table->string("addressOfSale");
            $table->string("status")->default(0);
            $table->timestamps();

            $table->foreign("drugID")->references("id")->on("drugs")->onDelete("restrict");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complain');
    }
}
