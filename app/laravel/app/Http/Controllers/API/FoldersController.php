<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Folder\DeleteRequest;
use App\Http\Requests\Folder\ShowRequest;
use App\Http\Requests\Folder\StoreRequest;
use App\Http\Requests\Folder\UpdateRequest;
use App\Models\Folder;
use App\User;
use Illuminate\Support\Facades\Auth;

/**
 * @authenticated
 * @group User folder management
 * 
 * APIs for managing user folders
 */
class FoldersController extends Controller
{

    /**
     * Display a listing of the folders for the authenticated user.
     * @responseFile docs/responses/folders.all.json
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        return $user->folders()->with(['notes', 'notes.noteable'])->get();
    }

    /**
     * Store a newly created folder in storage for the authenticated user.
     *
     * @bodyParam name string required The name of the folder. Example: Folder 1
     * 
     * @responseFile docs/responses/folders.post.json
     * 
     * @param  App\Http\Requests\Folder\StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $user = Auth::user();
        $folder_name = $request->name;

        $folder = Folder::create([
            'name' => $folder_name,
            'user_id' => $user->id
        ]);

        return $folder;
    }

    /**
     * Display the specified folder.
     *
     * @urlParam folder_id required The id of the folder. Example: 1
     * 
     * @responseFile docs/responses/folders.get.json
     * 
     * @param  App\Http\Requests\Folder\ShowRequest $request
     * @return \Illuminate\Http\Response
     */
    public function show(ShowRequest $request)
    {
        return Folder::with(['notes', 'notes.noteable'])->find($request->folder_id);
    }

    /**
     * Update the specified folder in storage.
     *
     * @urlParam folder_id required The id of the folder. Example: 1
     * @bodyParam name string required The name of the folder. Example: Cool Folder Name
     * 
     * @responseFile docs/responses/folders.update.json
     * 
     * @param  App\Http\Requests\Folder\UpdateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request)
    {
        $folder = Folder::find($request->folder_id);
        $folder->update($request->only(['name']));
        return $folder;
    }

    /**
     * Remove the specified folder from storage.
     *
     * @urlParam folder_id required The id of the folder. Example: 1
     * 
     * @responseFile docs/responses/folders.delete.json
     * 
     * @param  App\Http\Requests\Folder\DeleteRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRequest $request)
    {
        $folder = Folder::findOrFail($request->folder_id);
        if ($folder->notes->count())
            $folder->notes()->delete();

        $status = Folder::destroy($request->folder_id);

        return response()->json([
            'status' => $status ? 'success' : "failed"
        ]);
    }
}
