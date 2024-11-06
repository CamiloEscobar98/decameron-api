<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Enums\RoomAccommodationEnum;

class UpdateRoomAccommodationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $roomAccommodationId = $this->route('id');
        return [
            'name' => ['required', 'string', 'max:255', sprintf('unique:%s,%s,%d', RoomAccommodationEnum::Table, RoomAccommodationEnum::Name, $roomAccommodationId)] . $roomAccommodationId,
        ];
    }
}
