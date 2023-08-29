<?php

namespace Erjon\Cone\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivateLicenseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'key' => ['required']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
