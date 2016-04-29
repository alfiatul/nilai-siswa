<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;


class KelasRequest extends Request
{
    protected $attrs = [
        'id_jurusan' => '',
        'kelas'      => '',
        'jml'        => '',

    ];

    public function rules()
    {
        return [
            'id_jurusan' => 'required',
            'kelas'      => 'required',
            'jml'        => 'required',
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
                'id_jurusan' => $message->first('id_jurusan'),
                'kelas' => $message->first('kelas'),
                'jml'   => $message->first('jml'),
            ]
        ];
    }
}
