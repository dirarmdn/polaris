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
            'judul_pengajuan' => 'required|string|max:255',
            'deskripsi_masalah' => 'required|string',
            'tujuan_aplikasi' => 'required|string',
            'proses_bisnis' => 'required|string',
            'aturan_bisnis' => 'required|string',
            'stakeholder' => 'required|string',
            'platform' => 'required|in:web,mobile,desktop,multi-platform',
            'jenis_proyek' => 'required|in:0,1',
            'referensi' => 'nullable|array',
            'referensi.*.tipe' => 'required|in:link,file',
            'referensi.*.link_path' => 'nullable',
            'referensi.*.file_path' => 'nullable|file',
            'referensi.*.keterangan' => 'nullable|string|max:255',
        ];
    }

    protected function prepareForValidation()
    {
        // Convert radio button value to integer
        if ($this->has('jenis_proyek')) {
            $this->merge([
                'jenis_proyek' => (int) $this->jenis_proyek
            ]);
        }
    }
}
