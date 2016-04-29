<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 21/04/2016
 * Time: 13:07
 */

namespace App\Domain\Repositories;

use App\Domain\Contracts\Cacheable;
use App\Domain\Contracts\Crudable;
use App\Domain\Contracts\Paginable;
use App\Domain\Entities\Siswa;
use App\Domain\Repositories\AbstractRepository;
use Illuminate\Support\Facades\Log;

class SiswaRepository extends AbstractRepository implements Paginable, Crudable
{
    protected $cache;

    public function __construct(siswa $siswa, Cacheable $cache)
    {
        $this->model = $siswa;
        $this->cache = $cache;
    }

    public function find($id, array $columns = ['*'])
    {
        $siswa = parent::find($id, $columns);

        return $siswa;
    }

    public function create(array $data)
    {
        try {
            $siswa = parent::create(
                [
                    'id_kelas' => e($data['id_kelas']),
                    'nis'      => e($data['nis']),
                    'nama'     => e($data['nama']),
                    'jk'       => e($data['jk']),
                    'agama'    => e($data['agama']),
                    'alamat'   => e($data['alamat']),
                ]
            );
            // flush cache with tags
            $this->cache->flush(Siswa::$tags);


            return $siswa;
        } catch (\Exception $e) {
            //store errors to log
            Log::errors('class : ' . SiswaRepository::class . 'method : create | ' . $e);

            return $this->createError();
        }
    }

    public function update($id, array $data)
    {

        try {

            $siswa = parent::update($id, [
                'id_kelas' => e($data['id_kelas']),
                'nis'      => e($data['nis']),
                'nama'     => e($data['nama']),
                'jk'       => e($data['jk']),
                'agama'    => e($data['agama']),
                'alamat'   => e($data['alamat']),
            ]);

            // flush cache with tags
            $this->cache->flush(Siswa::$tags);

            return $siswa;

        } catch (\Exception $e) {
            // store errors to log
            Log::error('class : ' . SiswaRepository::class . ' method : update | ' . $e);
            return $this->createError();
        }

    }

    public function delete($id)
    {
        try {
            $siswa = parent::delete($id);
            // flush cache with tags
            $this->cache->flush(Siswa::$tags);
            return $siswa;
        } catch (\Exception $e) {
            // store errors to log

            Log::error('class : ' . SiswaRepository::class . ' method : delete | ' . $e);

            return $this->createError();
        }
    }


    public function getByPage($limit = 10, $page = 1, array $column = ['*'], $field, $search = '')
    {
        // set key
        $key = 'siswa-get-by-page' . $limit . $page . $search;

        // has section and key
        if ($this->cache->has(Siswa::$tags, $key)) {
            return $this->cache->get(Siswa::$tags, $key);
        }

        // query to sql
        $organisasi = parent::getByPage($limit, $page, $column, 'nama', $search);

        // store to cache
        $this->cache->put(Siswa::$tags, $key, $organisasi, 10);

        return $organisasi;
    }

    public function getList()
    {
        // set key
        $key = 'siswa-get-list';

        // has section and key
        if ($this->cache->has(Siswa::$tags, $key)) {
            return $this->cache->get(Siswa::$tags, $key);
        }

        // query to sql
        $data = $this->model->get();

        // store to cache
        $this->cache->put(Siswa::$tags, $key, $data, 10);

        return $data;
    }

    public function getListBykelas($id)
    {
        // set key
        $key = 'siswa-get-list-by-kelas' . $id;

        // has section and key
        if ($this->cache->has(Siswa::$tags, $key)) {
            return $this->cache->get(Siswa::$tags, $key);
        }

        // query to sql
        $data = $this->model
            ->where('id_kelas', $id)
            ->get();

        // store to cache
//        $this->cache->put(Siswa::$tags, $key, $data, 10);

        return $data;
    }
}