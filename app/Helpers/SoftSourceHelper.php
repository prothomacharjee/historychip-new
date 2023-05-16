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

            $custom_name = isset($custom_names[$key]) ? $custom_names[$key] : time() . "_" . $key;

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

    public static function SaveImageBYFileUploader($request)
    {
        $path = 'frontend/stories/images/';
        foreach ($_FILES as $file_name => $value) {
            $file_name;
            // $dir = realpath($path);
            // dd($dir);
            $result = "";
            $valid_formats = array("jpg", "png", "gif", "bmp", "jpeg", "jfif");
            if (isset($_FILES[$file_name]['name'])) {
                $name = $_FILES[$file_name]['name'];
                $size = $_FILES[$file_name]['size'];
                if (strlen($name)) {

                    $extion_array = explode(".", $_POST['name']);
                    $ext = $extion_array[count($extion_array) - 1];
                    if (in_array(strtolower($ext), $valid_formats)) {

                        if ($size < (10 * 1024 * 1024)) {
                            $actual_image_name = uniqid() . "_" . rand(10, 100000) . "." . $ext;
                            $tmp = $_FILES[$file_name]['tmp_name'];
                            // move_uploaded_file($tmp, $dir . '/' . $actual_image_name)
                            if (Storage::disk('public')->putFileAs($path, $tmp, $actual_image_name) != false) {
                                $result = $actual_image_name;
                                echo json_encode(array(
                                    "hasWarnings" => false,
                                    "isSuccess" => true,
                                    "warnings" => [],
                                    "files" => $_FILES,
                                    "name" => $result,
                                    "path" => Storage::url($path . $result),
                                ));
                            } else {
                                header("HTTP/1.1 500");
                                if ($_FILES["audio_file_front"]["error"] == 1) {
                                    $error = "The uploaded file exceeds the upload_max_filesize";
                                } else if ($_FILES["audio_file_front"]["error"] == 2) {
                                    $error = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.";
                                } else if ($_FILES["audio_file_front"]["error"] == 3) {
                                    $error = "The uploaded file was only partially uploaded.";
                                } else if ($_FILES["audio_file_front"]["error"] == 4) {
                                    $error = "No file was uploaded.";
                                } else if ($_FILES["audio_file_front"]["error"] == 6) {
                                    $error = "Missing a temporary folder.";
                                } else if ($_FILES["audio_file_front"]["error"] == 7) {
                                    $error = "Failed to write file to disk.";
                                } else if ($_FILES["audio_file_front"]["error"] == 1) {
                                    $error = "A PHP extension stopped the file upload. PHP does not provide a way to ascertain which extension caused the file upload to stop;";
                                } else {
                                    $error = "Error";
                                }

                                echo json_encode(array("hasWarnings" => true, "isSuccess" => false, "warnings" => [$error]));
                            }
                        } else {
                            header("HTTP/1.1 500");
                            echo json_encode(array("hasWarnings" => true, "isSuccess" => false, "warnings" => ["The maximum file size allowed 2 MB"]));
                        }
                    } else {
                        header("HTTP/1.1 500");
                        echo json_encode(array("hasWarnings" => true, "isSuccess" => false, "warnings" => ["Only .jpg, .png, .svg, .jpeg, .gif file types are allowed"]));
                    }
                } else {
                    header("HTTP/1.1 500");
                    echo json_encode(array("hasWarnings" => true, "isSuccess" => false, "warnings" => ["No file found"]));
                }
            } else {
                header("HTTP/1.1 500");
                echo json_encode(array("hasWarnings" => true, "isSuccess" => false, "warnings" => ["No file found"]));
            }
        }
    }

    public static function DeleteImageBYFileUploader($filename)
    {
        $path ='frontend/stories/images/';

        // unlink(realpath($path) . "/" . $file);

        $publicDisk = Storage::disk('public');

        if ($publicDisk->exists($path.$filename)) { // check if the file exists
            $publicDisk->delete($path.$filename); // delete the file
        }
    }

    public static function SaveAudioBYFileUploader(Request $request) {
        $path = 'frontend/stories/audio-videos/';
        // $dir = realpath($path);
        $valid_formats = array("mp3", "mp4");
        if (isset($_FILES['audio_file_front']['name'])) {
            $name = $_FILES['audio_file_front']['name'];
            $size = $_FILES['audio_file_front']['size'];
            if (strlen($name)) {
                $extion_array = explode(".", $name);
                $ext = $extion_array[count($extion_array) - 1];
                if (in_array(strtolower($ext), $valid_formats)) {
                    if ($size < (10 * (1024 * 1024))) {
                        $actual_image_name = uniqid() . "_" . rand(10, 100000) . "." . $ext;
                        $tmp = $_FILES['audio_file_front']['tmp_name'];
                        if (Storage::disk('public')->putFileAs($path, $tmp, $actual_image_name) != false) {
                            $result = $actual_image_name;
                            echo json_encode(array(
                                "filename" => $result,
                                "path" => Storage::url($path . $result)));
                        } else {
                            header("HTTP/1.1 500");
                            if ($_FILES["audio_file_front"]["error"] == 1) {
                                $error = "The uploaded file exceeds the upload_max_filesize";
                            } else if ($_FILES["audio_file_front"]["error"] == 2) {
                                $error = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.";
                            } else if ($_FILES["audio_file_front"]["error"] == 3) {
                                $error = "The uploaded file was only partially uploaded.";
                            } else if ($_FILES["audio_file_front"]["error"] == 4) {
                                $error = "No file was uploaded.";
                            } else if ($_FILES["audio_file_front"]["error"] == 6) {
                                $error = "Missing a temporary folder.";
                            } else if ($_FILES["audio_file_front"]["error"] == 7) {
                                $error = "Failed to write file to disk.";
                            } else if ($_FILES["audio_file_front"]["error"] == 1) {
                                $error = "A PHP extension stopped the file upload. PHP does not provide a way to ascertain which extension caused the file upload to stop;";
                            } else {
                                $error = "Error";
                            }

                            echo json_encode(array("hasWarnings" => true, "isSuccess" => false, "warnings" => [$error]));
                        }
                    } else {
                        header("HTTP/1.1 500");
                        echo json_encode(array("hasWarnings" => true, "isSuccess" => false, "warnings" => ["The maximum file size allowed 10 MB"]));
                    }
                } else {
                    header("HTTP/1.1 500");
                    echo json_encode(array("hasWarnings" => true, "isSuccess" => false, "warnings" => ["Only .mp3, .mp4 file types are allowed"]));
                }
            } else {
                header("HTTP/1.1 500");
                echo json_encode(array("hasWarnings" => true, "isSuccess" => false, "warnings" => ["No file found"]));
            }
        } else {
            header("HTTP/1.1 500");
            echo json_encode(array("hasWarnings" => true, "isSuccess" => false, "warnings" => ["No file found"]));
        }
    }

    public static function DeleteAudioBYFileUploader($filename) {

        $path ='frontend/stories/audio-videos/';

        $publicDisk = Storage::disk('public');

        if ($publicDisk->exists($path.$filename)) { // check if the file exists
            $publicDisk->delete($path.$filename); // delete the file
        }
    }
}
