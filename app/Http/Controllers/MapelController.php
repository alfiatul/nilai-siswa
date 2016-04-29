<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22/04/2016
 * Time: 10:39
 */

namespace App\Http\Controllers;


use App\Domain\Repositories\MapelRepository;
use App\Http\Requests\MapelRequest;
use Illuminate\Http\Request;


class MapelController extends Controller
{
    /**
     * @var GuruRepository
     */
    protected $mapel;

    /**
     * GuruController constructor.
     * @param GuruRepository $guru
     */
    public function __construct(MapelRepository $mapel)
    {
        $this->mapel = $mapel;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        return $this->mapel->getByPage(10, $request->input('page'), $column = ['*'], $key = '', $request->input('term'));
    }

    /**
     * @param GuruRequest $request
     * @return mixed
     */
    public function store(MapelRequest $request)
    {
        return $this->mapel->create($request->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->mapel->find($id);
    }


    public function update(MapelRequest $request, $id)
    {
        return $this->mapel->update($id, $request->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->mapel->delete($id);
    }

    public function getList()
    {
        return $this->mapel->getList();
    }
}