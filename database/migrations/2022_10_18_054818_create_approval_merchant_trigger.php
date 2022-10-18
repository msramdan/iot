<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER tr_approval_merchant
            AFTER INSERT ON `merchants` FOR EACH ROW
            BEGIN
                INSERT INTO approval_log_merchants (`merchant_id`, `user_id`, `status`, `step`, `ref`, `created_at`, `updated_at`)
                VALUES (NEW.id, null, 'need_approved', 'approved1', '1', now(), null);
                INSERT INTO approval_log_merchants (`merchant_id`, `user_id`, `status`, `step`, `ref`, `created_at`, `updated_at`)
                VALUES (NEW.id, null, 'need_approved', 'approved2', '1', now(), null);
            END
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_approval_merchant`');
    }
};
