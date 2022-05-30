<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="Notebook",
 *     description="Notebook model",
 *     required={"full_name","email","phone"},
 *     @OA\Xml(
 *         name="Notebook"
 *     )
 * )
 */

class Notebook extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @OA\Property(
     *      title="Full name",
     *      description="Notebook's full name",
     *      example="John Doe"
     * )
     *
     * @var string
     */
    protected $full_name;

    /**
     * @OA\Property(
     *      title="Email",
     *      description="Notebook's email",
     *      example="John@Doe.acme"
     * )
     *
     * @var string
     */
    protected $email;

    /**
     * @OA\Property(
     *      title="Phone",
     *      description="Notebook's phone number",
     *      example="+795689632569"
     * )
     *
     * @var string
     */
    protected $phone;

    /**
     * @OA\Property(
     *      title="Company",
     *      description="Notebook's company's name",
     *      example="Acme"
     * )
     *
     * @var string
     */
    protected $company;

    /**
     * @OA\Property(
     *      title="Birthdate",
     *      description="Notebook's birthdate",
     *      format="YYYY-mm-dd",
     *      example="1990-06-26"
     * )
     *
     * @var string
     */
    protected $birthdate;

    /**
     * @OA\Property(
     *      title="Avatar",
     *      description="Notebook's avatar url",
     *      example="http://localhost:8000/public/avatar/1/avatar.jpg"
     * )
     *
     * @var string
     */
    protected $avatar;

}