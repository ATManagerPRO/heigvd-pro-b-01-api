<?php

namespace App\Http\Controllers;

use App\CustomHelpers\APIHelper;
use App\CustomHelpers\JSONResponseHelper;
use App\Tag;
use App\Todo;
use App\TodoList;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    /**
     * Creates a new todo and associates tags
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) {
        // Fetch our custom helpers
        $APIHelper = new APIHelper();
        $JSONResponseHelper = new JSONResponseHelper();

        // Fetch the user corresponding to the request's API token
        $connectedUser = $APIHelper->getUserByTokenAPI($request);

        // User unauthorized (i.e. wrong API token)
        if(empty($connectedUser)) {
            return $JSONResponseHelper->unauthorizedJSONResponse();
        } else {
            try {

                $todoList = TodoList::find($request->input('todo_list_id'));

                $todo = new Todo();
                $todo->title = $request->input('title');
                $todo->details = $request->input('details', null);
                $todo->interval_id = $request->input('interval_id', null); // TODO use label instead of id
                $todo->intervalValue = $request->input('intervalValue', null);
                $todo->intervalEndDate = $request->input('intervalEndDate', null);
                $todo->favorite = 0;
                $todo->dueDate = $request->input('dueDate', null);
                $todo->reminderDateTime = $request->input('reminderDateTime', null);
                $todo->todoList()->associate($todoList);

                $todo->save();

                // Associate all given tags which must exist
                $tags = $request->input('tags');
                foreach($tags as $tagLabel) {
                    $tag = Tag::select('id')->where('label', $tagLabel)->where('user_id', $connectedUser['id'])->first();
                    $todo->tags()->attach($tag);
                }

                //Success
                // Retrieve created item once again in order to get all fields as well as its tags
                return $JSONResponseHelper->createdJSONResponse(Todo::where('id', $todo['id'])->with('tags')->get());
            }catch(\Exception $e){
                // Error
                return $JSONResponseHelper->badRequestJSONResponse();
            }
        }
    }
}
