<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

trait Common_trait
{
    public function create_unique_slug($string = '', $table = '', $field = 'slug', $col_name = null, $old_slug = null)
    {
        $slug = Str::of($string)->slug('-');
        $slug = strtolower($slug);

        $i = 0;
        $params = array();
        $params[$field] = $slug;
        if ($col_name) {
            $params["$col_name"] = "<> $old_slug";
        }

        while (DB::table($table)->where($params)->count()) {
            if (!preg_match('/-{1}[0-9]+$/', $slug)) {
                $slug .= '-' . ++$i;
            } else {
                $slug = preg_replace('/[0-9]+$/', ++$i, $slug);
            }
            $params[$field] = $slug;
        }
        return $slug;
    }

    public function fileUpload($files, $path = "", $unlinkName = "", $isMulti = false)
    {

        if (!$isMulti) {
            $fileArr[] = $files;
        } else {
            $fileArr = $files;
        }
        foreach ($fileArr as $key => $file) {
            $img_name[$key] = time() . '-' . Str::of(md5(time() . $file->getClientOriginalName()))->substr(0, 50) . '.' . $file->extension();

            $file->storeAs($path, $img_name[$key]);
            if ($unlinkName) {
                $this->unlinkFile($path . $unlinkName);
            }
        }

        if (!$isMulti) {
            $img_name = $img_name[0];
        }

        return $img_name;
    }

    public function unlinkFile($file)
    {
        $file = public_path($file);
        if (file_exists($file)) {
            unlink($file);
        }
    }
}
