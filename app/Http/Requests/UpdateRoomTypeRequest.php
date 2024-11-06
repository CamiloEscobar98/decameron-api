<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Enums\RoomTypeEnum;

class UpdateRoomTypeRequest extends FormRequest
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
        $roomTypeId = $this->route('id');
        return [
            RoomTypeEnum::Name => ['required', 'string', 'max:255', sprintf('unique:%s,%s,%d', RoomTypeEnum::Table, RoomTypeEnum::Name, $roomTypeId)],
        ];
    }
}
