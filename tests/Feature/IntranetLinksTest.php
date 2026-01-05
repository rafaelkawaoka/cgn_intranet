<?php

namespace Tests\Feature;

use App\Models\IntranetLink;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class IntranetLinksTest extends TestCase
{
    use RefreshDatabase;

    public function test_intranet_links_page_contains_livewire_component()
    {
        $user = User::create([
            'name' => 'Test User',
            'username' => 'test.user',
            'password' => bcrypt('password'),
            'is_active' => true,
        ]);

        $this->actingAs($user)
            ->get(route('intranet.links'))
            ->assertSuccessful()
            ->assertSeeLivewire('intranet.links');
    }

    public function test_can_create_link()
    {
        Livewire::test('intranet.links')
            ->set('description', 'Test Link')
            ->set('link', 'https://example.com')
            ->call('store')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('intranet_links', [
            'description' => 'Test Link',
            'link' => 'https://example.com',
        ]);
    }

    public function test_can_update_link()
    {
        $link = IntranetLink::create([
            'description' => 'Old Description',
            'link' => 'https://old.com',
        ]);

        Livewire::test('intranet.links')
            ->call('edit', $link->id)
            ->set('description', 'New Description')
            ->set('link', 'https://new.com')
            ->call('update')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('intranet_links', [
            'id' => $link->id,
            'description' => 'New Description',
            'link' => 'https://new.com',
        ]);
    }

    public function test_can_delete_link()
    {
        $link = IntranetLink::create([
            'description' => 'To Delete',
            'link' => 'https://delete.com',
        ]);

        Livewire::test('intranet.links')
            ->call('delete', $link->id);

        $this->assertDatabaseMissing('intranet_links', [
            'id' => $link->id,
        ]);
    }

    public function test_validation_works()
    {
        Livewire::test('intranet.links')
            ->set('description', '')
            ->set('link', 'not-a-url')
            ->call('store')
            ->assertHasErrors(['description', 'link']);
    }
}
