<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22/04/2016
 * Time: 10:28
 */

namespace App\Domain\Entities;


class Mapel extends Entities
{
    /**
     * @var string
     */
    protected $table = 'mapel';
    /**
     * @var array
     */
    protected $fillable = ['id', 'mapel', 'kkm'];
    /**
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * @var string
     */
    public static $tags = 'mapel';
    /**
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'user_creator',
        'user_updater',
    ];
}