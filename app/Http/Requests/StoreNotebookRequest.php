<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *      title="StoreNotebookRequest",
 *      description="Store Notebook request body data",
 *      type="object",
 *      required={"full_name","email","phone"}
 * )
 */

class StoreNotebookRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="Full name",
     *      description="Notebook's full name",
     *      example="John Doe"
     * )
     *
     * @var string
     */
    public $full_name;

    /**
     * @OA\Property(
     *      title="Email",
     *      description="Notebook's email",
     *      example="John@Doe.acme"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="Phone",
     *      description="Notebook's phone number",
     *      example="+795689632569"
     * )
     *
     * @var string
     */
    public $phone;

    /**
     * @OA\Property(
     *      title="Company",
     *      description="Notebook's company's name",
     *      example="Acme"
     * )
     *
     * @var string
     */
    public $company;

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
    public $birthdate;

    /**
     * @OA\Property(
     *      title="Avatar",
     *      description="Notebook's avatar url",
     *      example="http://localhost:8000/public/avatar/1/avatar.jpg"
     * )
     *
     * @var string
     */
    public $avatar;


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|string',
            'company' => 'nullable|string',
            'phone' => 'required|string',
            'email' => 'required|email|unique:notebooks,email',
            'birthdate' => 'nullable|date',
            'avatar' => 'nullable|string'
        ];
    }
}