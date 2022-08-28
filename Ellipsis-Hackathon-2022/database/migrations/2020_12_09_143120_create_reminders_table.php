<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reminders', function (Blueprint $table) {
            $table->id();
            $table->text('detail');
            $table->unsignedBigInteger('application_id');
            $table->string('created_by');
            $table->dateTime('dateTime');
            $table->string('updated_by');
            $table->timestamps();

            $table->foreign('application_id')
            ->references('id')
            ->on('applications')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reminders');
    }
}
