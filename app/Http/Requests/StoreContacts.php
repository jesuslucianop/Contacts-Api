<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContacts extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

            return [

                'name' => 'required|string|max:50',
                'lastName' => 'required|string|max:50',
            ];
        }

         /**
         * Custom message for validation
         *
         * @return array
         */
        public function messages()
        {
            return [
                'name.required' => 'Name is required!',
                'lastName.required' => 'lastName is required!'
            ];
        }
}
