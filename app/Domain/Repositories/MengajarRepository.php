<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 03/05/2016
 * Time: 14:44
 */

namespace App\Domain\Repositories;


use App\Domain\Contracts\Cacheable;
use App\Domain\Contracts\Crudable;
use App\Domain\Contracts\Paginable;
use App\Domain\Entities\Mengajar;

class MengajarRepository extends AbstractRepository implements Paginable, Crudable
{
    protected $cache;

    public function __construct(Mengajar $mengajar, Cacheable $cache)
    {
        $this->model = $mengajar;
        $this->cache = $cache;
    }

    public function find($id, array $columns = ['*'])
    {
        $mengajar = parent::find($id, $columns);
        return $mengajar;
    }

    public function create(array $data)
    {
        try {
            $mengajar = parent::create(
                [
                    'id_mapel' => e($data['id_mapel']),
                    'id_kelas'      => e($data['id_kelas']),
                    'id_guru'        => e($data['id_guru']),
                ]
            );
            // flush cache with tags
            $this->cache->flush(Mengajar::$tags);


            return $mengajar;
        } catch (\Exception $e) {
            //store errors to log
            Log::errors('class : ' . MengajarRepository::class . 'method : create | ' . $e);

            return $this->createError();
        }
    }

    public function update($id, array $data)
    {

        try {

            $mengajar = parent::update($id, [
                'id_mapel' => e($data['id_mapel']),
                'id_kelas'      => e($data['id_kelas']),
                'id_guru'        => e($data['id_guru']),

            ]);

            // flush cache with tags
            $this->cache->flush(Mengajar::$tags);

            return $mengajar;

        } catch (\Exception $e) {
            // store errors to log
            Log::error('class : ' . MengajarRepository::class . ' method : update | ' . $e);
            return $this->createError();
        }

    }

    public function delete($id)
    {
        try {
            $mengajar = parent::delete($id);
            // flush cache with tags
            $this->cache->flush(Mengajar::$tags);
            return $mengajar;
        } catch (\Exception $e) {
            // store errors to log

            Log::error('class : ' . MengajarRepository::class . ' method : delete | ' . $e);

            return $this->createError();
        }
    }

    public function getByPage($limit = 10, $page = 1, array $column = ['*'], $field, $search = '')
    {
        // set key
        $key = 'mengajar-get-by-page' . $limit . $page . $search;

        // has section and key
        if ($this->cache->has(Mengajar::$tags, $key)) {
            return $this->cache->get(Mengajar::$tags, $key);
        }

        // query to sql
//        $organisasi = parent::getByPage($limit, $page, $column, 'kelas', $search);
        $data = $this->model
            ->paginate($limit)
            ->toArray();

        // store to cache
        $this->cache->put(Mengajar::$tags, $key, $data, 10);

        return $data;
    }

    public function getList()
    {
        // set key
        $key = 'kelas-get-list';

        // has section and key
        if ($this->cache->has(Mengajar::$tags, $key)) {
            return $this->cache->get(Mengajar::$tags, $key);
        }

        // query to sql
        $data = $this->model
//            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
//            ->select('kelas.*')
//            ->orderBy('kelas.kelas')
//            ->orderBy('jurusan.jurusan')
            ->get();
        // store to cache
        $this->cache->put(Mengajar::$tags, $key, $data, 10);

        return $data;
    }
}