<?php
namespace App\Http\Controllers\Mixins;

use App\Models\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

trait HasFiles
{
    protected string $dirname;

    protected function replaceFile(FormRequest $request, Model $item, string $fieldName): void
    {
        if ($request->hasFile($fieldName))
        {
            $this->deleteFile($item[$fieldName]);
            $item[$fieldName] = basename($request[$fieldName]->store($this->dirname, 'public'));
        }
    }

    protected function deleteFile($file): void
    {
        if ($file !== null)
        {
            Storage::disk('public')->delete($this->dirname . '/' . $file);
        }
    }
}
