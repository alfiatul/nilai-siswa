<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22/04/2016
 * Time: 9:48
 */

namespace App\Domain\Entities;


class Kelas extends Entities
{
    /**
     * @var string
     */
    protected $table = 'kelas';
    /**
     * @var array
     */
    protected $fillable =['id','id_jurusan','kelas','jml'];
    /**
     * @var string
     */
    protected $primaryKey = 'id';
    protected $with = ['jurusan'];
    /**
     * @var string
     */
    public static $tags= 'kelas';
    /**
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'user_creator',
        'user_updater',
    ];
    public function jurusan()
    {
        return $this->belongsTo('App\Domain\Entities\Jurusan', 'id_jurusan');
    }
}