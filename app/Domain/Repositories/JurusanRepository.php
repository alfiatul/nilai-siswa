<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22/04/2016
 * Time: 11:04
 */

namespace App\Domain\Repositories;

use App\Domain\Contracts\Cacheable;
use App\Domain\Contracts\Crudable;
use App\Domain\Contracts\Paginable;
use App\Domain\Entities\Jurusan;
use App\Domain\Repositories\AbstractRepository;
use Illuminate\Support\Facades\Log;

class JurusanRepository extends AbstractRepository implements Paginable, Crudable
{
    protected $cache;

    public function __construct(Jurusan $jurusan, Cacheable $cache)
    {
        $this->model = $jurusan;
        $this->cache = $cache;
    }

    public function find($id, array $columns = ['*'])
    {
        $jurusan = parent::find($id, $columns);
        return $jurusan;
    }

    public function create(array $data)
    {
        try {
            $jurusan = parent::create(
                [
                    'jurusan' => e($data['jurusan']),
                ]
            );
            // flush cache with tags
            $this->cache->flush(Jurusan::$tags);


            return $jurusan;
        } catch (\Exception $e) {
            //store errors to log
            Log::errors('class : ' . JurusanRepository::class . 'method : create | ' . $e);

            return $this->createError();
        }
    }

    public function update($id, array $data)
    {

        try {

            $jurusan = parent::update($id, [
                'jurusan' => e($data['jurusan']),

            ]);

            // flush cache with tags
            $this->cache->flush(Jurusan::$tags);

            return $jurusan;

        } catch (\Exception $e) {
            // store errors to log
            Log::error('class : ' . JurusanRepository::class . ' method : update | ' . $e);
            return $this->createError();
        }

    }

    public function delete($id)
    {
        try {
            $jurusan = parent::delete($id);
            // flush cache with tags
            $this->cache->flush(Jurusan::$tags);
            return $jurusan;
        } catch (\Exception $e) {
            // store errors to log

            Log::error('class : ' . JurusanRepository::class . ' method : delete | ' . $e);

            return $this->createError();
        }
    }

    public function getByPage($limit = 10, $page = 1, array $column = ['*'], $field, $search = '')
    {
        // set key
        $key = 'jurusan-get-by-page' . $limit . $page . $search;

        // has section and key
        if ($this->cache->has(Jurusan::$tags, $key)) {
            return $this->cache->get(Jurusan::$tags, $key);
        }

        // query to sql
        $organisasi = parent::getByPage($limit, $page, $column, 'jurusan', $search);

        // store to cache
        $this->cache->put(Jurusan::$tags, $key, $organisasi, 10);

        return $organisasi;
    }

    public function getList()
    {
        // set key
        $key = 'jurusan-get-list';

        // has section and key
        if ($this->cache->has(Jurusan::$tags, $key)) {
            return $this->cache->get(Jurusan::$tags, $key);
        }

        // query to sql
//        $data = parent::getByPage($limit, $page, $column, 'nama', $search);
        $data = $this->model->get();

        // store to cache
//        $this->cache->put(Guru::$tags, $key, $organisasi, 10);

        return $data;
    }
}