<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22/04/2016
 * Time: 10:30
 */

namespace App\Domain\Repositories;

use App\Domain\Contracts\Cacheable;
use App\Domain\Contracts\Crudable;
use App\Domain\Contracts\Paginable;
use App\Domain\Entities\Mapel;
use App\Domain\Repositories\AbstractRepository;
use Illuminate\Support\Facades\Log;

class MapelRepository extends AbstractRepository implements Paginable, Crudable
{
    protected $cache;

    public function __construct(Mapel $mapel, Cacheable $cache)
    {
        $this->model = $mapel;
        $this->cache = $cache;
    }

    public function find($id, array $columns = ['*'])
    {
        $mapel = parent::find($id, $columns);
        return $mapel;
    }

    public function create(array $data)
    {
        try {
            $mapel = parent::create(
                [
                    'mapel' => e($data['mapel']),
                    'kkm'   => e($data['kkm']),
                ]
            );
            // flush cache with tags
            $this->cache->flush(Mapel::$tags);


            return $mapel;
        } catch (\Exception $e) {
            //store errors to log
            Log::error('class : ' . MapelRepository::class . 'method : create | ' . $e);

            return $this->createError();
        }
    }

    public function update($id, array $data)
    {

        try {

            $mapel = parent::update($id, [
                'mapel' => e($data['mapel']),
                'kkm'   => e($data['kkm']),
            ]);

            // flush cache with tags
            $this->cache->flush(Mapel::$tags);

            return $mapel;

        } catch (\Exception $e) {
            // store errors to log
            Log::error('class : ' . MapelRepository::class . ' method : update | ' . $e);
            return $this->createError();
        }

    }

    public function delete($id)
    {
        try {
            $mapel = parent::delete($id);
            // flush cache with tags
            $this->cache->flush(Mapel::$tags);
            return $mapel;
        } catch (\Exception $e) {
            // store errors to log

            Log::error('class : ' . MapelRepository::class . ' method : delete | ' . $e);

            return $this->createError();
        }
    }

    public function getByPage($limit = 10, $page = 1, array $column = ['*'], $field, $search = '')
    {
        // set key
        $key = 'mapel-get-by-page' . $limit . $page . $search;

        // has section and key
        if ($this->cache->has(Mapel::$tags, $key)) {
            return $this->cache->get(Mapel::$tags, $key);
        }

        // query to sql
        $organisasi = parent::getByPage($limit, $page, $column, 'mapel', $search);

        // store to cache
        $this->cache->put(Mapel::$tags, $key, $organisasi, 10);

        return $organisasi;
    }

    public function getList()
    {
        // set key
        $key = 'mapel-get-list';

        // has section and key
        if ($this->cache->has(Mapel::$tags, $key)) {
            return $this->cache->get(Mapel::$tags, $key);
        }

        // query to sql
        $data = $this->model->get();

        // store to cache
        $this->cache->put(Mapel::$tags, $key, $data, 10);

        return $data;
    }
}