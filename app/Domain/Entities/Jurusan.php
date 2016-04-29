<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22/04/2016
 * Time: 10:59
 */

namespace App\Domain\Entities;


class Jurusan extends Entities
{
    /**
     * @var string
     */
    protected $table = 'jurusan';
    /**
     * @var array
     */
    protected $fillable =['jurusan'];
    /**
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * @var string
     */
    public static $tags= 'jurusan';
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