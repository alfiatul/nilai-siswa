<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22/04/2016
 * Time: 9:51
 */

namespace App\Domain\Repositories;

use App\Domain\Contracts\Cacheable;
use App\Domain\Contracts\Crudable;
use App\Domain\Contracts\Paginable;
use App\Domain\Entities\Kelas;
use App\Domain\Repositories\AbstractRepository;
use Illuminate\Support\Facades\Log;

class KelasRepository extends AbstractRepository implements Paginable, Crudable
{
    protected $cache;

    public function __construct(Kelas $kelas, Cacheable $cache)
    {
        $this->model = $kelas;
        $this->cache = $cache;
    }

    public function find($id, array $columns = ['*'])
    {
        $kelas = parent::find($id, $columns);
        return $kelas;
    }

    public function create(array $data)
    {
        try {
            $kelas = parent::create(
                [
                    'id_jurusan' => e($data['id_jurusan']),
                    'kelas'      => e($data['kelas']),
                    'jml'        => e($data['jml']),
                ]
            );
            // flush cache with tags
            $this->cache->flush(Kelas::$tags);


            return $kelas;
        } catch (\Exception $e) {
            //store errors to log
            Log::errors('class : ' . KelasRepository::class . 'method : create | ' . $e);

            return $this->createError();
        }
    }

    public function update($id, array $data)
    {

        try {

            $kelas = parent::update($id, [
                'id_jurusan' => e($data['id_jurusan']),
                'kelas'      => e($data['kelas']),
                'jml'        => e($data['jml']),

            ]);

            // flush cache with tags
            $this->cache->flush(Kelas::$tags);

            return $kelas;

        } catch (\Exception $e) {
            // store errors to log
            Log::error('class : ' . KelasRepository::class . ' method : update | ' . $e);
            return $this->createError();
        }

    }

    public function delete($id)
    {
        try {
            $kelas = parent::delete($id);
            // flush cache with tags
            $this->cache->flush(Kelas::$tags);
            return $kelas;
        } catch (\Exception $e) {
            // store errors to log

            Log::error('class : ' . KelasRepository::class . ' method : delete | ' . $e);

            return $this->createError();
        }
    }

    public function getByPage($limit = 10, $page = 1, array $column = ['*'], $field, $search = '')
    {
        // set key
        $key = 'kelas-get-by-page' . $limit . $page . $search;

        // has section and key
        if ($this->cache->has(Kelas::$tags, $key)) {
            return $this->cache->get(Kelas::$tags, $key);
        }

        // query to sql
//        $organisasi = parent::getByPage($limit, $page, $column, 'kelas', $search);
        $data = $this->model
            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
            ->where('kelas.kelas', 'like', '%' . $search . '%')
            ->select('kelas.*')
            ->orderBy('kelas.kelas', 'asc')
            ->orderBy('jurusan.jurusan', 'asc')
            ->paginate($limit)
            ->toArray();

        // store to cache
        $this->cache->put(Kelas::$tags, $key, $data, 10);

        return $data;
    }

    public function getList()
    {
        // set key
        $key = 'kelas-get-list';

        // has section and key
        if ($this->cache->has(Kelas::$tags, $key)) {
            return $this->cache->get(Kelas::$tags, $key);
        }

        // query to sql
        $data = $this->model
            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
            ->select('kelas.*')
            ->orderBy('kelas.kelas')
            ->orderBy('jurusan.jurusan')
            ->get();
        // store to cache
        $this->cache->put(Kelas::$tags, $key, $data, 10);

        return $data;
    }
}