<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);
Route::get('/', [App\Http\Controllers\IntranetHomeController::class, 'index'])->name('home');
Route::get('/telegramas', [App\Http\Controllers\IntranetTelegramasController::class, 'index'])->name('telegramas');
Route::get('/saldos', [App\Http\Controllers\IntranetSaldosController::class, 'index'])->name('saldos');
Route::get('/ponto', [App\Http\Controllers\IntranetPontoController::class, 'index'])->name('ponto');
Route::get('/solicitacoes', [App\Http\Controllers\IntranetSolicitacoesController::class, 'index'])->name('solicitacoes');

Route::prefix('sistemas')->name('sistemas.')->group(function () {

    Route::prefix('administracao')->name('administracao.')->group(function () {
        Route::get('/funcionarios', [App\Http\Controllers\SistemasAdministracaoFuncionariosController::class, 'index'])->name('funcionarios');
        Route::get('/funcionarios/{id}', [App\Http\Controllers\SistemasAdministracaoFuncionariosController::class, 'funcionario'])->name('funcionarios.funcionario');
        Route::get('/autorizacoes', [App\Http\Controllers\SistemasAdministracaoAutorizacoesController::class, 'index'])->name('autorizacoes');
        Route::get('/calendario', [App\Http\Controllers\SistemasAdministracaoCalendarioController::class, 'index'])->name('calendario');
        Route::get('/setores', [App\Http\Controllers\SistemasAdministracaoSetoresController::class, 'index'])->name('setores');
        Route::get('/estoque', [App\Http\Controllers\SistemasAdministracaoEstoqueController::class, 'index'])->name('estoque');
    });

    Route::prefix('assistencia')->name('assistencia.')->group(function () {
        Route::get('/assistidos', [App\Http\Controllers\SistemasAssistenciaAssistidosController::class, 'index'])->name('assistidos');
        Route::get('/relatorios', [App\Http\Controllers\SistemasAssistenciaRelatoriosController::class, 'index'])->name('relatorios');
        Route::get('/visitas', [App\Http\Controllers\SistemasAssistenciaVisitasController::class, 'index'])->name('visitas');
    });

    Route::prefix('atendimento')->name('atendimento.')->group(function () {
        Route::get('/cadastros', [App\Http\Controllers\SistemasAtendimentoCadastrosController::class, 'index'])->name('cadastros');
        Route::get('/cadastros/{id}', [App\Http\Controllers\SistemasAtendimentoCadastrosController::class, 'cadastro'])->name('cadastros.cadastro');
        Route::get('/agendamentos', [App\Http\Controllers\SistemasAtendimentoAgendamentosController::class, 'index'])->name('agendamentos');
        Route::get('/protocolos', [App\Http\Controllers\SistemasAtendimentoProtocolosController::class, 'index'])->name('protocolos');
        Route::get('/whatsapp', [App\Http\Controllers\SistemasAtendimentoWhatsAppController::class, 'index'])->name('whatsapp');
        Route::get('/material', [App\Http\Controllers\SistemasAtendimentoMaterialController::class, 'index'])->name('material');
    });

    Route::prefix('contabilidade')->name('contabilidade.')->group(function () {
        Route::get('/patrimonio', [App\Http\Controllers\SistemasContabilidadePatrimonioController::class, 'index'])->name('patrimonio');
        Route::get('/folha', [App\Http\Controllers\SistemasContabilidadeFolhaController::class, 'index'])->name('folha');
    });

    Route::prefix('cultural')->name('cultural.')->group(function () {
        Route::get('/eventos', [App\Http\Controllers\SistemasCulturalEventosController::class, 'index'])->name('eventos');
    });

    Route::prefix('midias')->name('midias.')->group(function () {
        Route::get('/canais', [App\Http\Controllers\SistemasMidiasCanaisController::class, 'index'])->name('canais');
    });

    Route::prefix('informatica')->name('informatica.')->group(function () {
        Route::get('/computadores', [App\Http\Controllers\SistemasInformaticaComputadoresController::class, 'index'])->name('computadores');
        Route::get('/impressoras', [App\Http\Controllers\SistemasInformaticaImpressorasController::class, 'index'])->name('impressoras');
        Route::get('/acessos', [App\Http\Controllers\SistemasInformaticaAcessosController::class, 'index'])->name('acessos');
    });

    Route::prefix('renda')->name('renda.')->group(function () {
        Route::get('/baixa', [App\Http\Controllers\SistemasRendaBaixaController::class, 'index'])->name('baixa');
        Route::get('/consultas', [App\Http\Controllers\SistemasRendaConsultasController::class, 'index'])->name('consultas');
        Route::get('/relatorios', [App\Http\Controllers\SistemasRendaRelatoriosController::class, 'index'])->name('relatorios');
        Route::get('/emolumentos', [App\Http\Controllers\SistemasRendaEmolumentosController::class, 'index'])->name('emolumentos');
    });

});








Route::prefix('intranet')->name('intranet.')->group(function () {
    Route::get('/links', [App\Http\Controllers\IntranetLinksController::class, 'index'])->name('links');
    Route::get('/material', [App\Http\Controllers\IntranetMaterialController::class, 'index'])->name('material');
    Route::get('/calendario', [App\Http\Controllers\IntranetCalendarioController::class, 'index'])->name('calendario');
    Route::get('/funcionarios', [App\Http\Controllers\IntranetFuncionariosController::class, 'index'])->name('funcionarios');
    Route::get('/streaming', [App\Http\Controllers\IntranetStreamingController::class, 'index'])->name('streaming');
    Route::get('/notas-servico', [App\Http\Controllers\IntranetNotasServicoController::class, 'index'])->name('notas-servico');
    Route::get('/mala-diplomatica', [App\Http\Controllers\IntranetMalaDiplomaticaController::class, 'index'])->name('mala-diplomatica');
});
