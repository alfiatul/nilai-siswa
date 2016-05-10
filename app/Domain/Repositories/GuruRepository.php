<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 21/04/2016
 * Time: 11:04
 */

namespace App\Domain\Repositories;

use App\Domain\Contracts\Cacheable;
use App\Domain\Contracts\Crudable;
use App\Domain\Contracts\Paginable;
use App\Domain\Entities\Guru;
use Illuminate\Support\Facades\Log;
use App\Domain\Repositories\AbstractRepository;

class GuruRepository extends AbstractRepository implements Paginable, Crudable
{
    protected $cache;

    public function __construct(Guru $guru, Cacheable $cache)
    {
        $this->model = $guru;
        $this->cache = $cache;
    }

    public function find($id, array $columns = ['*'])
    {
        $guru = parent::find($id, $columns);

        return $guru;
    }

    public function create(array $data)
    {
        try {
            $guru = parent::create(
                [
                    'kode_guru' => e($data['kode_guru']),
                    'nama'      => e($data['nama']),
                    'alamat'    => e($data['alamat']),
//                    'id_mapel'  => e($data['id_mapel']),
                    'no_hp'     => e($data['no_hp']),
                ]
            );
            // flush cache with tags
            $this->cache->flush(Guru::$tags);


            return $guru;
        } catch (\Exception $e) {
            //store errors to log
            Log::error('class : ' . GuruRepository::class . 'method : create | ' . $e);

            return $this->createError();
        }
    }

    public function update($id, array $data)
    {

        try {

            $guru = parent::update($id, [
                'kode_guru' => e($data['kode_guru']),
                'nama'      => e($data['nama']),
                'alamat'    => e($data['alamat']),
//                'id_mapel'  => e($data['id_mapel']),
                'no_hp'     => e($data['no_hp']),
            ]);

            // flush cache with tags
            $this->cache->flush(Guru::$tags);

            return $guru;

        } catch (\Exception $e) {
            // store errors to log
            Log::error('class : ' . GuruRepository::class . ' method : update | ' . $e);
            return $this->createError();
        }

    }

    public function delete($id)
    {
        try {
            $guru = parent::delete($id);
            // flush cache with tags
            $this->cache->flush(Guru::$tags);
            return $guru;
        } catch (\Exception $e) {
            // store errors to log

            Log::error('class : ' . GuruRepository::class . ' method : delete | ' . $e);

            return $this->createError();
        }
    }

    public function getByPage($limit = 10, $page = 1, array $column = ['*'], $field, $search = '')
    {
        // set key
        $key = 'guru-get-page' . $limit . $page . $search;

        // has section and key
        if ($this->cache->has(Guru::$tags, $key)) {
            return $this->cache->get(Guru::$tags, $key);
        }

        // query to sql
//        $data = parent::getByPage($limit, $page, $column, 'nama', $search);
        $data = $this->model
            ->orderBy('nama', 'asc')
            ->paginate($limit)
            ->toArray();

        // store to cache
//        $this->cache->put(Guru::$tags, $key, $organisasi, 10);

        return $data;
    }

    public function getList()
    {
        // set key
        $key = 'guru-get-list';

        // has section and key
        if ($this->cache->has(Guru::$tags, $key)) {
            return $this->cache->get(Guru::$tags, $key);
        }

        // query to sql
//        $data = parent::getByPage($limit, $page, $column, 'nama', $search);
        $data = $this->model->get();

        // store to cache
//        $this->cache->put(Guru::$tags, $key, $organisasi, 10);

        return $data;
    }
}
