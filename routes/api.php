<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Studios
    Route::apiResource('studios', 'StudiosApiController');

    // Events
    Route::apiResource('events', 'EventsApiController');
});
