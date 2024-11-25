<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubmissionRequest extends FormRequest
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
            'submission_title' => 'required|string|max:255',
            'problem_description' => 'required|string',
            'application_purpose' => 'required|string',
            'business_process' => 'required|string',
            'business_rules' => 'required|string',
            'stakeholders' => 'required|string',
            'platform' => 'required|in:web,mobile,desktop,multi-platform',
            'project_type' => 'required|in:0,1',
            'referensi' => 'nullable|array',
            'referensi.*.tipe' => 'nullable|in:link,file',
            'referensi.*.link_path' => 'nullable',
            'referensi.*.file_path' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'referensi.*.keterangan' => 'nullable|string|max:255',
        ];
    }

    protected function prepareForValidation()
    {
        // Convert radio button value to integer
        if ($this->has('project_type')) {
            $this->merge([
                'project_type' => (int) $this->project_type
            ]);
        }
    }
}
