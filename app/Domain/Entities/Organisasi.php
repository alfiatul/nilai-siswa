<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 09/02/2016
 * Time: 13:24
 */
namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Organisasi
 *
 * @package App\Domain\Entities
 */
class Organisasi extends Entities
{
	/**
     * @var string
     */
    protected $table = 'organisasi';

	/**
     * @var array
     */
    protected $fillable =['pemda_id','skpd_id','uptd_id','ukpd_id','is_organisasi'];

	/**
     * @var string
     */
    protected $primaryKey = 'id';

	/**
     * @var string
     */
    public static $tags= 'organisasi';

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