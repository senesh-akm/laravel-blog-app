<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_create_post_page()
    {
        $response = $this->get(route('posts.create'));
        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_create_post()
    {
        // Create a fake user and authenticate
        $user = User::factory()->create();
        $this->actingAs($user);

        // Fake storage for image uploads
        Storage::fake('public');

        // Create a fake image file
        $image = UploadedFile::fake()->image('post.jpg');

        $response = $this->post(route('posts.store'), [
            'title' => 'Test Post',
            'text' => 'This is a test post.',
            'image' => $image,
        ]);

        // Assert the post was stored in the database
        $this->assertDatabaseHas('posts', [
            'title' => 'Test Post',
            'text' => 'This is a test post.',
        ]);

        // Assert the image was stored in the correct path
        Storage::disk('public')->assertExists('images/' . $image->hashName());

        // Assert the user is redirected to the posts index
        $response->assertRedirect(route('posts.index'));
    }

    public function test_validation_errors_on_create_post()
    {
        // Create a fake user and authenticate
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('posts.store'), [
            'title' => '', // Missing title
            'text' => '',  // Missing text
        ]);

        // Assert validation errors
        $response->assertSessionHasErrors(['title', 'text']);
    }
}
