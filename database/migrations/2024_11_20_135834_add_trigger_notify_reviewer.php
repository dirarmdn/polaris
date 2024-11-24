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
        DB::unprepared("
            CREATE OR REPLACE FUNCTION notify_reviewer()
            RETURNS TRIGGER AS $$
            BEGIN
                -- Pastikan kolom `nip_reviewer` tidak NULL
                IF NEW.nip_reviewer IS NOT NULL THEN
                    -- Tambahkan notifikasi ke tabel notifications
                    INSERT INTO notifications (
                        notification_id,
                        user_id,
                        \"isRead\",
                        message,
                        notifiable_id,
                        notifiable_type,
                        created_at,
                        updated_at
                    )
                    VALUES (
                        gen_random_uuid(), -- UUID generator untuk PostgreSQL
                        (SELECT user_id FROM reviewers WHERE nip_reviewer = NEW.nip_reviewer),
                        FALSE,
                        CONCAT('A new submission has been assigned to you: ', NEW.submission_title),
                        NEW.submission_code,
                        'Submission',
                        NOW(),
                        NOW()
                    );
                END IF;

                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_submission_with_reviewer
            AFTER INSERT ON submissions
            FOR EACH ROW
            EXECUTE FUNCTION notify_reviewer();
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("
            DROP TRIGGER IF EXISTS after_submission_with_reviewer ON submissions;
            DROP FUNCTION IF EXISTS notify_reviewer();
        ");
    }
};
