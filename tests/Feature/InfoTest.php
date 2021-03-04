<?php

namespace Tests\Feature;

use Tests\TestCase;

class InfoTest extends TestCase
{
    /**
     * Test Home route
     *
     * @return void
     */
    public function testHomeRoute()
    {
        $response = $this->get('/');
        $content = $response->getContent();
        $this->assertStringContainsString("<h1>The Test</h1>", $content);
        $response->assertStatus(200);
    }

    /**
     * Test Notes route
     *
     * @return void
     */
    public function testNotesRoute()
    {
        $response = $this->get('/notes');
        $content = $response->getContent();
        $this->assertStringContainsString("<h1>The Notes</h1>", $content);
        $response->assertStatus(200);
    }
}
