<?php

namespace Tests\Feature;

use Tests\TestCase;

class HealthTest extends TestCase
{
    public function testHealtPage()
    {
        $response = $this->get('/health');
        $response->assertStatus(200);
    }
}
