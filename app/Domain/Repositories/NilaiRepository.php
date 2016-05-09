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
use App\Domain\Entities\Siswa;
use App\Domain\Repositories\AbstractRepository;
use Illuminate\Support\Facades\Log;

class NilaiRepository extends AbstractRepository implements Crudable, Paginable
{
    protected $cache;

    public function __construct(Nilai $nilai, Cacheable $cache)
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
            $na = (0.5 * (e($data['n_tugas']))) + (0.2 * (e($data['n_uts']))) + (0.3 * (e($data['n_uas'])));
            $nilai = parent::create(
                [
                    'id_siswa' => e($data['id_siswa']),
                    'id_mapel' => e($data['id_mapel']),
                    'n_tugas'  => e($data['n_tugas']),
                    'n_uts'    => e($data['n_uts']),
                    'n_uas'    => e($data['n_uas']),
                    'n_akhir'  => $na,
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

    public function createByMengajar($id, array $data)
    {
        try {
            $mengajar = \DB::table('mengajar')->where('id', $id)->first();

            $na = (0.5 * (e($data['n_tugas']))) + (0.2 * (e($data['n_uts']))) + (0.3 * (e($data['n_uas'])));
            Siswa::create([
                    'id_kelas' => $mengajar->id_kelas,
                    'nis'      => e($data['nis']),
                    'nama'     => e($data['nama']),
                    'jk'       => e($data['jk']),
                    'agama'    => '',
                    'alamat'   => '',
                ]
            );

            $id_siswa = \DB::table('siswa')->where('nis', e($data['nis']))->first();

            $nilai = parent::create(
                [
                    'id_siswa' => $id_siswa->id,
                    'id_mapel' => $mengajar->id_mapel,
                    'n_tugas'  => e($data['n_tugas']),
                    'n_uts'    => e($data['n_uts']),
                    'n_uas'    => e($data['n_uas']),
                    'n_akhir'  => $na,
                ]
            );
            // flush cache with tags
            $this->cache->flush(Nilai::$tags);
            $this->cache->flush(Siswa::$tags);
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
            $na = (0.5 * (e($data['n_tugas']))) + (0.2 * (e($data['n_uts']))) + (0.3 * (e($data['n_uas'])));
            $nilai = parent::update($id, [
                'n_tugas' => e($data['n_tugas']),
                'n_uts'   => e($data['n_uts']),
                'n_uas'   => e($data['n_uas']),
                'n_akhir' => $na,
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


    public function getByPage($limit = 10, $page = 1, array $column = ['*'], $field, $search = '', $kelas = '')
    {
        // set key
        $key = 'nilai-get-by-page' . $limit . $page . $search . $kelas;

        // has section and key
        if ($this->cache->has(Nilai::$tags, $key)) {
            return $this->cache->get(Nilai::$tags, $key);
        }

        // query to sql
        if ($kelas == '' || $kelas == null) {
            $organisasi = $this->model
                ->join('siswa', 'nilai.id_siswa', '=', 'siswa.id')
                ->where('siswa.nama', 'like', '%' . $search . '%')
                ->select('nilai.*')
                ->orderBy('siswa.nama', 'asc')
                ->paginate($limit)
                ->toArray();
        } else {
            $organisasi = $this->model
                ->join('siswa', 'nilai.id_siswa', '=', 'siswa.id')
                ->where('siswa.nama', 'like', '%' . $search . '%')
                ->where('siswa.id_kelas', $kelas)
                ->select('nilai.*')
                ->orderBy('siswa.nama', 'asc')
                ->paginate($limit)
                ->toArray();
        }

        // store to cache
//        $this->cache->put(Nilai::$tags, $key, $organisasi, 10);

        return $organisasi;
    }

    public function getByAjar($id, $limit = 10, $page = 1, array $column = ['*'], $field, $search = '')
    {
        // set key
        $key = 'nilai-get-by-ajar-' . $id . $limit . $page . $search;

        // has section and key
        if ($this->cache->has(Nilai::$tags, $key)) {
            return $this->cache->get(Nilai::$tags, $key);
        }

        $id = \DB::table('mengajar')->where('id', $id)->first();

        // query to sql
        if ($search == null || $search == '') {
            $data = $this->model
                ->join('siswa', 'nilai.id_siswa', '=', 'siswa.id')
                ->join('mengajar', 'nilai.id_mapel', '=', 'mengajar.id_mapel')
                ->where('siswa.id_kelas', $id->id_kelas)
                ->where('nilai.id_mapel', $id->id_mapel)
                ->where('mengajar.id', $id->id)
                ->select('nilai.*', 'mengajar.id_guru')
                ->orderBy('siswa.nama', 'asc')
                ->paginate($limit)
                ->toArray();
        } else {
            $data = $this->model
                ->join('siswa', 'nilai.id_siswa', '=', 'siswa.id')
                ->join('mengajar', 'nilai.id_mapel', '=', 'mengajar.id_mapel')
                ->where('siswa.id_kelas', $id->id_kelas)
                ->where('nilai.id_mapel', $id->id_mapel)
                ->where('mengajar.id', $id->id)
                ->where('siswa.nama', 'like', '%' . $search . '%')
                ->select('nilai.*', 'mengajar.id_guru')
                ->orderBy('siswa.nama', 'asc')
                ->paginate($limit)
                ->toArray();
        }

        // store to cache
//        $this->cache->put(Nilai::$tags, $key, $organisasi, 10);

        return $data;
    }
}