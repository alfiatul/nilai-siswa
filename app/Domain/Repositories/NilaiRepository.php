<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 21/04/2016
 * Time: 15:25
 */

namespace App\Domain\Repositories;

use App\Domain\Contracts\Cacheable;
use App\Domain\Contracts\Crudable;
use App\Domain\Contracts\Paginable;
use App\Domain\Entities\Nilai;
use App\Domain\Repositories\AbstractRepository;
use Illuminate\Support\Facades\Log;

class NilaiRepository extends AbstractRepository implements Crudable, Paginable
{
    protected $cache;

    public function __construct(nilai $nilai, Cacheable $cache)
    {
        $this->model = $nilai;
        $this->cache = $cache;
    }

    public function find($id, array $columns = ['*'])
    {
        $nilai = parent::find($id, $columns);
        return $nilai;
    }

    public function create(array $data)
    {
        try {
            $nilai = parent::create(
                [
                    'id_siswa' => e($data['id_siswa']),
                    'id_mapel' => e($data['id_mapel']),
                    'n_tugas'  => e($data['n_tugas']),
                    'n_uts'    => e($data['n_uts']),
                    'n_uas'    => e($data['n_uas']),
                    'n_akhir'  => e($data['n_akhir']),
                ]
            );
            // flush cache with tags
            $this->cache->flush(Nilai::$tags);
            return $nilai;
        } catch (\Exception $e) {
            //store errors to log
            Log::error('class : ' . NilaiRepository::class . 'method : create | ' . $e);

            return $this->createError();
        }
    }

    public function update($id, array $data)
    {

        try {

            $nilai = parent::update($id, [
                'id_siswa'   => e($data['id_siswa']),
                'kode_mapel' => e($data['kode_mapel']),
                'n_tugas'    => e($data['n_tugas']),
                'n_uts'      => e($data['n_uts']),
                'n_uas'      => e($data['n_uas']),
                'n_akhir'    => e($data['n_akhir']),
            ]);

            // flush cache with tags
            $this->cache->flush(Nilai::$tags);

            return $nilai;

        } catch (\Exception $e) {
            // store errors to log
            Log::error('class : ' . NilaiRepository::class . ' method : update | ' . $e);
            return $this->createError();
        }

    }

    public function delete($id)
    {
        try {
            $nilai = parent::delete($id);
            // flush cache with tags
            $this->cache->flush(Nilai::$tags);
            return $nilai;
        } catch (\Exception $e) {
            // store errors to log

            Log::error('class : ' . NilaiRepository::class . ' method : delete | ' . $e);

            return $this->createError();
        }
    }


    public function getByPage($limit = 10, $page = 1, array $column = ['*'], $field, $search = '')
    {
        // set key
        $key = 'nilai-get-by-page' . $limit . $page . $search;

        // has section and key
        if ($this->cache->has(Nilai::$tags, $key)) {
            return $this->cache->get(Nilai::$tags, $key);
        }

        // query to sql
//        $organisasi = parent::getByPage($limit, $page, $column, 'nis', $search);
//        $data = $this->model->get();
        $organisasi = $this->model->paginate($limit)->toArray();

        // store to cache
//        $this->cache->put(Nilai::$tags, $key, $organisasi, 10);

        return $organisasi;
    }
}