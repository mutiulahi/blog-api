<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIResponse extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/articles",
     *     tags={"Article"},
     *     summary="Finds Pets by status",
     *     description="Multiple status values can be provided with comma separated string",
     *     operationId="index",
     *     @OA\Parameter(
     *         name="status",
     *         in="query",
     *         description="Status values that needed to be considered for filter",
     *         required=true,
     *         explode=true,
     *         @OA\Schema(
     *             default="available",
     *             type="string",
     *             enum={"available", "pending", "sold"},
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *          
     *     ), 
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     ),
     * )
     */
    public static function success(String $message, $data = null)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
        ], 200);
    }

    /**
     * Return error response
     */
    public static function error(String $message, int $code)
    {
        return response()->json([
            'status' => false,
            'message' => $message,
        ], $code);
    }

    /**
     * Return 404 Error response
     */
    public static function notFound()
    {
        return response()->json([
            'status' => false,
            'message' => 'Resource not found',
        ], 404);
    }

    /**
     * return unauthenticated error
     */
    public static function unauthenticated()
    {
        return response()->json([
            'status' => false,
            'message' => 'You are not authenticated',
        ], 401);
    }

    /**
     * Return authorization error
     */
    public static function unauthorized()
    {
        return response()->json([
            'status' => false,
            'message' => 'You are not allowed to access this resource',
        ], 403);
    }

    /**
     * Indicates a server error
     */
    public static function serverError()
    {
        return response()->json([
            'status' => false,
            'message' => 'A server error occured',
        ], 500);
    }
}
