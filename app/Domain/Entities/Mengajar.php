<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 03/05/2016
 * Time: 14:40
 */

namespace App\Domain\Entities;


class Mengajar extends Entities
{
    /**
     * @var string
     */
    protected $table = 'mengajar';
    /**
     * @var array
     */
    protected $fillable =['id','id_kelas','id_mapel','id_guru'];
    /**
     * @var string
     */
    protected $primaryKey = 'id';
    protected $with = ['kelas','mapel','guru'];
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
    public function mapel()
    {
        return $this->belongsTo('App\Domain\Entities\Mapel', 'id_mapel');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Domain\Entities\Kelas', 'id_kelas');
    }

    public function guru()
    {
        return $this->belongsTo('App\Domain\Entities\Guru', 'id_guru');
    }
}