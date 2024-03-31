<?php

use App\Models\AcademyClass;
use App\Models\Section;
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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(AcademyClass::class);
            $table->foreignIdFor(Section::class);
            $table->string('student_image')->nullable();
            $table->string('student_id')->unique();
            $table->string('roll');
            $table->string('student_name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->text('address');
            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->date('dob');
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
