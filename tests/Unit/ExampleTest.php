<?php

namespace Tests\Unit;

use App\Post;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $first = factory(Post::class)->create();

        $second = factory(Post::class)->create([
            'created_at' => Carbon::now()->subMonth()
        ]);


        $posts = Post::archives();

        $this->assertCount(2, $posts);
        // todo: year and published format and value problem.
//        $this->assertEquals([
//            [
//                "year" => $first->created_at->format('Y'),
//                'month' => $first->created_at->format('F'),
//                'published'=> 1
//            ],
//            [
//                'year' => $second->created_at->format('Y'),
//                'month' => $second->created_at->format('F'),
//                'published'=> 1
//            ],
//
//        ], $posts);
    }
}
