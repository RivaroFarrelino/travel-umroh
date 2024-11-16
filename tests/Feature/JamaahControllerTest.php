<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JamaahControllerTest extends TestCase
{
    public function testIndex(){
        $this->get('/')
            ->assertRedirect('/jamaahs');

        $this->get('/jamaahs')
            ->assertStatus(200);
    }
}
