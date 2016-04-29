<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 21/04/2016
 * Time: 10:57
 */

namespace App\Domain\Entities;


/**
 * Class Guru
 * @package App\Domain\Entities
 */
class Guru extends Entities
{
    /**
     * @var string
     */
    protected $table = 'guru';
    /**
     * @var array
     */
    protected $fillable = ['kode_guru', 'nama', 'alamat', 'id_mapel', 'no_hp'];
    /**
     * @var string
     */
    protected $primaryKey = 'id';

    protected $with = ['mapel'];
    /**
     * @var string
     */
    public static $tags = 'guru';
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
}