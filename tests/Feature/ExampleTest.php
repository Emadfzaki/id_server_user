<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
//use Illuminate\Foundation\Testing\DatabaseMigrations;
//use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** test login*/
    public function testBasicLogin()
    {
        $response = $this->json('POST', 'api/login', ['email' => 'do7a@do7a.com', 'password'=>'do7ado7a']);

        $response->assertStatus(200)
                ->assertJson(['url' => 'spree.com',])
                ;
    }

    /** test details*/
    public function testBasicDetails()
    {
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjY5YWUxMGY5NGFmMGI3NWQyMmYxZWU1ZWFjZGExMDZjZTQ0ZTUwOGIwNTVmOWQ1Zjg0ODc1YTIzODczMzRkOGQxZDY1NjEwODUxNmRkZjdmIn0.eyJhdWQiOiIxIiwianRpIjoiNjlhZTEwZjk0YWYwYjc1ZDIyZjFlZTVlYWNkYTEwNmNlNDRlNTA4YjA1NWY5ZDVmODQ4NzVhMjM4NzMzNGQ4ZDFkNjU2MTA4NTE2ZGRmN2YiLCJpYXQiOjE1MDU5MTY3MDUsIm5iZiI6MTUwNTkxNjcwNSwiZXhwIjoxNTM3NDUyNzA0LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.kZLBIXMDy5wWni-vtA2pQhydiYa-KFfRJvTuK4FOxRBYn4x-icevS1SA-F003c2MWupNIXqnxQcvU3TThXCIL0b0LSe8COy1vAfi6X_awuZ6KIZqIHZbxQHNUL4JinBVoUyQiB_qqfy_Z2yPep74ekk-K2U0hgA-MoOzmtIj8-X3UQg4d805Wgu2UEqGp0LAXe_OIBalHjnBotx-fRPa7bPCToF8R0JVJIkSRkRVBYJCB2h_mSAf0eZ7pGxjjAPT2DooAhQ9-k06K3uFFz6bqvhkVgrN8xemm8RLp4FX62QxfXVWmC4d1HeZWTn0m4pVY5t35HK6pKm-FuGJGherZ_OIB86V6bpdKeMzqwENv9wWZxMNr7uofSiEPD_laVszfCGYVebQIjl7xD4whXBHJQO6pPabc7RJzr9xPu4BopYhQ3WtxBoMKdmQQgYuWD8bguy4IsOlLn80o5v6FA4fLWf3zjrbOYXk16LDJNRMeYzMvo16CC5w60JvINjBvF2yNI7ERqz_zZaDfs6CtDm2_vKje_PaCgeqbT6Vk7XQIB3h7krlfjeLGHLxGWDrnu5dJj7xSwoxY6L8pqLyQTjm_kAhuGrRCCrRsEqJKJ47_njbafBZ7JoQFifBxtlxLj7oF5shwU75TcZ8kmigSFNARui8i7cE3PdhJv2TNBWE_ks';

        $response = $this->json('GET', 'api/details', [],  ['HTTP_Authorization' => 'Bearer ' . $token]);

        $response->assertStatus(200)
                ->assertJsonStructure([
                        "success" => [
                            "id",
                            "name",
                            "email",
                            "role_id",
                            "created_at",
                            "updated_at"
                        ]
                    ])
                ;
    }
}
