<?php

use Faker\Factory as Faker;
use App\Models\api_model;
use App\Repositories\api_modelRepository;

trait Makeapi_modelTrait
{
    /**
     * Create fake instance of api_model and save it in database
     *
     * @param array $apiModelFields
     * @return api_model
     */
    public function makeapi_model($apiModelFields = [])
    {
        /** @var api_modelRepository $apiModelRepo */
        $apiModelRepo = App::make(api_modelRepository::class);
        $theme = $this->fakeapi_modelData($apiModelFields);
        return $apiModelRepo->create($theme);
    }

    /**
     * Get fake instance of api_model
     *
     * @param array $apiModelFields
     * @return api_model
     */
    public function fakeapi_model($apiModelFields = [])
    {
        return new api_model($this->fakeapi_modelData($apiModelFields));
    }

    /**
     * Get fake data of api_model
     *
     * @param array $postFields
     * @return array
     */
    public function fakeapi_modelData($apiModelFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'text' => $fake->word,
            'text' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $apiModelFields);
    }
}
