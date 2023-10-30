<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistertableTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('registertable', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->string('email')->unique(); // Unique email address
            $table->string('username')->unique(); // Unique username
            $table->string('password'); // Password hash
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('registertable');
    }
}

