<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePengajuanRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
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
            'platform' => 'required|in:web,mobile,desktop,multiplatform',
            'jenis_proyek' => 'required|in:Aplikasi Baru,Aplikasi Sudah Ada',
        ];
    }
}
