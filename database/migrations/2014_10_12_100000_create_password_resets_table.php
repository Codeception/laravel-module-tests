<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder as Schema;

final class CreatePasswordResetsTable extends Migration
{
    public function up(): void
    {
        $schema = app()->get(Schema::class);
        $schema->create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    public function down(): void
    {
        $schema = app()->get(Schema::class);
        $schema->dropIfExists('password_resets');
    }
}
