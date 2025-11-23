<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
    * Prepare the data for validation.
    */
    protected function prepareForValidation(): void
    {
        // Check if user logged in
        $this->merge([
            'user_id' => Auth::check() ? Auth::id() : null,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'subject' => 'string|max:200|nullable',
            'message' => 'string|required',
            'email' => 'email|required_if:user_id,null',
            'user_id' => 'exists:App\Models\User,id|required_if:email,null',
        ];
    }
}
