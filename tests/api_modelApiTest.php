<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class api_modelApiTest extends TestCase
{
    use Makeapi_modelTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateapi_model()
    {
        $apiModel = $this->fakeapi_modelData();
        $this->json('POST', '/api/v1/apiModels', $apiModel);

        $this->assertApiResponse($apiModel);
    }

    /**
     * @test
     */
    public function testReadapi_model()
    {
        $apiModel = $this->makeapi_model();
        $this->json('GET', '/api/v1/apiModels/'.$apiModel->id);

        $this->assertApiResponse($apiModel->toArray());
    }

    /**
     * @test
     */
    public function testUpdateapi_model()
    {
        $apiModel = $this->makeapi_model();
        $editedapi_model = $this->fakeapi_modelData();

        $this->json('PUT', '/api/v1/apiModels/'.$apiModel->id, $editedapi_model);

        $this->assertApiResponse($editedapi_model);
    }

    /**
     * @test
     */
    public function testDeleteapi_model()
    {
        $apiModel = $this->makeapi_model();
        $this->json('DELETE', '/api/v1/apiModels/'.$apiModel->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/apiModels/'.$apiModel->id);

        $this->assertResponseStatus(404);
    }
}
