<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 21/04/2016
 * Time: 11:18
 */

namespace App\Http\Controllers;

use App\Domain\Repositories\GuruRepository;
use App\Http\Requests\GuruRequest;
use Illuminate\Http\Request;

/**
 * Class GuruController
 * @package App\Http\Controllers
 */
class GuruController extends Controller
{
    /**
     * @var GuruRepository
     */
    protected $guru;

    /**
     * GuruController constructor.
     * @param GuruRepository $guru
     */
    public function __construct(GuruRepository $guru)
    {
        $this->guru = $guru;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        return $this->guru->getByPage(10, $request->input('page'), $column = ['*'], $key = '', $request->input('term'));
    }

    /**
     * @param GuruRequest $request
     * @return mixed
     */
    public function store(GuruRequest $request)
    {
        return $this->guru->create($request->all());
//        return $request->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->guru->find($id);
    }

    /**
     * @param GuruRequest $request
     * @param $id
     * @return mixed
     */
    public function update(GuruRequest $request, $id)
    {
        return $this->guru->update($id, $request->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->guru->delete($id);
    }

    public function getList()
    {
        return $this->guru->getList();
    }
}