<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\place;

class placeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_place()
    {
        $place = factory(place::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/places', $place
        );

        $this->assertApiResponse($place);
    }

    /**
     * @test
     */
    public function test_read_place()
    {
        $place = factory(place::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/places/'.$place->id
        );

        $this->assertApiResponse($place->toArray());
    }

    /**
     * @test
     */
    public function test_update_place()
    {
        $place = factory(place::class)->create();
        $editedplace = factory(place::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/places/'.$place->id,
            $editedplace
        );

        $this->assertApiResponse($editedplace);
    }

    /**
     * @test
     */
    public function test_delete_place()
    {
        $place = factory(place::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/places/'.$place->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/places/'.$place->id
        );

        $this->response->assertStatus(404);
    }
}
