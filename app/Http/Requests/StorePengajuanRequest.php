<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePengajuanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_pengaju' => 'required|exists:pengajus,id_pengaju',
            'kode_pengajuan' => 'required|string',
            'isVerified' => 'required|boolean',
            'nama_pengaju' => 'required|string|max:255',
            'email_pengaju' => 'required|email|max:255',
            'no_telp' => 'required|string|max:20',
            'jabatan' => 'required|string|max:255',
            'kode_organisasi' => 'required|string|max:255',
            'judul_pengajuan' => 'required|string|max:255',
            'deskripsi_masalah' => 'required|string',
            'tujuan_aplikasi' => 'required|string',
            'proses_bisnis' => 'required|string',
            'aturan_bisnis' => 'required|string',
            'stakeholder' => 'required|string',
            'platform' => 'required|in:Web,Mobile,Desktop,Multi-platform',
            'jenis_proyek' => 'required|in:Proyek yang sudah ada,Proyek Baru',
        ];
    }
}
