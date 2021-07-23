<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EvenTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list_page_shows_all_events()
    {
        $event1 = factory(\Event::class)->create();
        $event2 = factory(\Event::class)->create();
        
        $response = $this->get('events');
        
        $response->assertViewHas('events', \Event::all());
        $response->assertViewHasAll([
            'events' => \Event::all(),
            'events'=>'Events Page',
                                    ]);

        $response->assertViewMissing('dogs');
    }
}
