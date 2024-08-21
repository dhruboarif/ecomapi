namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class UserTest extends TestCase
{
use RefreshDatabase;

/** @test */
public function a_user_can_register()
{
$response = $this->postJson('/api/register', [
'name' => 'Test User',
'email' => 'testuser@example.com',
'password' => 'password',
'password_confirmation' => 'password',
]);

$response->assertStatus(201)
->assertJsonStructure(['token']);

$this->assertDatabaseHas('users', ['email' => 'testuser@example.com']);
}

/** @test */
public function a_user_can_login()
{
$user = User::factory()->create([
'email' => 'testuser@example.com',
'password' => bcrypt('password'),
]);

$response = $this->postJson('/api/login', [
'email' => 'testuser@example.com',
'password' => 'password',
]);

$response->assertStatus(200)
->assertJsonStructure(['token']);
}

/** @test */
public function a_user_can_view_their_profile()
{
$user = User::factory()->create();

$response = $this->actingAs($user, 'api')->getJson('/api/user');

$response->assertStatus(200)
->assertJsonStructure(['id', 'name', 'email']);
}
}
