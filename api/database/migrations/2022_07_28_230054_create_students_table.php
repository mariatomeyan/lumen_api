<?php

use App\Models\Grade;
use App\Models\User;
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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'UserId');
            $table->foreignIdFor(Grade::class)->nullable();
            $table->string('Country');
            $table->string('IdentificationNo');
            $table->dateTime('DateOfBirth');
            $table->dateTime('RegisteredOn');
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
        Schema::dropIfExists('students');
    }
};
