<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('home_team_id')->index();
            $table->unsignedBigInteger('away_team_id')->index();
            $table->unsignedBigInteger('home_team_coach_id')->index();
            $table->unsignedBigInteger('away_team_coach_id')->index();
            $table->unsignedTinyInteger('stadium_id')->index();
            $table->unsignedTinyInteger('home_team_score');
            $table->unsignedTinyInteger('away_team_score');
            $table->date('date');
            $table->timestamps();

            $table->foreign('home_team_id')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade');

            $table->foreign('away_team_id')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade');

            $table->foreign('stadium_id')
                ->references('id')
                ->on('stadiums')
                ->onDelete('cascade');

            $table->foreign('home_team_coach_id')
                ->references('id')
                ->on('coaches')
                ->onDelete('cascade');

            $table->foreign('away_team_coach_id')
                ->references('id')
                ->on('coaches')
                ->onDelete('cascade');

            $table->unique(['date', 'stadium_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
