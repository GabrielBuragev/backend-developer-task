<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Note\DeleteRequest;
use App\Http\Requests\Note\ShowRequest;
use App\Http\Requests\Note\StoreRequest;
use App\Http\Requests\Note\UpdatePartialRequest;
use App\Http\Requests\Note\UpdateRequest;
use App\Models\Note;
use App\Repository\Eloquent\NoteListRepository;
use App\Repository\Eloquent\NoteTextRepository;
use App\User;
use Illuminate\Support\Facades\Auth;

/**
 * @authenticated
 * @group User notes management
 * 
 * APIs for managing user notes
 */
class NotesController extends Controller
{

    public function __construct(NoteTextRepository $noteTextRepository, NoteListRepository $noteListRepository)
    {
        $this->noteTextRepository = $noteTextRepository;
        $this->noteListRepository = $noteListRepository;
    }

    /**
     * Display a listing of the notes independent of authenticated user.
     * Its sole purpose is to demonstrate the "Filtering" > "By note folder" implementation
     *
     * @queryParam folder_id Apply filter by folder id.
     * @queryParam sort Apply sorting using any of the following values: ['name_asc', 'name_desc', 'shared_first', 'shared_last']. Example: name_asc
     * @queryParam query Apply filter by note text content. Example: a
     * @queryParam shared Apply filter by note visibility. Example: 1
     * @queryParam per_page Apply pagination limitation for number of displayed elements on one page. Example: 10
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        $notes = Note::with('noteable');
        $folder_id = $request->input('folder_id');
        $sort = $request->input('sort');
        $query = $request->input('query');
        $shared = $request->input('shared');
        $per_page = $request->input('per_page');

        // Apply sorting
        if ($sort != null) {
            $notes = $notes->sortBy($sort);
        }
        // Apply filtering
        if ($folder_id) {
            $notes->whereFolderId($folder_id);
        }
        if ($query != null) {
            $notes = $notes->filterByText($query);
        }
        if ($shared != null) {
            $notes = $notes->shared($shared);
        }

        return $notes->paginate($per_page ? $per_page : 25);
    }

    /**
     * Display a listing of the notes for authenticated user.
     * 
     * @urlParam folder_id required The id of the folder. Example: 1
     * @queryParam sort  Apply sorting using any of the following values: ['name_asc', 'name_desc', 'shared_first', 'shared_last']. Example: name_asc
     * @queryParam query  Apply filter by note text content. Example: a
     * @queryParam shared  Apply filter by note visibility. Example: 1
     * @queryParam per_page  Apply pagination limitation for number of displayed elements on one page. Example: 10
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $notes = $user->notes()->with('noteable')->whereFolderId($request->folder_id);
        $sort = $request->input('sort');
        $query = $request->input('query');
        $shared = $request->input('shared');
        $per_page = $request->input('per_page');

        // Apply sorting
        if ($sort != null) {
            $notes = $notes->sortBy($sort);
        }
        // Apply filtering
        if ($query != null) {
            $notes = $notes->filterByText($query);
        }
        if ($shared != null) {
            $notes = $notes->shared($shared);
        }

        return $notes->paginate($per_page ? $per_page : 25);
    }

    /**
     * Display the specified note.
     * 
     * @urlParam folder_id required The id of the folder. Example: 1
     * @urlParam note_id required The id of the note. Example: 1
     * 
     * @param  App\Http\Requests\Note\ShowRequest $requesusing any of the following values : ['name_asc', 'name_desc']t
     * @return \Illuminate\Http\Response
     */
    public function show(ShowRequest $request)
    {
        return Note::with('noteable')->find($request->note_id);
    }

    /**
     * Remove the specified note from storage.
     * 
     * @urlParam folder_id required The id of the folder. Example: 1
     * @urlParam note_id required The id of the note. Example: 1
     * 
     * @param  App\Http\Requests\Note\DeleteRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRequest $request)
    {
        $note = Note::find($request->note_id);
        if ($note->noteable()->count())
            $note->noteable()->delete();

        $status = Note::destroy($note->id);

        return response()->json([
            'status' => $status ? 'success' : "failed"
        ]);
    }

    /**
     * Store a newly created note in storage.
     * 
     * @urlParam folder_id required The id of the folder. Example: 1
     * @bodyParam name string required The name of the note. Example: My note name
     * @bodyParam is_public integer The visibility status of the note, <b>default: false</b>. Example: 1
     * @bodyParam noteable object required Object which holds note content data
     * 
     * 
     * @param  App\Http\Requests\Note\StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $content_model = null;

        if ($request->input('noteable_type') == 'text')
            $content_model = $this->noteTextRepository->create($request->input());
        else if ($request->input('noteable_type') == 'list')
            $content_model = $this->noteListRepository->create($request->input());

        $note = Note::create(
            array_merge(
                $request->only(['name', 'is_public']),
                ["folder_id" => $request->folder_id]
            )
        );

        if ($content_model)
            $content_model->note()->save($note);

        return Note::with('noteable')->find($note->id);
    }

    /**
     * Partially update the specified note in storage.
     *
     * @urlParam folder_id required The id of the folder. Example: 1
     * @urlParam note_id required The id of the note. Example: 1
     * @bodyParam name string The name of the note. 
     * @bodyParam is_public integer The visibility status of the note. Example: 1
     * 
     * @param  App\Http\Requests\Note\UpdateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function updatePartial(UpdatePartialRequest $request)
    {
        $note = Note::find($request->note_id);
        $status = $note->update($request->only(['name', 'is_public']));

        return response()->json([
            'status' => $status ? 'success' : 'failed'
        ]);
    }

    /**
     * Update the specified note in storage.
     *
     * @urlParam folder_id required The id of the folder. Example: 1
     * @urlParam id required The id of the note. Example: 1
     * @bodyParam name string The name of the note. 
     * @bodyParam is_public integer The visibility status of the note. Example: 1
     * 
     * @param  App\Http\Requests\Note\UpdateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request)
    {

        $note = Note::find($request->note_id);

        if ($note->noteable_type == 'text')
            $this->noteTextRepository->update($note->noteable_id, $request->input());
        else if ($note->noteable_type == 'list')
            $this->noteListRepository->update($note->noteable_id, $request->input());

        $note->update($request->only(['name', 'is_public']));

        return Note::with('noteable')->find($request->note_id);
    }
}
