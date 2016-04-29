<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22/04/2016
 * Time: 11:10
 */

namespace App\Http\Controllers;


use App\Domain\Repositories\JurusanRepository;
use App\Http\Requests\JurusanRequest;
use Illuminate\Http\Request;

class JurusanController extends Controller
{

    protected $jurusan;


    public function __construct(JurusanRepository $jurusan)
    {
        $this->jurusan = $jurusan;
    }


    public function index(Request $request)
    {
        return $this->jurusan->getByPage(10, $request->input('page'), $column = ['*'], $key = '', $request->input('term'));
    }

    public function store(JurusanRequest $request)
    {
        return $this->jurusan->create($request->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->jurusan->find($id);
    }


    public function update(JurusanRequest $request, $id)
    {
        return $this->jurusan->update($id, $request->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->jurusan->delete($id);
    }

    public function getList()
    {
        return $this->jurusan->getList();
    }
}