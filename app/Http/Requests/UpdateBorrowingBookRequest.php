<?php

namespace App\Http\Requests;

use App\Enums\BorrowingStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateBorrowingBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'status' => ['required', Rule::in([
                BorrowingStatusEnum::fromName('LATE'),
                BorrowingStatusEnum::fromName('RETURNED')
            ])]
        ];
    }
}
