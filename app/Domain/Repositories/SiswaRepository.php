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

    public function __construct(Siswa $siswa, Cacheable $cache)
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
            $cari = $this->model->where('nis', e($data['nis']))->count();

            if ($cari > 0) {
                return response()->json(
                    [
                        'success' => false,
                        'result'  => [
                            'message' => 'Maaf, NIS Sudah Digunakan',
                        ],
                    ]
                );
            } else {
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
            }
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


    public function getByPage($limit = 10, $page = 1, array $column = ['*'], $field, $search = '', $kelas = '')
    {
        // set key
        $key = 'siswa-get-by-page' . $limit . $page . $search . $kelas;

        // has section and key
        if ($this->cache->has(Siswa::$tags, $key)) {
            return $this->cache->get(Siswa::$tags, $key);
        }

        // query to sql
//        $organisasi = parent::getByPage($limit, $page, $column, 'nama', $search);
        if ($kelas == '' || $kelas == null) {

            $data = $this->model
                ->where('nama', 'like', '%' . $search . '%')
                ->orderBy('nama', 'asc')
                ->paginate($limit)
                ->toArray();
        } else {
            $data = $this->model
                ->where('nama', 'like', '%' . $search . '%')
                ->where('id_kelas', $kelas)
                ->orderBy('nama', 'asc')
                ->paginate($limit)
                ->toArray();
        }

        // store to cache
        $this->cache->put(Siswa::$tags, $key, $data, 10);

        return $data;
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

    public function getListByNilai($kelas, $mapel)
    {
        // set key
        $key = 'siswa-get-list-by-nilai' . $kelas . $mapel;

        // has section and key
        if ($this->cache->has(Siswa::$tags, $key)) {
            return $this->cache->get(Siswa::$tags, $key);
        }

        $cari = \DB::table('nilai')
            ->join('siswa', 'nilai.id_siswa', '=', 'siswa.id')
            ->where('nilai.id_mapel', $mapel)
            ->where('siswa.id_kelas', $kelas)
            ->select('nilai.id_siswa')
            ->get();

        // --> Convert StdClass to Array
        $result = [];
        foreach ($cari as $key => $value) {
            $result[] = $value->id_siswa;
        }

        // --> Flatenned the first array
        $siswa = [];
        $array_length = count($result);
        for ($i = 0; $i <= $array_length - 1; $i++) {
            array_push($siswa, $result[$i]);
        }

        // query to sql
        $data = $this->model
            ->where('id_kelas', $kelas)
//            ->whereNotIn('id', $siswa)
            ->whereNotIn('id', function ($q) use ($kelas, $mapel) {
                $q->join('siswa', 'nilai.id_siswa', '=', 'siswa.id')
                    ->where('nilai.id_mapel', $mapel)
                    ->where('siswa.id_kelas', $kelas)
                    ->select('nilai.id_siswa')
                    ->from('nilai');
            })
            ->get();

        // store to cache
//        $this->cache->put(Siswa::$tags, $key, $data, 10);

        return $data;
    }
}