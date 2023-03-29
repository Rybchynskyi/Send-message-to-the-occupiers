<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="PPO-site",
 *      description="API for site ppo.all4ukraine.org",
 *      @OA\Contact(
 *          email="admin@all4ukraine.org"
 *      ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="https://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 * @OA\Tag(
 *     name="Purchases",
 *     description="CRUD for purchases"
 * )
 * @OA\Server(
 *     description="DEV",
 *     url="http://127.0.0.1:8000/api"
 * )
 * @OA\Server(
 *     description="PROD",
 *     url="https://ppo.all4ukraine.org/api"
 * )
 * @OA\Schema(
 *      schema="Purchase",
 *      title="Purchase object",
 * 	@OA\Property(
 * 		property="id",
 * 		type="numeric",
 *      example="1"
 * 	),
 * 	@OA\Property(
 * 		property="user_id",
 * 		type="numeric",
 *      description="Who made this purchase",
 *      example="1"
 * 	),
 * 	@OA\Property(
 * 		property="title",
 * 		type="string",
 *      description="Sentense for this bullet",
 *      example="To moscow with love"
 * 	),
 * 	@OA\Property(
 * 		property="sum",
 * 		type="numeric",
 *      description="Donation amount (hrn)",
 *      example="300"
 * 	),
 * 	@OA\Property(
 * 		property="status",
 * 		type="numeric",
 *      description="1-created; 2-payed; 3-sended; 4-successfully closed",
 *      example="1"
 * 	),
 * 	@OA\Property(
 * 		property="send_to",
 * 		type="numeric",
 *      description="Order-id from all4ukraine site",
 *      example="12",
 *      default="null"
 * 	),
 * 	@OA\Property(
 * 		property="full_name",
 * 		type="string",
 *      description="Full Name for the sertificate",
 *      example="Ivan Kusmitch"
 * 	),
 * 	@OA\Property(
 * 		property="sertificate_img",
 * 		type="image",
 *      description="Link to the image of bullet",
 *      example="bullets/ch1ihBTyFkvrH2niT5H7VgJ8u3V6YzPUZLQ8BJds.png",
 *      default="null"
 * 	),
 * 	@OA\Property(
 * 		property="created_at",
 * 		type="datetime",
 *      description="Date and tome of creating this purchase",
 *      example="2023-01-03T13:10:57.000000Z"
 * 	),
 * 	@OA\Property(
 * 		property="updated_at",
 * 		type="datetime",
 *      description="Date and tome of updating this purchase",
 *      example="2023-01-04T13:10:57.000000Z",
 *      default="null"
 * 	),
 * 	@OA\Property(
 * 		property="deleted_at",
 * 		type="datetime",
 *      description="Date and tome of deleting this purchase",
 *      example="2023-01-05T13:10:57.000000Z",
 *      default="null"
 * 	),
 * ),
 * @OA\Schema(
 *      schema="Error",
 *      title="Error message",
 * 	@OA\Property(
 * 		property="code",
 * 		type="numeric",
 *      description="Error code",
 *      example="404"
 * 	),
 * 	@OA\Property(
 * 		property="message",
 * 		type="string",
 *      description="Error message",
 *      example="Not found"
 * 	),
 * )
 */




class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
