<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class NilaiRequest extends Request
{
    protected $attrs = [
        'id_siswa' => '',
        'id_mapel' => '',
        'n_tugas'  => '',
        'n_uts'    => '',
        'n_uas'    => '',
        'n_akhir'  => '',

    ];

    public function rules()
    {
        return [
            'id_siswa' => '',
            'id_mapel' => '',
            'n_tugas'  => 'required',
            'n_uts'    => 'required',
            'n_uas'    => 'required',
            'n_akhir'  => '',
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
                'id_siswa' => $message->first('id_siswa'),
                'id_mapel' => $message->first('id_mapel'),
                'n_tugas'  => $message->first('n_tugas'),
                'n_uts'    => $message->first('n_uts'),
                'n_uas'    => $message->first('n_uas'),
                'n_akhir'  => $message->first('n_akhir')
            ]
        ];
    }
}
