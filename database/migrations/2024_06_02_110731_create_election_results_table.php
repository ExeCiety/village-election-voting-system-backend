<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('election_results', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(DB::raw('uuid_generate_v4()'));
            $table->uuid('election_session_id');
            $table->uuid('candidate_pair_id');
            $table->unsignedBigInteger('total_vote');
            $table->timestamps();

            $table->foreign('election_session_id')
                ->references('id')
                ->on('election_sessions')
                ->onDelete('cascade');
            $table->foreign('candidate_pair_id')
                ->references('id')
                ->on('candidate_pairs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('election_results');
    }
};
