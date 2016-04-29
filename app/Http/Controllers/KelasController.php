<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22/04/2016
 * Time: 10:09
 */

namespace App\Http\Controllers;


use App\Domain\Repositories\KelasRepository;
use App\Http\Requests\KelasRequest;
use Illuminate\Http\Request;

class KelasController extends Controller
{

    protected $kelas;


    public function __construct(KelasRepository $kelas)
    {
        $this->kelas = $kelas;
    }

    public function index(Request $request)
    {
        return $this->kelas->getByPage(10, $request->input('page'), $column = ['*'], $key = '', $request->input('term'));
    }

    public function store(KelasRequest $request)
    {
        return $this->kelas->create($request->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->kelas->find($id);
    }


    public function update(KelasRequest $request, $id)
    {
        return $this->kelas->update($id, $request->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->kelas->delete($id);
    }

    public function getList()
    {
        return $this->kelas->getList();
    }
}