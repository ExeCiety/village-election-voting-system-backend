<?php

namespace App\Http\Controllers\User;

use App\Helpers\Model\VoterHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Voter\CreateVoterRequest;
use App\Http\Resources\BaseResourceCollection;
use App\Http\Resources\Voter\VoterForGeneralResource;
use App\Services\User\VoterService;
use App\Traits\ControllerResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VoterController extends Controller
{
    use ControllerResource;

    public function __construct(private readonly VoterService $voterService)
    {
        $this->setResourceKey(VoterHelper::RESOURCE_KEY_NAME);
    }

    /**
     * Get Election Sessions
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        return response()->json([
            'message' => trans('resource.get_data_success', [
                'name' => $this->resourceKeysName
            ]),
            'data' => new BaseResourceCollection(
                $this->voterService->getAllVoters($request),
                VoterForGeneralResource::class
            ),
            'errors' => null
        ], Response::HTTP_OK);
    }

    /**
     * Get One Election Session
     *
     * @param \Illuminate\Http\Request $request
     * @param string $param
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, string $param): JsonResponse
    {
        return response()->json([
            'message' => trans('resource.get_data_success', [
                'name' => $this->resourceKeyName
            ]),
            'data' => new VoterForGeneralResource(
                $this->voterService->getVoterByParam($request, $param)
            ),
            'errors' => null
        ], Response::HTTP_OK);
    }


    /**
     * Create Election Session
     *
     * @param \App\Http\Requests\Voter\CreateVoterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateVoterRequest $request): JsonResponse
    {
        $voter = $this->voterService->createVoter($request);

        return response()->json([
            'message' => trans('resource.create_data_success', [
                'name' => $this->resourceKeyName
            ]),
            'data' => [
                'otp' => $voter->otp
            ],
            'errors' => null
        ], Response::HTTP_CREATED);
    }
}
