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
        Schema::table('notifications', function (Blueprint $table) {
            /**
             * @var \Callmeaf\User\App\Repo\Contracts\UserRepoInterface $userRepo
             */
            $userRepo = app(\Callmeaf\User\App\Repo\Contracts\UserRepoInterface::class);
            $table->foreignIdFor($userRepo->getModel()::class,'sender_id')->nullable()->after('id')->constrained($userRepo->getTable())->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notifications', function(Blueprint $table) {
            if(Schema::hasColumn('notifications','sender_id')) {
                $table->dropForeign('notifications_sender_id_foreign');
                $table->dropColumn('sender_id');
            }
        });
    }
};
