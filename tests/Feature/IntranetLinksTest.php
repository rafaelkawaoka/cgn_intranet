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
            ->set('category', 'Tools')
            ->set('description', 'Test Link')
            ->set('link', 'https://example.com')
            ->call('store')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('intranet_links', [
            'category' => 'Tools',
            'description' => 'Test Link',
            'link' => 'https://example.com',
        ]);
    }

    public function test_can_update_link()
    {
        $link = IntranetLink::create([
            'category' => 'General',
            'description' => 'Old Description',
            'link' => 'https://old.com',
        ]);

        Livewire::test('intranet.links')
            ->call('edit', $link->id)
            ->set('category', 'Updated Cat')
            ->set('description', 'New Description')
            ->set('link', 'https://new.com')
            ->call('update')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('intranet_links', [
            'id' => $link->id,
            'category' => 'Updated Cat',
            'description' => 'New Description',
            'link' => 'https://new.com',
        ]);
    }

    public function test_links_are_sorted_by_category_then_description()
    {
        IntranetLink::create(['category' => 'B', 'description' => 'Z', 'link' => 'http://b.com']);
        IntranetLink::create(['category' => 'A', 'description' => 'Y', 'link' => 'http://a.com']);
        IntranetLink::create(['category' => 'A', 'description' => 'X', 'link' => 'http://a.com']);

        Livewire::test('intranet.links')
            ->assertSeeInOrder(['X', 'Y', 'Z']);
            // A-X, A-Y, B-Z
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
// Verified restoration
