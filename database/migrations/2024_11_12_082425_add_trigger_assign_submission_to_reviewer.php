<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddTriggerAssignSubmissionToReviewer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE OR REPLACE FUNCTION assign_submission_to_reviewer()
            RETURNS TRIGGER AS $$
            DECLARE
                selected_reviewer_id VARCHAR;
            BEGIN
                SELECT nip_reviewer
                INTO selected_reviewer_id
                FROM Reviewers
                WHERE review_total = (
                    SELECT MIN(review_total) FROM Reviewers
                ) AND "isActive" = TRUE
                ORDER BY RANDOM()
                LIMIT 1;

                UPDATE Submissions
                SET nip_reviewer = selected_reviewer_id
                WHERE submission_code = NEW.submission_code;

                UPDATE Reviewers
                SET review_total = review_total + 1
                WHERE nip_reviewer = selected_reviewer_id;

                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER distribute_submission
            BEFORE INSERT ON Submissions
            FOR EACH ROW
            EXECUTE FUNCTION assign_submission_to_reviewer();
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('
            DROP TRIGGER IF EXISTS distribute_submission ON Submissions;
            DROP FUNCTION IF EXISTS assign_submission_to_reviewer;
        ');
    }
}
