<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 21/04/2016
 * Time: 13:01
 */

namespace App\Domain\Entities;


/**
 * Class Siswa
 * @package App\Domain\Entities
 */
class Siswa extends Entities
{
    /**
     * @var string
     */
    protected $table = 'siswa';
    /**
     * @var array
     */
    protected $fillable = ['id_kelas', 'nis', 'nama', 'jk', 'agama', 'alamat'];
    /**
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * @var string
     */
    public static $tags = 'siswa';

    protected $with = ['kelas'];
    /**
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'user_creator',
        'user_updater',
    ];

    public function kelas()
    {
        return $this->belongsTo('App\Domain\Entities\Kelas', 'id_kelas');
    }

}