<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class GuruRequest extends Request
{
    protected $attrs = [
        'kode_guru' => '',
        'nama'      => '',
        'alamat'    => '',
        'id_mapel'  => '',
        'no_hp'     => '',

    ];

    public function rules()
    {
        return [
            'kode_guru' => '',
            'nama'      => 'required',
            'alamat'    => 'required',
            'id_mapel'  => 'required',
            'no_hp'     => 'required',
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
                'kode_guru' => $message->first('kode_guru'),
                'nama'      => $message->first('nama'),
                'alamat'    => $message->first('alamat'),
                'id_mapel'  => $message->first('kode_mapel'),
                'no_hp'     => $message->first('no_hp'),
            ]
        ];
    }
}
