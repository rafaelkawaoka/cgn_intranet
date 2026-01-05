<?php

use App\Models\IntranetLink;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('intranet_links', function (Blueprint $table) {
            $table->string('category')->default('Geral')->after('id');
        });

        IntranetLink::create([
            'link' => 'https://sistemaconsular.serpro.gov.br',
            'description' => 'Sistema Consular (SCI)',
            'category' => 'Sistemas'
        ]);

        IntranetLink::create([
            'link' => 'https://www.gov.br/mre/pt-br/consulado-nagoia',
            'description' => 'Site Externo - CG Nagoia',
            'category' => 'Sites Externos'
        ]);

        IntranetLink::create([
            'link' => 'https://www.sermilweb.eb.mil.br/',
            'description' => 'Sermil Web',
            'category' => 'Sistemas'
        ]);

        IntranetLink::create([
            'link' => 'https://www.tse.jus.br/',
            'description' => 'Tribunal Superior Eletoral (TSE)',
            'category' => 'Sites Externos'
        ]);

        IntranetLink::create([
            'link' => 'https://www.mayors.or.jp/p_city/city_search_mayor/',
            'description' => 'Nomes de Prefeitos (全国市長会)',
            'category' => 'Sites Externos'
        ]);

        IntranetLink::create([
            'link' => 'https://intradocs.mre.gov.br/',
            'description' => 'Intradocs MRE',
            'category' => 'Sistemas'
        ]);

        IntranetLink::create([
            'link' => 'https://intratec.itamaraty.gov.br/',
            'description' => 'Intratec (cordilheira)',
            'category' => 'Sistemas'
        ]);

        IntranetLink::create([
            'link' => 'https://outlook.com',
            'description' => 'Email Itamaraty',
            'category' => 'Sistemas'
        ]);

        IntranetLink::create([
            'link' => 'https://www.serpro.gov.br/menu/suporte/css',
            'description' => 'Abertura de Ticket (SERPRO)',
            'category' => 'Sistemas'
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('intranet_links', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
};
