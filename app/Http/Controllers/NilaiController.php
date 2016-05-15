<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 21/04/2016
 * Time: 15:37
 */

namespace App\Http\Controllers;


use App\Domain\Repositories\NilaiRepository;
use App\Http\Requests\NilaiRequest;
use Illuminate\Http\Request;

/**
 * Class NilaiController
 * @package App\Http\Controllers
 */
class NilaiController extends Controller
{
    /**
     * @var NilaiRepository
     */
    protected $nilai;

    /**
     * NilaiController constructor.
     * @param NilaiRepository $nilai
     */
    public function __construct(NilaiRepository $nilai)
    {
        $this->nilai = $nilai;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        return $this->nilai->getByPage(10, $request->input('page'), $column = ['*'], $key = '', $request->input('term'), $request->input('kelas'), $request->input('mapel'));
//        return 'index';
    }

    /**
     * @param NilaiRequest $request
     * @return mixed
     */
    public function store(NilaiRequest $request)
    {
        return $this->nilai->create($request->all());
    }

    public function createByMengajar($id, NilaiRequest $request)
    {
        return $this->nilai->createByMengajar($id, $request->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->nilai->find($id);
    }

    /**
     * @param NilaiRequest $request
     * @param $id
     * @return mixed
     */
    public function update(NilaiRequest $request, $id)
    {
        return $this->nilai->update($id, $request->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->nilai->delete($id);
    }

    public function getByAjar($id, Request $request)
    {
        return $this->nilai->getByAjar($id, 10, $request->input('page'), $column = ['*'], $key = '', $request->input('term'));
    }
}