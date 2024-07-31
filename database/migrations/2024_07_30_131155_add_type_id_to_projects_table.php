<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('type_id')->after('id')->nullable();

            // Vincolo di chiave esterna sulla mia colonna X che fa riferimento alla colonna Y della colonna Z (???? non ho capito Rick )
            // Se il nome non è irregolare ha le stesse funzionalità della versione estesa
            // > $table->foreignId('type_id')->constrained();
            $table->foreign('type_id')->references('id')->on('types')->cascadeOnUpdate()->nullOnDelete(); // ! Vincolo di foreign key creato
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign('projects_type_id_foreign'); // ! Vincolo di foreign key droppato
            $table->dropColumn('type_id'); // ? drop della colonna
        });
    }
};
