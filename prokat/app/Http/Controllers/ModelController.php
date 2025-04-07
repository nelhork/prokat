<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchModelRequest;
use App\Http\Requests\StoreModel;
use App\Models\ProkatModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ModelController extends BaseController
{
    public function index()
    {
        return view('models.index', ['models' => ProkatModel::all()]);
    }

    public function create()
    {
        return view('models.create', ['model' => new ProkatModel()]);
    }

    public function store(StoreModel $request)
    {
        ProkatModel::create(['comment' => $request['comment'], 'name' => $request['name'], 'type' => $request['type'],
            'photo1' => $request['photo1'], 'photo2' => $request['photo2'], 'photo3' => $request['photo3'], 'video1' => $request['video1'],
            'video2' => $request['video2'], 'video3' => $request['video3'], 'description1' => $request['description1'],
            'description2' => $request['description2'], 'description3' => $request['description3']]);

        return redirect()->route('models.index');
    }

    public function edit(ProkatModel $model)
    {
        return view('models.edit', ['model' => $model]);
    }

    public function update(ProkatModel $model, StoreModel $request)
    {
        $model['comment'] = $request['comment'];
        $model['name'] = $request['name'];
        $model['type'] = $request['type'];
        $model['photo1'] = $request['photo1'];
        $model['photo2'] = $request['photo2'];
        $model['photo3'] = $request['photo3'];
        $model['video1'] = $request['video1'];
        $model['video2'] = $request['video2'];
        $model['video3'] = $request['video3'];
        $model['description1'] = $request['description1'];
        $model['description2'] = $request['description2'];
        $model['description3'] = $request['description3'];

        $model->save();

        return redirect()->route('models.index');
    }

    public function destroy(ProkatModel $model)
    {
        $model->delete();

        return redirect()->route('models.index');
    }

    public function search(SearchModelRequest $request)
    {
        return response()->json([
            'models' => ProkatModel::whereRaw("name ilike ?", ['%' . $request['name'] . '%'])->limit(5)->get()
        ]);
    }
}
