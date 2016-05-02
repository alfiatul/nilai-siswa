<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 21/04/2016
 * Time: 13:25
 */

namespace App\Http\Controllers;


use App\Domain\Repositories\SiswaRepository;
use App\Http\Requests\SiswaRequest;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    protected $siswa;

    public function __construct(SiswaRepository $siswa)
    {
        $this->siswa = $siswa;
    }

    public function index(Request $request)
    {
        return $this->siswa->getByPage(10, $request->input('page'), $column = ['*'], $key = '', $request->input('term'));
    }

    public function store(SiswaRequest $request)
    {
        return $this->siswa->create($request->all());
    }

    public function show($id)
    {
        return $this->siswa->find($id);
    }

    public function update(SiswaRequest $request, $id)
    {
        return $this->siswa->update($id, $request->all());
    }

    public function destroy($id)
    {
        return $this->siswa->delete($id);
    }

    public function getList()
    {
        return $this->siswa->getList();
    }

    public function getListBykelas($id)
    {
        return $this->siswa->getListBykelas($id);
    }
}