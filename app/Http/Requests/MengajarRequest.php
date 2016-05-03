<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 03/05/2016
 * Time: 15:00
 */

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class MengajarRequest extends Request
{
    protected $attrs = [
        'id_guru'  => '',
        'id_kelas' => '',
        'id_mapel' => '',

    ];

    public function rules()
    {
        return [
            'id_mapel' => 'required',
            'id_kelas' => 'required',
            'id_guru'  => 'required',
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
                'id_mapel' => $message->first('id_mapel'),
                'id_kelas' => $message->first('id_kelas'),
                'id_guru'  => $message->first('id_guru')
            ]
        ];
    }
}