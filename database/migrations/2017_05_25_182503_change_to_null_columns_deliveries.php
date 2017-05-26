<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeToNullColumnsDeliveries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE deliveries MODIFY `user_id` INTEGER  unsigned  NULL;');
        DB::statement('ALTER TABLE deliveries MODIFY `box_id` INTEGER   unsigned  NULL;');
        DB::statement('ALTER TABLE deliveries MODIFY `transporter_id` INTEGER  unsigned  NULL;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE deliveries MODIFY `user_id` INTEGER  unsigned NOT NULL;');
        DB::statement('ALTER TABLE deliveries MODIFY `box_id` INTEGER   unsigned NOT NULL;');
        DB::statement('ALTER TABLE deliveries MODIFY `transporter_id` INTEGER  unsigned NOT NULL;');
    }
}
