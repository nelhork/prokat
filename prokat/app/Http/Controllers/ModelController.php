<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Mixins\HasFiles;
use App\Http\Requests\SearchModelRequest;
use App\Http\Requests\StoreModel;
use App\Models\ProkatModel;
use http\Env\Request;

class ModelController extends BaseController
{
    use HasFiles;

    public function __construct()
    {
        $this->dirname = 'models';
    }

    public function index()
    {
        return view('models.index', ['models' => ProkatModel::paginate()]);
    }

    public function create()
    {
        return view('models.create', ['model' => new ProkatModel()]);
    }

    private function storeFile(StoreModel $request, string $key)
    {
        return $request->hasFile($key) ? $request[$key]->store('models', 'public') : null;
    }

    public function store(StoreModel $request)
    {
        $photo1Path = $this->storeFile($request, 'photo1');
        $photo2Path = $this->storeFile($request, 'photo2');
        $photo3Path = $this->storeFile($request, 'photo3');
        $video1Path = $this->storeFile($request, 'video1');
        $video2Path = $this->storeFile($request, 'video2');
        $video3Path = $this->storeFile($request, 'video3');

        ProkatModel::create([
            'comment' => $request['comment'],
            'name' => $request['name'],
            'type' => $request['type'],
            'photo1' => basename($photo1Path),
            'photo2' => basename($photo2Path),
            'photo3' => basename($photo3Path),
            'video1' => basename($video1Path),
            'video2' => basename($video2Path),
            'video3' => basename($video3Path),
            'description1' => $request['description1'],
            'description2' => $request['description2'],
            'description3' => $request['description3']
        ]);

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
        $this->replaceFile($request, $model, 'photo1');
        $this->replaceFile($request, $model, 'photo2');
        $this->replaceFile($request, $model, 'photo3');
        $this->replaceFile($request, $model, 'video1');
        $this->replaceFile($request, $model, 'video2');
        $this->replaceFile($request, $model, 'video3');
        $model['description1'] = $request['description1'];
        $model['description2'] = $request['description2'];
        $model['description3'] = $request['description3'];

        $model->save();

        return redirect()->route('models.index');
    }

    public function destroy(ProkatModel $model)
    {
        $this->deleteFile($model['photo1']);
        $this->deleteFile($model['photo2']);
        $this->deleteFile($model['photo3']);
        $this->deleteFile($model['video1']);
        $this->deleteFile($model['video2']);
        $this->deleteFile($model['video3']);

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
