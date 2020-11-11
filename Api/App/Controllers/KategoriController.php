<?php


namespace App\Controllers;

use App\Lib\Request;
use App\Lib\Response;
use App\Models\Kategori;

class KategoriController
{
    /**
     * @OA\Get(
     *   path="/kategori",
     *   summary="list kategori",
     *  tags={"Kategori"},
     *   @OA\Response(
     *     response=200,
     *     description="List All Kategory",
     *    @OA\JsonContent()
     *   ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Unauthorized")
     *        )
     *     )
     * )
     * @param $request
     * @return Response
     */
    public function all(Response $response)
    {
        $kategori = Kategori::all();
        return $response->toJSON($kategori);
    }

    /**
     * @OA\Get(
     *   path="/kategori/{id}",
     *   summary="show kategori",
     *  tags={"Kategori"},
     *   @OA\Response(
     *     response=200,
     *     description="Detail kategori",
     *    @OA\JsonContent()
     *   ),
     *     @OA\Parameter(
     *         description="ID of calibration to return",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *           type="integer",
     *           format="int64"
     *         )
     *     ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Unauthorized")
     *        )
     *     )
     * )
     * @param $request
     * @return Response
     */
    public function find(Response $response, $id)
    {
        $kategori = Kategori::find($id);
        return $response->toJSON($kategori);
    }

    /**
     * @OA\Post(
     * path="/kategori",
     * summary="Create Kategori",
     * description="Create Kategori",
     *  tags={"Kategori"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass user credentials",
     *    @OA\JsonContent(
     *       required={"name"},
     *       @OA\Property(property="name", type="string", format="text", example="Sejarah"),
     *    ),
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Unauthorized")
     *        )
     *     )
     * )
     * @param Request $request
     * @param Response $response
     * @return Response
     */

    public function store(Request $request, Response $response)
    {
        $attributes = $request->getJson();
        try {
            Kategori::create($attributes);
            return $response->toJSON([
                'success' => 'Berhasil simpan kategori'
            ]);
        }catch (\Exception $e){
            return $response->toJSON([
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * @OA\Delete (
     *   path="/kategori/{id}",
     *   summary="delete kategori",
     *  tags={"Kategori"},
     *   @OA\Response(
     *     response=200,
     *     description="Delete kategori",
     *    @OA\JsonContent()
     *   ),
     *     @OA\Parameter(
     *         description="ID of calibration to return",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *           type="integer",
     *           format="int64"
     *         )
     *     ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Unauthorized")
     *        )
     *     )
     * )
     * @param Response $response
     * @param $id
     * @return Response
     */
    public function delete(Response $response, $id)
    {
        try {
            Kategori::find($id)->delete();
            return $response->toJSON([
                'success' => 'Berhasil delete kategori'
            ]);
        }catch (\Exception $e){
            return $response->toJSON([
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * @OA\Put  (
     *   path="/kategori/{id}",
     *   summary="update kategori",
     *  tags={"Kategori"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass user credentials",
     *    @OA\JsonContent(
     *       required={"name"},
     *       @OA\Property(property="name", type="string", format="text", example="Sejarah"),
     *    ),
     * ),
     *   @OA\Response(
     *     response=200,
     *     description="Delete kategori",
     *    @OA\JsonContent()
     *   ),
     *     @OA\Parameter(
     *         description="ID of calibration to return",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *           type="integer",
     *           format="int64"
     *         )
     *     ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Unauthorized")
     *        )
     *     )
     * )
     * @param Request $request
     * @param Response $response
     * @param $id
     * @return Response
     */
    public function update(Request $request, Response $response, $id)
    {
        try {
            $attributes = $request->getJson();
            Kategori::find($id)->update($attributes);
            return $response->toJSON([
                'success' => 'Berhasil update kategori'
            ]);
        }catch (\Exception $e){
            return $response->toJSON([
                'error' => $e->getMessage()
            ]);
        }
    }
}