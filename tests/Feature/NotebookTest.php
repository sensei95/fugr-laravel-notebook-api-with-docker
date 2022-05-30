<?php

namespace Tests\Feature;

use App\Models\Notebook;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NotebookTest extends TestCase
{
   use RefreshDatabase, WithFaker;

    private array $headers;

    protected function setUp(): void
    {
        parent::setUp();
        $this->headers = [
            'Accept' => 'application/json',
            'content-type' => 'application/json'
        ];

        $this->withExceptionHandling();

    }

    public function test_can_successfully_store_a_notebook_and_return_it(): void
    {

        $payload = [
            'full_name' => "{$this->faker->lastName} {$this->faker->firstName} {$this->faker->name}",
            'company' => $this->faker->company,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'birthdate' => $this->faker->date,
            'avatar' => $this->faker->imageUrl
        ];

        $response = $this->postJson('/api/v1/notebook',$payload,$this->headers);

        $response
            ->assertJson(['data' => $payload])
            ->assertStatus(201);

    }

    public function test_can_get_notebooks_list(): void{

        $notebooks = Notebook::factory(5)->create();

        $response = $this->getJson('/api/v1/notebook',[],$this->headers);

        $response
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'full_name',
                        'company',
                        'phone',
                        'email',
                        'birthdate',
                        'avatar'
                    ]
                ]
            ])
            ->assertJsonCount(5,'data')
            ->assertStatus(200);
    }

    public function test_can_update_a_notebook__by_id_and_return_it(): void
    {
        $notebook = Notebook::factory()->create();

        $payload = [
            'full_name' => "{$this->faker->lastName} {$this->faker->firstName} {$this->faker->name}",
            'company' => $this->faker->company,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'birthdate' => $this->faker->date,
            'avatar' => $this->faker->imageUrl
        ];

        $response = $this->putJson("/api/v1/notebook/{$notebook->id}",$payload,$this->headers);

        $response
            ->assertStatus(200)
            ->assertJson(['data' => $payload]);
    }

    public function test_can_delete_a_notebook_by_id(): void
    {
        $notebook = Notebook::factory()->create();

        $response = $this->deleteJson("/api/v1/notebook/{$notebook->id}",[],$this->headers);

        $response
            ->assertStatus(200);
    }
}