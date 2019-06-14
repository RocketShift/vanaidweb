<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method())
        {
            case 'GET':
            {
                return [
                    'name' => 'required',
                    'username' => 'unique:users|required',
                    'email' => 'unique:users|required',
                    'name' => 'required',
                    'address' => 'required',
                    'phonenumber' => 'required|numeric|phone',
                    'password' => 'required|confirmed'
                ];
            }
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
               return [
                    'name' => 'required',
                    'username' => 'unique:users|required',
                    'email' => 'unique:users|required',
                    'name' => 'required',
                    'address' => 'required',
                    'phonenumber' => 'required|numeric|phone',
                    'password' => 'required|confirmed'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {

                 return [
                    'name' => 'required',
                    'username' => 'unique:users,username,'.$this->user->id.'|required',
                    'email' => 'unique:users,email,'.$this->user->id.'|required',
                    'name' => 'required',
                    'address' => 'required'
                ];
            }
            default:break;
        }
    }
}
