<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class SiswaRequest extends Request
{
    protected $attrs = [
        'id_kelas' => '',
        'nis'      => '',
        'nama'     => '',
        'jk'       => '',
        'agama'    => '',
        'alamat'   => '',

    ];

    public function rules()
    {
        return [
            'id_kelas' => 'required',
            'nis'      => 'required|digits:4',
            'nama'     => 'required',
            'jk'       => 'required',
            'agama'    => 'required',
            'alamat'   => 'required',
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
                'id_kelas' => $message->first('id_kelas'),
                'nis'      => $message->first('nis'),
                'nama'     => $message->first('nama'),
                'jk'       => $message->first('jk'),
                'agama'    => $message->first('agama'),
                'alamat'   => $message->first('alamat')
            ]
        ];
    }
}
