<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('settings')) {
            DB::table('settings')
                ->whereIn('key', ['contact_phone', 'contact_whatsapp'])
                ->where('value', '082280041658')
                ->update(['value' => '082382336505']);

            // Ensure contact_whatsapp has 082382336505 if not yet set or old
            DB::table('settings')
                ->where('key', 'contact_whatsapp')
                ->where(function ($q) {
                    $q->where('value', '082280041658')->orWhere('value', '');
                })
                ->update(['value' => '082382336505']);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
