<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 21/04/2016
 * Time: 15:20
 */

namespace App\Domain\Entities;


/**
 * Class Nilai
 * @package App\Domain\Entities
 */
class Nilai extends Entities
{
    /**
     * @var string
     */
    protected $table = 'nilai';
    /**
     * @var array
     */
    protected $fillable = ['id_siswa', 'id_mapel', 'n_tugas', 'n_uts', 'n_uas', 'n_akhir'];
    /**
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * @var array
     */
    protected $with = ['mapel', 'siswa'];
    /**
     * @var string
     */
    public static $tags = 'nilai';
    /**
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'user_creator',
        'user_updater',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mapel()
    {
        return $this->belongsTo('App\Domain\Entities\Mapel', 'id_mapel');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function siswa()
    {
        return $this->belongsTo('App\Domain\Entities\Siswa', 'id_siswa');
    }
}