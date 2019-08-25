<?php namespace Tests\Repositories;

use App\Models\place;
use App\Repositories\placeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class placeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var placeRepository
     */
    protected $placeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->placeRepo = \App::make(placeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_place()
    {
        $place = factory(place::class)->make()->toArray();

        $createdplace = $this->placeRepo->create($place);

        $createdplace = $createdplace->toArray();
        $this->assertArrayHasKey('id', $createdplace);
        $this->assertNotNull($createdplace['id'], 'Created place must have id specified');
        $this->assertNotNull(place::find($createdplace['id']), 'place with given id must be in DB');
        $this->assertModelData($place, $createdplace);
    }

    /**
     * @test read
     */
    public function test_read_place()
    {
        $place = factory(place::class)->create();

        $dbplace = $this->placeRepo->find($place->id);

        $dbplace = $dbplace->toArray();
        $this->assertModelData($place->toArray(), $dbplace);
    }

    /**
     * @test update
     */
    public function test_update_place()
    {
        $place = factory(place::class)->create();
        $fakeplace = factory(place::class)->make()->toArray();

        $updatedplace = $this->placeRepo->update($fakeplace, $place->id);

        $this->assertModelData($fakeplace, $updatedplace->toArray());
        $dbplace = $this->placeRepo->find($place->id);
        $this->assertModelData($fakeplace, $dbplace->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_place()
    {
        $place = factory(place::class)->create();

        $resp = $this->placeRepo->delete($place->id);

        $this->assertTrue($resp);
        $this->assertNull(place::find($place->id), 'place should not exist in DB');
    }
}
