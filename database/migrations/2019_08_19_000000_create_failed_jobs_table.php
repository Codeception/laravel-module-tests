<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder as Schema;

final class CreateFailedJobsTable extends Migration
{
    public function up(): void
    {
        $schema = app()->get(Schema::class);
        $schema->create('failed_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    public function down(): void
    {
        $schema = app()->get(Schema::class);
        $schema->dropIfExists('failed_jobs');
    }
}
