<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Repository\DataRepository;

class DataController extends UserController
{
    public function index()
    {
        dd(__METHOD__);
    }


    public function create()
    {
        dd(__METHOD__);
    }


    public function store(Request $request)
    {
        $current_path = $this->current_path;

        if (!$request->title or !$request->note) {
            return redirect('/')->withErrors('Не заполнены обязательные поля для добавления')->withInput();
        }
        $repository = new DataRepository();
        $id = $repository->addData($request->title, $request->note);
        $result = $repository->getData($id);
        return view('detail', compact('result','current_path'));
    }


    public function show($id)
    {
        $current_path = $this->current_path;

        $repository = new DataRepository();
        $result = $repository->getData($id);
        return view('detail', compact('result','current_path'));
    }


    public function edit($id)
    {
        $current_path = $this->current_path;

        $repository = new DataRepository();
        $result = $repository->getData($id);
        return view('edit', compact('result','current_path'));
    }


    public function update(Request $request, $id)
    {
        $current_path = $this->current_path;

        $repository = new DataRepository();
        $repository->addData($request->title, $request->note, $id);
        $result = $repository->getData($id);
        return view('detail', compact('result','current_path'));
    }


    public function destroy($id)
    {
        $repository = new DataRepository();
        $repository->deleteData($id);
        return view('home');
    }
}
