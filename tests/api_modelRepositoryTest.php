<?php

use App\Models\api_model;
use App\Repositories\api_modelRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class api_modelRepositoryTest extends TestCase
{
    use Makeapi_modelTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var api_modelRepository
     */
    protected $apiModelRepo;

    public function setUp()
    {
        parent::setUp();
        $this->apiModelRepo = App::make(api_modelRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateapi_model()
    {
        $apiModel = $this->fakeapi_modelData();
        $createdapi_model = $this->apiModelRepo->create($apiModel);
        $createdapi_model = $createdapi_model->toArray();
        $this->assertArrayHasKey('id', $createdapi_model);
        $this->assertNotNull($createdapi_model['id'], 'Created api_model must have id specified');
        $this->assertNotNull(api_model::find($createdapi_model['id']), 'api_model with given id must be in DB');
        $this->assertModelData($apiModel, $createdapi_model);
    }

    /**
     * @test read
     */
    public function testReadapi_model()
    {
        $apiModel = $this->makeapi_model();
        $dbapi_model = $this->apiModelRepo->find($apiModel->id);
        $dbapi_model = $dbapi_model->toArray();
        $this->assertModelData($apiModel->toArray(), $dbapi_model);
    }

    /**
     * @test update
     */
    public function testUpdateapi_model()
    {
        $apiModel = $this->makeapi_model();
        $fakeapi_model = $this->fakeapi_modelData();
        $updatedapi_model = $this->apiModelRepo->update($fakeapi_model, $apiModel->id);
        $this->assertModelData($fakeapi_model, $updatedapi_model->toArray());
        $dbapi_model = $this->apiModelRepo->find($apiModel->id);
        $this->assertModelData($fakeapi_model, $dbapi_model->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteapi_model()
    {
        $apiModel = $this->makeapi_model();
        $resp = $this->apiModelRepo->delete($apiModel->id);
        $this->assertTrue($resp);
        $this->assertNull(api_model::find($apiModel->id), 'api_model should not exist in DB');
    }
}
