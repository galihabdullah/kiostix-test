<?php


namespace App\Controllers;


use App\Lib\Request;
use App\Lib\Response;
use App\Models\Buku;
use App\Models\Penulis;

class BukuController
{
    /**
     * @OA\Get(
     *   path="/buku",
     *   summary="list buku",
     *  tags={"Buku"},
     *   @OA\Response(
     *     response=200,
     *     description="List All Buku",
     *    @OA\JsonContent()
     *   ),
     *     @OA\Parameter(
     *         description="Nama Penulis",
     *         in="query",
     *         name="penulis",
     *         @OA\Schema(
     *           type="string",
     *           format="text"
     *         )
     *     ),
     *     @OA\Parameter(
     *         description="Nama Kategori",
     *         in="query",
     *         name="kategori",
     *         @OA\Schema(
     *           type="string",
     *           format="text"
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
     * @return Response
     */
    public function all(Request $request, Response $response)
    {
        $params = $request->getParameters();
        $buku = Buku::with(['penulis', 'kategori'])
            ->join('penulis as p', 'p.id', 'buku.id_penulis')
            ->join('kategori as k', 'k.id', 'buku.id_kategori')
            ->when($params['penulis'], function ($query) use ($params){
                return $query->where('p.name', 'like','%'.$params['penulis'].'%');
            })
            ->when($params['kategori'], function ($query) use ($params){
                return $query->where('k.name', 'like','%'.$params['kategori'].'%');
            })
            ->get();
        return $response->toJSON($buku);
    }

    /**
     * @OA\Get(
     *   path="/buku/{id}",
     *   summary="show buku",
     *  tags={"Buku"},
     *   @OA\Response(
     *     response=200,
     *     description="Detail buku",
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
        $buku = Buku::find($id);
        return $response->toJSON($buku);
    }

    /**
     * @OA\Post(
     * path="/buku",
     * summary="Create Buku",
     * description="Create Buku",
     *  tags={"Buku"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass user credentials",
     *    @OA\JsonContent(
     *       required={"name"},
     *       @OA\Property(property="judul", type="string", format="text", example="Sejarah"),
     *       @OA\Property(property="id_penulis", type="integer", format="int64", example="1"),
     *       @OA\Property(property="id_kategori", type="integer", format="int64", example="1"),
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
            Buku::create($attributes);
            return $response->toJSON([
                'success' => 'Berhasil simpan buku'
            ]);
        }catch (\Exception $e){
            return $response->toJSON([
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * @OA\Delete (
     *   path="/buku/{id}",
     *   summary="delete buku",
     *  tags={"Buku"},
     *   @OA\Response(
     *     response=200,
     *     description="Delete buku",
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
            Buku::find($id)->delete();
            return $response->toJSON([
                'success' => 'Berhasil delete buku'
            ]);
        }catch (\Exception $e){
            return $response->toJSON([
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * @OA\Put  (
     *   path="/buku/{id}",
     *   summary="update buku",
     *  tags={"Buku"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass user credentials",
     *    @OA\JsonContent(
     *       required={"name"},
     *       @OA\Property(property="judul", type="string", format="text", example="Sejarah"),
     *       @OA\Property(property="id_penulis", type="integer", format="int64", example="1"),
     *       @OA\Property(property="id_kategori", type="integer", format="int64", example="1"),
     *    ),
     * ),
     *   @OA\Response(
     *     response=200,
     *     description="update buku",
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
            Buku::find($id)->update($attributes);
            return $response->toJSON([
                'success' => 'Berhasil update buku'
            ]);
        }catch (\Exception $e){
            return $response->toJSON([
                'error' => $e->getMessage()
            ]);
        }
    }
}