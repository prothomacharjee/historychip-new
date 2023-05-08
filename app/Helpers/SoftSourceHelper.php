<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class SoftSourceHelper
{

    public static function FileUploaderHelper($request_file, $path = null, $custom_name = null)
    {
        if (!$custom_name) {
            $custom_name = time();
        }

        if (!$path) {
            $path = 'common/';
        }

        $name = $custom_name . '.' . $request_file->getClientOriginalExtension();

        // Store the file in the public directory with a custom name
        Storage::disk('public')->putFileAs($path, $request_file, $name);

        // Get the URL of the uploaded file
        return Storage::url($path . $name);
    }


    public static function MultipleFileUploaderHelper($request_files, $path = null, $custom_names = null)
    {
        if (!$path) {
            $path = 'common/';
        }

        $saved_paths = [];
        foreach ($request_files as $key => $request_file) {

            $custom_name = isset($custom_names[$key]) ? $custom_names[$key] : time()."_".$key;

            $name = $custom_name . '.' . $request_file->getClientOriginalExtension();


            // Store the file in the public directory with a custom name
            Storage::disk('public')->putFileAs($path, $request_file, $name);
            // Add the saved file path to the array of saved paths.
            $saved_paths[] = Storage::url($path . $name);
        }
        return $saved_paths;
    }

    public static function GetIntialsFromNameString($name)
    {
        $initials = '';
        $words = explode(' ', $name);
        foreach ($words as $word) {
            $initials .= strtoupper(substr($word, 0, 1));
        }
        return $initials;
    }
}
