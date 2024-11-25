<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSubmissionsVerificationView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW submissions_need_review AS
            SELECT
                u.name AS submitter_name,
                o.organization_name,
                p.nip_reviewer,
                p.submission_code,
                p.submission_title,
                p.status,
                p.created_at
            FROM 
                submissions p
            JOIN
                submitters s ON p.submitter_id = s.submitter_id
            JOIN
                users u ON s.user_id = u.user_id
            JOIN 
                organizations o ON s.organization_code = o.organization_code
            WHERE
                status = 'belum_direview';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS submissions_need_review");
    }
}
