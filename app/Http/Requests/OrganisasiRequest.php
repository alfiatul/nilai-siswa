<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;


class OrganisasiRequest extends Request
{
    protected $attrs = [
        'pemda_id'=> 'PemerintahanDaerah',
        'skpd_id' => 'idskpd',
        'uptd_id' => 'iduptd',
        'ukpd_id' => 'idukpd',
        'is_organisasi' => 'isorganisasi',

    ];
          public function rules()
    {
        return [
            'pemda_id'   => 'required',
            'skpd_id'  => 'required',
            'uptd_id' => 'required',
            'ukpd_id'    => 'required',
            'is_organisasi'    => 'required',
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
                'pemda_id'   => $message->first('pemda_id'),
                'skpd_id'  => $message->first('skpd_id'),
                'uptd_id' => $message->first('uptd_id'),
                'ukpd_id'    => $message->first('ukpd_id'),
                'is_organisasi'    => $message->first('is_organisasi')
            ]
        ];
    }
}
