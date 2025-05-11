<?php

namespace Callmeaf\Notification\App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class NotificationShowRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->notifications()->where('id',$this->route('notification'))->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
