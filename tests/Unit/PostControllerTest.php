<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    // use WithoutMiddleware;

    public function test_index()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        Post::factory()->create(['user_id' => $user->id]);
        $response = $this->get('/post');
        $response->assertStatus(200);
        $response->assertViewIs('post.index');
        $response->assertSee('Posts');
    }

    public function test_store()
    {
        $user = User::factory()->create();
        Storage::fake('public');
        $file = UploadedFile::fake()->image('avatar.jpg');
        $response = $this->actingAs($user)->post('/post', [
            'title' => 'Test Post',
            'paragraph' => 'This is a test post.',
            'image' => $file,
            'is_published' => true,
            'tags' => 'tag1,tag2',
            //'_token' => csrf_token(), 
        ]);
        $this->assertDatabaseHas('posts', [
            'title' => 'Test Post',
            'paragraph' => 'This is a test post.',
            'is_published' => true,
        ]);
        $response->assertRedirect(route('post.index'));
    }

    public function test_edit()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $post = Post::factory()->create(['user_id' => $user->id]);
        $response = $this->get(route('post.edit', $post->slug));
        $response->assertStatus(200);
        $response->assertViewIs('post.edit');
        $response->assertViewHas('post');
    }

    public function test_update()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $post = Post::factory()->create(['user_id' => $user->id]);
        $response = $this->put(route('post.update', $post->slug), [
            'title' => 'Updated Title',
            'paragraph' => 'Updated Paragraph',
            'is_published' => true,
            '_token' => csrf_token(), // Add CSRF token if needed
        ]);
        $response->assertRedirect(route('post.index'));
        $this->assertDatabaseHas('posts', [
            'title' => 'Updated Title',
            'paragraph' => 'Updated Paragraph',
            'is_published' => true,
        ]);
    }

    public function test_show()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $post = Post::factory()->create(['user_id' => $user->id]);
        $response = $this->get(route('post.show', $post->slug));
        $response->assertStatus(200);
        $response->assertViewIs('post.show');
        $response->assertSee($post->title);
    }

    public function test_destroy()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $post = Post::factory()->create(['user_id' => $user->id]);
        $response = $this->delete(route('post.destroy', $post->slug), [
            '_token' => csrf_token(), // Add CSRF token if needed
        ]);
        $response->assertRedirect(route('post.index'));
        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }
}