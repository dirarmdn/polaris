<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("
        CREATE OR REPLACE FUNCTION notify_submission_status_change()
        RETURNS TRIGGER AS $$
        DECLARE
            v_user_id UUID;  -- Declare a variable to store the user_id (prefix it with 'v_' to avoid ambiguity)
        BEGIN
            IF NEW.status IS DISTINCT FROM OLD.status AND NEW.submitter_id IS NOT NULL THEN
                -- Mendapatkan user_id berdasarkan submitter_id
                SELECT user_id
                INTO v_user_id
                FROM submitters
                WHERE submitter_id = NEW.submitter_id
                LIMIT 1;
                
                IF v_user_id IS NOT NULL THEN
                    -- Menyisipkan data notifikasi
                    INSERT INTO notifications (
                        id,
                        user_id,  -- Use the user_id from the notifications table
                        \"isRead\",
                        message,
                        notifiable_id,
                        notifiable_type,
                        created_at,
                        updated_at
                    )
                    VALUES (
                        gen_random_uuid(), 
                        v_user_id,  
                        false,
                        CONCAT('Status pengajuan Anda berubah menjadi: ', NEW.status),
                        CONCAT('SUB-', NEW.submission_code), 
                        'Submission',
                        NOW(),
                        NOW()
                    );
                END IF;
            END IF;
            RETURN NEW;
        END;
        $$ LANGUAGE plpgsql;
    
        CREATE TRIGGER after_submission_update
        AFTER UPDATE ON submissions
        FOR EACH ROW
        EXECUTE FUNCTION notify_submission_status_change();
    ");
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("
            DROP TRIGGER IF EXISTS after_submission_update ON submissions;
            DROP FUNCTION IF EXISTS notify_submission_status_change();
        ");
    }
};
