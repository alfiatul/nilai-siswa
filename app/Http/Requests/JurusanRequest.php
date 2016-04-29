<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class JurusanRequest extends Request
{
    protected $attrs = [
        'jurusan' => '',
    ];

    public function rules()
    {
        return [
            'jurusan' => 'required',

        ];
    }

    public function validator($validator)
    {
        return $validator->make($this->all(), $this->container->call([$this, 'rules']), $this->messages(), $this->attrs);
    }

    protected function formatErrors(Validator $validator)
    {
        $message = $validator->errors();
        return [
            'success'    => false,
            'validation' => [
                'jurusan' => $message->first('jurusan'),

            ]
        ];
    }
}
