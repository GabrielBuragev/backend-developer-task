<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => "auth.basic.once"
], function () {

    /**
     * @hideFromAPIDocumentation
     */
    Route::fallback(function () {
        return response()->json([
            'message' => "Resource not found"
        ]);
    });

    // Root-level route which will serve all notes with possibility to apply filter
    Route::get('/notes', 'API\NotesController@all');

    Route::apiResource('folder', 'API\FoldersController')->parameters([
        'folder' => 'folder_id'
    ]);

    Route::group(['prefix' => 'folder/{folder_id}', 'as' => 'folder.'], function () {
        Route::apiResource('/note', 'API\NotesController')->parameters([
            'note' => 'note_id',
        ]);
    });
});
