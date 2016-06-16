<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budget_points', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('account_id')->nullable();
            $table->string('name');
            $table->text('description');
            $table->integer('parent_id')->nullable();
            $table->decimal('amount',10,2)->nullable();
            $table->float('percentage')->nullable();
            $table->enum('type',['income','expense','savings']);
            $table->text('implementation_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('budget_points');
    }
}
