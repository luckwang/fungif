<?php

namespace App\Http\Requests;

class GifRequest extends Request
{
    public function rules()
    {
        switch($this->method())
        {
            // CREATE
            case 'POST':

            // UPDATE
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'path' => 'required',
                    'title' => 'required|between:3,25',
                    'description' => 'required|between:5,50'
                ];
            }

            case 'GET':
            case 'DELETE':
            default:
            {
                return [];
            };
        }
    }

    public function messages()
    {
        return [
            'path.required' => 'must upload image',
            'title.required' => 'required title',
            'descripition.between' => 'descripition between 5, 50'
        ];
    }
}
