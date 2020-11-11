<?php


namespace App\Controllers;


use App\Lib\Request;
use App\Lib\Response;
use App\Models\Kategori;
use App\Models\Penulis;

class PenulisController
{
    /**
     * @OA\Get(
     *   path="/penulis",
     *   summary="list penulis",
     *  tags={"Penulis"},
     *   @OA\Response(
     *     response=200,
     *     description="List All Penulis",
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
        $penulis = Penulis::all();
        return $response->toJSON($penulis);
    }

    /**
     * @OA\Get(
     *   path="/penulis/{id}",
     *   summary="show penulis",
     *  tags={"Penulis"},
     *   @OA\Response(
     *     response=200,
     *     description="Detail penulis",
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
        $penulis = Penulis::find($id);
        return $response->toJSON($penulis);
    }

    /**
     * @OA\Post(
     * path="/penulis",
     * summary="Create Penulis",
     * description="Create Penulis",
     *  tags={"Penulis"},
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
            Penulis::create($attributes);
            return $response->toJSON([
                'success' => 'Berhasil simpan penulis'
            ]);
        }catch (\Exception $e){
            return $response->toJSON([
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * @OA\Delete (
     *   path="/penulis/{id}",
     *   summary="delete penulis",
     *  tags={"Penulis"},
     *   @OA\Response(
     *     response=200,
     *     description="Delete penulis",
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
            Penulis::find($id)->delete();
            return $response->toJSON([
                'success' => 'Berhasil delete penulis'
            ]);
        }catch (\Exception $e){
            return $response->toJSON([
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * @OA\Put  (
     *   path="/penulis/{id}",
     *   summary="update penulis",
     *  tags={"Penulis"},
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
            Penulis::find($id)->update($attributes);
            return $response->toJSON([
                'success' => 'Berhasil update penulis'
            ]);
        }catch (\Exception $e){
            return $response->toJSON([
                'error' => $e->getMessage()
            ]);
        }
    }
}