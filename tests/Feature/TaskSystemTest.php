<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskSystemTest extends TestCase
{
    use RefreshDatabase;

    public function test_required_pages_and_seeded_data(): void
    {
        $this->seed();
        foreach (['/', '/tasks', '/profile', '/about'] as $path) {
            $this->get($path)->assertOk();
        }
        $this->assertDatabaseCount('tasks', 9);
        $this->assertDatabaseCount('users', 1);
        $this->assertSame(4, Task::distinct()->count('task_date'));
        $this->get('/profile')->assertSee('Mara Santos')->assertSee('mara@example.com');
        $this->get('/about')->assertSee('Jian Edward A. Acob');
        $this->get('/missing')->assertNotFound();
    }

    public function test_today_filter_and_date_order(): void
    {
        $this->travelTo(now()->setDate(2026, 10, 30)->setTime(23, 59));
        $this->seed();
        $response = $this->get('/');
        foreach (Task::all() as $task) {
            if ($task->task_date->isToday()) {
                $response->assertSee($task->title);
            } else {
                $response->assertDontSee($task->title);
            }
        }
        $this->get('/tasks')->assertSeeInOrder(Task::orderBy('task_date')->orderBy('id')->pluck('title')->all());
        $this->travel(1)->minutes();
        $this->get('/')->assertSee('Receive new cleaning concentrate')->assertDontSee('Sanitize the refill dispensers');
    }

    public function test_reseeding_and_empty_states(): void
    {
        $this->seed();
        $this->seed();
        $this->assertDatabaseCount('tasks', 9);
        $this->assertDatabaseCount('users', 1);
        Task::query()->delete();
        User::query()->delete();
        $this->get('/')->assertSee('No tasks to display');
        $this->get('/tasks')->assertSee('No tasks to display');
        $this->get('/profile')->assertSee('No profile record is available');
    }

    public function test_database_writes_defaults_and_safe_output(): void
    {
        $task = Task::create(['title' => '<script>alert("x")</script>', 'task_date' => today()]);
        $this->assertSame('pending', $task->fresh()->status);
        $this->get('/')->assertSee('&lt;script&gt;', false)->assertDontSee('<script>alert', false);
        $task->update(['title' => 'Updated task']);
        $this->get('/tasks')->assertSee('Updated task');
        $task->delete();
        $this->get('/tasks')->assertDontSee('Updated task');
    }

    public function test_duplicate_username_is_rejected(): void
    {
        $this->seed();
        $this->expectException(QueryException::class);
        User::create(['username' => 'mara', 'full_name' => 'Duplicate', 'email' => 'duplicate@example.com']);
    }

    public function test_missing_title_is_rejected(): void
    {
        $this->expectException(QueryException::class);
        Task::create(['task_date' => today()]);
    }

    public function test_migrations_can_rollback_and_rebuild(): void
    {
        $this->artisan('migrate:rollback', ['--force' => true])->assertSuccessful();
        $this->artisan('migrate', ['--force' => true])->assertSuccessful();
        $this->seed();
        $this->assertDatabaseCount('tasks', 9);
    }
}
