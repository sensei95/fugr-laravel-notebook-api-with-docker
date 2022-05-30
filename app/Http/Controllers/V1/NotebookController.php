<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNotebookRequest;
use App\Http\Requests\UpdateNotebookRequest;
use App\Http\Resources\V1\NotebookResource;
use App\Models\Notebook;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class NotebookController extends Controller
{
    /**
     * Display a listing of the resource.
     * @OA\Get(
     *      path="/api/v1/notebook",
     *      operationId="getNotebookList",
     *      tags={"Notebook"},
     *      summary="Get list of notebooks",
     *      description="Returns list of notebooks",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/NotebookResource")
     *       ),
     *     )
     *
     *
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return NotebookResource::collection(Notebook::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @OA\Post(
     *      path="/api/v1/notebook",
     *      operationId="storeNotebook",
     *      tags={"Notebook"},
     *      summary="Store new notebook",
     *      description="Returns notebook data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreNotebookRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/NotebookResource")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     * )
     *
     * @param StoreNotebookRequest $request
     * @return NotebookResource
     */
    public function store(StoreNotebookRequest $request)
    {
        return new NotebookResource(Notebook::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @OA\Get(
     *      path="/api/v1/notebook/{notebook}",
     *      operationId="getNotebookById",
     *      tags={"Notebook"},
     *      summary="Get notebook information",
     *      description="Returns notebook data",
     *      @OA\Parameter(
     *          name="notebook",
     *          description="Notebook id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/NotebookResource")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     * )
     *
     * @param Notebook $notebook
     * @return NotebookResource
     */
    public function show(Notebook $notebook)
    {
        return new NotebookResource($notebook);
    }

    /**
     * Update the specified resource in storage.
     *
     * @OA\Put(
     *      path="/api/v1/notebook/{notebook}",
     *      operationId="updateNotebook",
     *      tags={"Notebook"},
     *      summary="Update existing notebook",
     *      description="Returns updated notebook data",
     *      @OA\Parameter(
     *          name="notebook",
     *          description="Notebook id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateNotebookRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/NotebookResource")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     *
     *
     * @param UpdateNotebookRequest $request
     * @param Notebook $notebook
     * @return NotebookResource
     */
    public function update(UpdateNotebookRequest $request, Notebook $notebook)
    {
        $notebook->update($request->validated());

        return new NotebookResource($notebook);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @OA\Delete(
     *      path="/api/v1/notebook/{notebook}",
     *      operationId="deleteNotebook",
     *      tags={"Notebook"},
     *      summary="Delete existing notebook",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="notebook",
     *          description="Notebook id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     *
     * @param Notebook $notebook
     * @return JsonResponse
     */
    public function destroy(Notebook $notebook)
    {
        $notebook->delete();
        return new JsonResponse('',200);
    }
}