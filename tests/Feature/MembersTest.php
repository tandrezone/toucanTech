<?php

namespace Tests\Feature;

use Database\Factories\MemberFactory;
use Database\Factories\SchoolFactory;
use Tests\TestCase;

class MembersTest extends TestCase
{

    /**
     * Test members (list schools) route
     *
     * @return void
     */
    public function testSchoolListRoute()
    {
        $response = $this->get('/members');
        $content = $response->getContent();
        $this->assertStringContainsString("<h1>List Schools</h1>", $content);
        $response->assertStatus(200);
    }

    /**
     * Test Add new member route
     *
     * @return void
     */
    public function testMembersNewRoute()
    {
        $response = $this->get('/members/new');
        $content = $response->getContent();
        $this->assertStringContainsString("<h1>Add New Member</h1>", $content);
        $response->assertStatus(200);
    }

    /**
     * Test CreateList members route
     *
     * @return void
     */
    public function testCreateListMembers()
    {

        $school = new SchoolFactory();
        $member = new MemberFactory();
        $member->create(['name' => 'Tiago'])->each(function($member) use ($school) {
            $member->schools()->save($school->create(['name' => 'School of arts']));
        });

        $response = $this->get('/members/1');
        $content = $response->getContent();
        $this->assertStringContainsString("<h4>School of arts</h4>", $content);
        $this->assertStringContainsString("Tiago", $content);
        $response->assertStatus(200);
    }
}
