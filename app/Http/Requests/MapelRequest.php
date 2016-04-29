<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class MapelRequest extends Request
{
    protected $attrs = [
        'mapel' => '',
        'kkm'   => '',

    ];

    public function rules()
    {
        return [
            'mapel' => 'required',
            'kkm'   => 'required',
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
                'mapel' => $message->first('mapel'),
                'kkm'   => $message->first('kkm')
            ]
        ];
    }
}
