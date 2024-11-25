<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubmissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'submission_title' => 'required|string|max:255',
            'problem_description' => 'required|string',
            'application_purpose' => 'required|string',
            'platform' => 'required|in:web,mobile,desktop,multi-platform',
            'project_type' => 'required|boolean',
            'references.*.type' => 'nullable|in:file,link',
            'references.*.file_path' => 'nullable|file|max:2048', // Validasi file
            'references.*.link_path' => 'nullable|url', // Validasi URL
        ];
    }
}
