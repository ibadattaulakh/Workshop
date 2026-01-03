<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_posts_index_page_displays_posts(): void
    {
        $user = User::factory()->create();
        Post::factory()->create(['user_id' => $user->id]);

        $response = $this->get(route('posts.index'));

        $response->assertStatus(200);
        $response->assertViewIs('posts.index');
    }

    public function test_post_can_be_created(): void
    {
        $user = User::factory()->create();

        $response = $this->post(route('posts.store'), [
            'title' => 'Test Post',
            'slug' => 'test-post',
            'excerpt' => 'This is a test excerpt',
            'body' => 'This is the body of the test post.',
        ]);

        $response->assertRedirect(route('posts.show', Post::where('slug', 'test-post')->first()));
        $this->assertDatabaseHas('posts', [
            'title' => 'Test Post',
            'slug' => 'test-post',
        ]);
    }

    public function test_post_can_be_viewed(): void
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        $response = $this->get(route('posts.show', $post));

        $response->assertStatus(200);
        $response->assertViewIs('posts.show');
        $response->assertSee($post->title);
    }

    public function test_post_can_be_updated(): void
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        $response = $this->put(route('posts.update', $post), [
            'title' => 'Updated Title',
            'slug' => 'updated-slug',
            'excerpt' => 'Updated excerpt',
            'body' => 'Updated body',
        ]);

        $response->assertRedirect(route('posts.show', $post));
        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'Updated Title',
            'slug' => 'updated-slug',
        ]);
    }

    public function test_post_can_be_deleted(): void
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        $response = $this->delete(route('posts.destroy', $post));

        $response->assertRedirect(route('posts.index'));
        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }
}
