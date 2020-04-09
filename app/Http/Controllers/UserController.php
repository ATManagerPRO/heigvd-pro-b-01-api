<?php

namespace App\Http\Controllers;

use App\Folder;
use App\TodoList;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a JSON listing all todolists linked to a specific user.
     * The json will display at the beginning all todolists without folder
     * and after, all user's folder with their linked todolists
     *
     * @return array jsonArray
     */
    public function todolists($id)
    {
        $todolistsWithoutFolder = TodoList::where(['user_id' => $id, 'folder_id' => null])->get();
        $foldersContainsTodolists = Folder::where('user_id', $id)->with("todolist")->get();

        $array = [
            "todolists" => $todolistsWithoutFolder,
            "folders" => $foldersContainsTodolists,
        ];

        return $array;
    }
}
