<?php



namespace App\Http\Requests;



use Illuminate\Foundation\Http\FormRequest;



use Illuminate\Http\Exceptions\HttpResponseException;



use Illuminate\Contracts\Validation\Validator;



class LoginUser extends FormRequest

{





    /**

     * Get the validation rules that apply to the request.

     *

     * @return array

     */

    public function rules()

    {

        return [

            'username' => 'required',

            'password' => 'required'

        ];

    }



    public function failedValidation(Validator $validator)



    {



        throw new HttpResponseException(response()->json([



            'success'   => false,



            'message'   => 'Validation errors',



            'data'      => $validator->errors()



        ]));

    }



    public function messages()

    {

        return [

            'username.required' => 'Username is required',

            'password.required' => 'Password is required'

        ];

    }

}

