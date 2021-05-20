<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drugs', function (Blueprint $table) {
            $table->id();
            $table->string("companyID");
            $table->string("drugName");
            $table->string("logo");
            // $table->string("verification_code")->unique();
            $table->string("nafdac")->unique();
            $table->string("status")->default(0);
            $table->string("expiring_date");
            $table->string("manufacturing_date");
            $table->timestamps();

            $table->foreign("companyID")->references("email")->on("companies")->onDelete("restrict");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drugs');
    }
}