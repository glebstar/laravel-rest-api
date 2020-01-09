<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserDataTest extends TestCase
{
    /**
     * Test Store.
     *
     * @return integer
     */
    public function testStore()
    {
        $response = $this->json ('POST', 'api/data');
        $this->assertEquals ('The given data was invalid.', json_decode ($response->content ())->message);

        $response = $this->json('POST', 'api/data', [
            'profession' => 'Laravel developer',
            'places' => [
                [
                    'name' => 'Google',
                    'date_from' => '2019-12-01',
                    'date_to' => '2019-12-31',
                    'description' => 'This is description'
                ],
            ],
        ]);

        $this->assertEquals ('The name field is required.', json_decode ($response->content(), true)['errors']['name'][0]);

        $response = $this->json('POST', 'api/data', [
            'name' => 'John',
            'profession' => 'Laravel developer',
            'places' => [
                [
                    'name' => 'Google',
                    'date_from' => '2019-12-01',
                    'date_to' => '2019-12-31',
                    'description' => 'This is description'
                ],
                [
                    'name' => 'Bingo',
                    'date_from' => '2019-01-01',
                    'date_to' => '2019-01-08',
                    'description' => 'This is description'
                ],
            ],

        ]);

        $this->assertEquals (1, json_decode ($response->content ())->data->user_id);

        return json_decode ($response->content ())->data->id;
    }

    /**
     * Test Update
     * @param integer $userId User Id
     * @depends testStore
     *
     * @return integer
     */
    public function testUpdate($userId)
    {
        $response = $this->json('PUT', 'api/data/' . $userId, [
            'name' => 'John Smith',
            'places' => [
                [
                    'name' => 'Yahoo',
                    'date_from' => '2019-01-01',
                    'date_to' => '2019-01-08',
                    'description' => 'This is description'
                ],
            ],
        ]);

        $this->assertEquals ('John Smith', json_decode ($response->content ())->data->params->name);

        return $userId;
    }

    /**
     * Test Delete
     * @param integer $userId User Id
     * @depends testStore
     *
     * @return void
     */
    public function testDelete($userId)
    {
        $response = $this->json('DELETE', 'api/data/' . $userId);
        $this->assertEquals (1, json_decode ($response->content())->data->user_id);
    }
}
