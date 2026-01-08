<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|min:3',
            'phone' => 'required|min:7',
            'status' => 'required|in:new,in_progress,done',
            'note' => 'nullable|string',
        ];
    }
}
