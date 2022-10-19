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
            CREATE TRIGGER tr_mdr_log_merchant
            AFTER INSERT ON `merchants` FOR EACH ROW
            BEGIN
                INSERT INTO mdr_logs (`merchant_id`, `value_mdr`, `created_at`)
                VALUES (NEW.id, NEW.mdr, now());
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
       DB::unprepared('DROP TRIGGER `tr_mdr_log_merchant`');
    }
};
