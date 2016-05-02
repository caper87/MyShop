<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateItemsAPIRequest;
use App\Http\Requests\API\UpdateItemsAPIRequest;
use App\Models\Items;
use App\Repositories\ItemsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ItemsController
 * @package App\Http\Controllers\API
 */

class ItemsAPIController extends AppBaseController
{
    /** @var  ItemsRepository */
    private $itemsRepository;

    public function __construct(ItemsRepository $itemsRepo)
    {
        $this->itemsRepository = $itemsRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/items",
     *      summary="Get a listing of the Items.",
     *      tags={"Items"},
     *      description="Get all Items",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Items")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->itemsRepository->pushCriteria(new RequestCriteria($request));
        $this->itemsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $items = $this->itemsRepository->all();

        return $this->sendResponse($items->toArray(), 'Items retrieved successfully');
    }

    /**
     * @param CreateItemsAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/items",
     *      summary="Store a newly created Items in storage",
     *      tags={"Items"},
     *      description="Store Items",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Items that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Items")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Items"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateItemsAPIRequest $request)
    {
        $input = $request->all();

        $items = $this->itemsRepository->create($input);

        return $this->sendResponse($items->toArray(), 'Items saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/items/{id}",
     *      summary="Display the specified Items",
     *      tags={"Items"},
     *      description="Get Items",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Items",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Items"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Items $items */
        $items = $this->itemsRepository->find($id);

        if (empty($items)) {
            return Response::json(ResponseUtil::makeError('Items not found'), 400);
        }

        return $this->sendResponse($items->toArray(), 'Items retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateItemsAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/items/{id}",
     *      summary="Update the specified Items in storage",
     *      tags={"Items"},
     *      description="Update Items",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Items",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Items that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Items")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Items"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateItemsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Items $items */
        $items = $this->itemsRepository->find($id);

        if (empty($items)) {
            return Response::json(ResponseUtil::makeError('Items not found'), 400);
        }

        $items = $this->itemsRepository->update($input, $id);

        return $this->sendResponse($items->toArray(), 'Items updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/items/{id}",
     *      summary="Remove the specified Items from storage",
     *      tags={"Items"},
     *      description="Delete Items",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Items",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Items $items */
        $items = $this->itemsRepository->find($id);

        if (empty($items)) {
            return Response::json(ResponseUtil::makeError('Items not found'), 400);
        }

        $items->delete();

        return $this->sendResponse($id, 'Items deleted successfully');
    }
}
