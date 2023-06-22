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
        Schema::create('employees_tb', function (Blueprint $table) {
            $table->id();
            $table->uuid("emp_code");
            $table->string( "emp_name" , 50 );
            $table->string( "emp_address" , 100 );
            $table->string( "emp_phone" , 11 );
            $table->string( "emp_birth_of_date" , 100 );
            $table->decimal( "emp_salary" , 6,2 )->nullable();
            $table->decimal( "emp_tax" , 3 , 2 )->nullable();
            $table->unsignedBigInteger("role_id");
            $table->foreign("role_id")->references("role_id")->on("roles_tb");
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
        Schema::dropIfExists('employees_tb');
    }
};
