<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 03/05/2016
 * Time: 14:53
 */

namespace App\Http\Controllers;


use App\Domain\Repositories\MengajarRepository;
use App\Http\Requests\MengajarRequest;
use Illuminate\Http\Request;

class MengajarController extends Controller
{
    protected $mengajar;
    public function __construct(MengajarRepository $mengajar)
    {
        $this->mengajar = $mengajar;
    }

    public function index(Request $request)
    {
        return $this->mengajar->getByPage(10, $request->input('page'), $column = ['*'], $key = '', $request->input('term'));
    }
    public function store(MengajarRequest $request)
    {
        return $this->mengajar->create($request->all());
    }

    public function show($id)
    {
        return $this->mengajar->find($id);
    }

    public function update(MengajarRequest $request, $id)
    {
        return $this->mengajar->update($id, $request->all());
    }

    public function destroy($id)
    {
        return $this->mengajar->delete($id);
    }

    public function getList()
    {
        return $this->mengajar->getList();
    }




}