<?php

use App\Models\CModel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->integer('mileage')->nullable();
            $table->smallInteger('year')->nullable();
            $table->string('color')->nullable();
            $table->foreignIdFor(CModel::class)->constrained('c_models');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
