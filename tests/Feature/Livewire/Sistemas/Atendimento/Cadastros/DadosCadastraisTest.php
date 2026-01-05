<?php

namespace Tests\Feature\Livewire\Sistemas\Atendimento\Cadastros;

use App\Livewire\Sistemas\Atendimento\Cadastros\DadosCadastrais;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Occupation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class DadosCadastraisTest extends TestCase
{
    use RefreshDatabase;

    public function test_component_renders_correctly()
    {
        $user = User::create([
            'name' => 'Test User',
            'username' => 'testuser',
            'password' => bcrypt('password'),
        ]);

        $customer = Customer::create([
            'nome' => 'John Doe',
            'matricula' => 'JPN123456',
            'created_by' => $user->id,
            'updated_by' => $user->id,
        ]);

        Livewire::test(DadosCadastrais::class, ['cadastro' => $customer])
            ->assertStatus(200)
            ->assertSet('nome', 'John Doe');
    }

    public function test_can_update_customer_data_and_contacts()
    {
        $user = User::create([
            'name' => 'Test User',
            'username' => 'testuser2',
            'password' => bcrypt('password'),
        ]);

        $this->actingAs($user);

        $customer = Customer::create([
            'nome' => 'Old Name',
            'matricula' => 'JPN123456',
            'created_by' => $user->id,
            'updated_by' => $user->id,
        ]);

        $occupation = Occupation::create(['profissao' => 'Developer', 'profissaoM' => 'Developer', 'profissaoF' => 'Developer']);
        $country = Country::create(['pais' => 'Brazil', 'gentilico' => 'Brasileiro', 'gentilicoM' => 'Brasileiro', 'gentilicoF' => 'Brasileira', 'codPais' => 'BRA']);

        Livewire::test(DadosCadastrais::class, ['cadastro' => $customer])
            // Dados Cadastrais
            ->set('nome', 'New Name')
            ->set('sexo', 'M')
            ->set('occupation_id', $occupation->id)
            ->set('nacionalidades', [$country->id])
            // Documentos
            ->set('cpf', '12345678900')
            ->set('identidade_numero', 'RG123')
            // Contatos
            ->call('addPhone')
            ->set('phones.0.numero', '11999999999')
            ->set('phones.0.tipo', 'Celular')
            ->call('addEmail')
            ->set('emails.0.email', 'test@test.com')
            ->set('emails.0.tipo', 'Pessoal')
            ->call('save')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('customers', [
            'id' => $customer->id,
            'nome' => 'New Name',
            'sexo' => 'M',
            'occupation_id' => $occupation->id,
            'cpf' => '12345678900',
            'identidade_numero' => 'RG123',
            'telefone_celular' => '11999999999', // Should sync primary
            'email' => 'test@test.com', // Should sync primary
        ]);

        $this->assertDatabaseHas('customer_nationality', [
            'customer_id' => $customer->id,
            'country_id' => $country->id,
        ]);

        $this->assertDatabaseHas('customer_phones', [
            'customer_id' => $customer->id,
            'numero' => '11999999999',
        ]);

        $this->assertDatabaseHas('customer_emails', [
            'customer_id' => $customer->id,
            'email' => 'test@test.com',
        ]);
    }

    public function test_place_of_birth_logic_brazil()
    {
        $user = User::create([
            'name' => 'Test User',
            'username' => 'testuser3',
            'password' => bcrypt('password'),
        ]);

        $this->actingAs($user);

        $customer = Customer::create(['matricula' => 'TEST001']);

        $brazil = Country::create(['pais' => 'Brazil', 'codPais' => 'BRA', 'gentilico' => 'B', 'gentilicoM' => 'B', 'gentilicoF' => 'B']);

        Livewire::test(DadosCadastrais::class, ['cadastro' => $customer])
            ->set('nome', 'Test')
            ->set('pais_nascimento_id', $brazil->id)
            ->set('estado_nascimento_jp_id', 1)
            ->call('save');

        $customer->refresh();
        $this->assertEquals($brazil->id, $customer->pais_nascimento_id);
        $this->assertNull($customer->estado_nascimento_jp_id);
    }
}
