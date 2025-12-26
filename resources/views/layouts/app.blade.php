<!doctype html>
<html lang="pt-BR" class=" layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr" data-skin="default" data-bs-theme="light" data-assets-path="{{ asset('assets/') }}" data-template="vertical-menu-template-no-customizer-starter">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <meta name="robots" content="noindex, nofollow" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ env('APP_NAME') }}</title>

        <meta name="description" content="Sistema interno de informação do {{ env('APP_POSTO') }}" />
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/iconify-icons.css') }}" />

        <script src="{{ asset('assets/vendor/libs/@algolia/autocomplete-js.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
        <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
        <script src="{{ asset('assets/js/config.js') }}"></script>
        @yield('headscripts')
    </head>

    <body>
        <div class="layout-wrapper layout-content-navbar  ">
            <div class="layout-container">
                <aside id="layout-menu" class="layout-menu menu-vertical menu">
                    <div class="app-brand demo">
                        <a href="{{ route('home') }}" class="app-brand-link">
                            <span class="app-brand-logo demo">
                                <span class="text-primary">
                                    <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z" fill="currentColor" />
                                        <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                                        <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z" fill="currentColor" />
                                    </svg>
                                </span>
                            </span>
                            <span class="app-brand-text demo menu-text fw-bold ms-3">{{ env('APP_NAME') }}</span>
                        </a>
                        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                            <i class="icon-base ti menu-toggle-icon d-none d-xl-block"></i>
                            <i class="icon-base ti tabler-x d-block d-xl-none"></i>
                        </a>
                    </div>
                    <div class="menu-inner-shadow"></div>
                    <ul class="menu-inner py-1">
                        <li class="menu-header small">
                            <span class="menu-header-text" data-i18n=""></span>
                        </li>
                        <li class="menu-item{{ Route::is('home*') ? ' active' : '' }}">
                            <a href="{{ route('home') }}" class="menu-link">
                                <i class="menu-icon icon-base ti tabler-speakerphone"></i>
                                <div data-i18n="Mural de Avisos">Mural de Avisos</div>
                            </a>
                        </li>
                        <li class="menu-item{{ Route::is('telegramas*') ? ' active' : '' }}">
                            <a href="{{ route('telegramas') }}" class="menu-link">
                                <i class="menu-icon icon-base ti tabler-building-broadcast-tower"></i>
                                <div data-i18n="Telegramas">Telegramas</div>
                            </a>
                        </li>
                        <li class="menu-header small">
                            <span class="menu-header-text" data-i18n="Sistemas">Sistemas</span>
                        </li>
                        <li class="menu-item{{ Route::is('sistemas.administracao*') ? ' open' : '' }}" style="">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon icon-base ti tabler-building-bank"></i>
                                <div data-i18n="Administração">Administração</div>
                            </a>
                            <ul class="menu-sub">
                                <li class="menu-item{{ Route::is('sistemas.administracao.funcionarios*') ? ' active' : '' }}">
                                    <a href="{{ route('sistemas.administracao.funcionarios') }}" class="menu-link">
                                        <div data-i18n="Funcionários">Funcionários</div>
                                    </a>
                                </li>
                                <li class="menu-item{{ Route::is('sistemas.administracao.autorizacoes*') ? ' active' : '' }}">
                                    <a href="{{ route('sistemas.administracao.autorizacoes') }}" class="menu-link">
                                        <div data-i18n="Autorizações">Autorizações</div>
                                    </a>
                                </li>
                                <li class="menu-item{{ Route::is('sistemas.administracao.calendario*') ? ' active' : '' }}">
                                    <a href="{{ route('sistemas.administracao.calendario') }}" class="menu-link">
                                        <div data-i18n="Calendário">Calendário</div>
                                    </a>
                                </li>
                                <li class="menu-item{{ Route::is('sistemas.administracao.setores*') ? ' active' : '' }}">
                                    <a href="{{ route('sistemas.administracao.setores') }}" class="menu-link">
                                        <div data-i18n="Setores">Setores</div>
                                    </a>
                                </li>
                                <li class="menu-item{{ Route::is('sistemas.administracao.estoque*') ? ' active' : '' }}">
                                    <a href="{{ route('sistemas.administracao.estoque') }}" class="menu-link">
                                        <div data-i18n="Almoxarifado">Estoque</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item{{ Route::is('sistemas.contabilidade*') ? ' open' : '' }}" style="">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon icon-base ti tabler-scale"></i>
                                <div data-i18n="Contabilidade">Contabilidade</div>
                            </a>
                            <ul class="menu-sub">
                                <li class="menu-item{{ Route::is('sistemas.contabilidade.patrimonio*') ? ' active' : '' }}">
                                    <a href="{{ route('sistemas.contabilidade.patrimonio') }}" class="menu-link">
                                        <div data-i18n="Patrimônio">Patrimônio</div>
                                    </a>
                                </li>
                                <li class="menu-item{{ Route::is('sistemas.contabilidade.folha*') ? ' active' : '' }}">
                                    <a href="{{ route('sistemas.contabilidade.folha') }}" class="menu-link">
                                        <div data-i18n="Folha de Pagamento">Folha de Pagamento</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item{{ Route::is('sistemas.renda*') ? ' open' : '' }}" style="">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon icon-base ti tabler-coin-yen"></i>
                                <div data-i18n="Renda Consular">Renda Consular</div>
                            </a>
                            <ul class="menu-sub">
                                <li class="menu-item{{ Route::is('sistemas.renda.baixa*') ? ' active' : '' }}">
                                    <a href="{{ route('sistemas.renda.baixa') }}" class="menu-link">
                                        <div data-i18n="Baixa">Baixa</div>
                                    </a>
                                </li>
                                <li class="menu-item{{ Route::is('sistemas.renda.consultas*') ? ' active' : '' }}">
                                    <a href="{{ route('sistemas.renda.consultas') }}" class="menu-link">
                                        <div data-i18n="Consultas">Consultas</div>
                                    </a>
                                </li>
                                <li class="menu-item{{ Route::is('sistemas.renda.relatorios*') ? ' active' : '' }}">
                                    <a href="{{ route('sistemas.renda.relatorios') }}" class="menu-link">
                                        <div data-i18n="Relatórios">Relatórios</div>
                                    </a>
                                </li>
                                <li class="menu-item{{ Route::is('sistemas.renda.emolumentos*') ? ' active' : '' }}">
                                    <a href="{{ route('sistemas.renda.emolumentos') }}" class="menu-link">
                                        <div data-i18n="Emolumentos">Emolumentos</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item{{ Route::is('sistemas.atendimento*') ? ' open' : '' }}" style="">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon icon-base ti tabler-messages"></i>
                                <div data-i18n="Atendimento">Atendimento</div>
                            </a>
                            <ul class="menu-sub">
                                <li class="menu-item{{ Route::is('sistemas.atendimento.cadastros*') ? ' active' : '' }}">
                                    <a href="{{ route('sistemas.atendimento.cadastros') }}" class="menu-link">
                                        <div data-i18n="Cadastros">Cadastros</div>
                                    </a>
                                </li>
                                <li class="menu-item{{ Route::is('sistemas.atendimento.agendamentos*') ? ' active' : '' }}">
                                    <a href="{{ route('sistemas.atendimento.agendamentos') }}" class="menu-link">
                                        <div data-i18n="Agendamentos">Agendamentos</div>
                                    </a>
                                </li>
                                <li class="menu-item{{ Route::is('sistemas.atendimento.protocolos*') ? ' active' : '' }}">
                                    <a href="{{ route('sistemas.atendimento.protocolos') }}" class="menu-link">
                                        <div data-i18n="Protocolos">Protocolos</div>
                                    </a>
                                </li>
                                <li class="menu-item{{ Route::is('sistemas.atendimento.whatsapp*') ? ' active' : '' }}">
                                    <a href="{{ route('sistemas.atendimento.whatsapp') }}" class="menu-link">
                                        <div data-i18n="WhatsApp">WhatsApp</div>
                                    </a>
                                </li>
                                <li class="menu-item{{ Route::is('sistemas.atendimento.material*') ? ' active' : '' }}">
                                    <a href="{{ route('sistemas.atendimento.material') }}" class="menu-link">
                                        <div data-i18n="Material">Material</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item{{ Route::is('sistemas.informatica*') ? ' open' : '' }}" style="">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon icon-base ti tabler-device-desktop"></i>
                                <div data-i18n="Informática">Informática</div>
                            </a>
                            <ul class="menu-sub">
                                <li class="menu-item{{ Route::is('sistemas.informatica.computadores*') ? ' active' : '' }}">
                                    <a href="{{ route('sistemas.informatica.computadores') }}" class="menu-link">
                                        <div data-i18n="Computadores">Computadores</div>
                                    </a>
                                </li>
                                <li class="menu-item{{ Route::is('sistemas.informatica.impressoras*') ? ' active' : '' }}">
                                    <a href="{{ route('sistemas.informatica.impressoras') }}" class="menu-link">
                                        <div data-i18n="Impressoras">Impressoras</div>
                                    </a>
                                </li>
                                <li class="menu-item{{ Route::is('sistemas.informatica.acessos*') ? ' active' : '' }}">
                                    <a href="{{ route('sistemas.informatica.acessos') }}" class="menu-link">
                                        <div data-i18n="Acessos">Acessos</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item{{ Route::is('sistemas.assistencia*') ? ' open' : '' }}" style="">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon icon-base ti tabler-heart-handshake"></i>
                                <div data-i18n="Assistência">Assistência</div>
                            </a>
                            <ul class="menu-sub">
                                <li class="menu-item{{ Route::is('sistemas.assistencia.assistidos*') ? ' active' : '' }}">
                                    <a href="{{ route('sistemas.assistencia.assistidos') }}" class="menu-link">
                                        <div data-i18n="Assistidos">Assistidos</div>
                                    </a>
                                </li>
                                <li class="menu-item{{ Route::is('sistemas.assistencia.relatorios*') ? ' active' : '' }}">
                                    <a href="{{ route('sistemas.assistencia.relatorios') }}" class="menu-link">
                                        <div data-i18n="Relatórios">Relatórios</div>
                                    </a>
                                </li>
                                <li class="menu-item{{ Route::is('sistemas.assistencia.visitas*') ? ' active' : '' }}">
                                    <a href="{{ route('sistemas.assistencia.visitas') }}" class="menu-link">
                                        <div data-i18n="Visitas">Visitas</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item{{ Route::is('sistemas.cultural*') ? ' open' : '' }}" style="">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon icon-base ti tabler-masks-theater"></i>
                                <div data-i18n="Cultural">Cultural</div>
                            </a>
                            <ul class="menu-sub">
                                <li class="menu-item{{ Route::is('sistemas.cultural.eventos*') ? ' active' : '' }}">
                                    <a href="{{ route('sistemas.cultural.eventos') }}" class="menu-link">
                                        <div data-i18n="Eventos">Eventos</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item{{ Route::is('sistemas.midias*') ? ' open' : '' }}" style="">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon icon-base ti tabler-brand-instagram"></i>
                                <div data-i18n="Cultural">Mídias</div>
                            </a>
                            <ul class="menu-sub">
                                <li class="menu-item{{ Route::is('sistemas.midias.canais*') ? ' active' : '' }}">
                                    <a href="{{ route('sistemas.midias.canais') }}" class="menu-link">
                                        <div data-i18n="Canais">Canais</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-header small">
                            <span class="menu-header-text" data-i18n="Intranet">Intranet</span>
                        </li>
                        <li class="menu-item{{ Route::is('intranet.links*') ? ' active' : '' }}">
                            <a href="{{ route('intranet.links') }}" class="menu-link">
                                <i class="menu-icon icon-base ti tabler-link"></i>
                                <div data-i18n="Links">Links</div>
                            </a>
                        </li>
                        <li class="menu-item{{ Route::is('intranet.calendario*') ? ' active' : '' }}">
                            <a href="{{ route('intranet.calendario') }}" class="menu-link">
                                <i class="menu-icon icon-base ti tabler-calendar-week"></i>
                                <div data-i18n="Calendário">Calendário</div>
                            </a>
                        </li>
                        <li class="menu-item{{ Route::is('intranet.funcionarios*') ? ' active' : '' }}">
                            <a href="{{ route('intranet.funcionarios') }}" class="menu-link">
                                <i class="menu-icon icon-base ti tabler-users"></i>
                                <div data-i18n="Streaming">Funcionários</div>
                            </a>
                        </li>
                        <li class="menu-item{{ Route::is('intranet.streaming*') ? ' active' : '' }}">
                            <a href="{{ route('intranet.streaming') }}" class="menu-link">
                                <i class="menu-icon icon-base ti tabler-player-play"></i>
                                <div data-i18n="Streaming">Streaming CCTV</div>
                            </a>
                        </li>
                        <li class="menu-item{{ Route::is('intranet.notas-servico*') ? ' active' : '' }}">
                            <a href="{{ route('intranet.notas-servico') }}" class="menu-link">
                                <i class="menu-icon icon-base ti tabler-file-certificate"></i>
                                <div data-i18n="Notas de Serviço">Notas de Serviço</div>
                            </a>
                        </li>
                        <li class="menu-item{{ Route::is('intranet.mala-diplomatica*') ? ' active' : '' }}">
                            <a href="{{ route('intranet.mala-diplomatica') }}" class="menu-link">
                                <i class="menu-icon icon-base ti tabler-briefcase"></i>
                                <div data-i18n="Mala Diplomática">Mala Diplomática</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link btn-logout" style="cursor: pointer;">
                                <i class="menu-icon icon-base ti tabler-power"></i>
                                <div data-i18n="Sair">Sair</div>
                            </a>
                        </li>
                    </ul>
                </aside>
                <div class="menu-mobile-toggler d-xl-none rounded-1">
                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
                        <i class="ti tabler-menu icon-base"></i>
                        <i class="ti tabler-chevron-right icon-base"></i>
                    </a>
                </div>
                <div class="layout-page">
                    <nav class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
                        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
                            <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                                <i class="icon-base ti tabler-menu-2 icon-md"></i>
                            </a>
                        </div>
                        <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
                            <ul class="navbar-nav flex-row align-items-center ms-md-auto">
                                <li class="nav-item dropdown-notifications navbar-dropdown dropdown" title="Fila de impressão">
                                    <a class="nav-link btn btn-icon btn-text-secondary rounded-pill waves-effect" href="javascript:void(0);">
                                        <span class="position-relative">
                                            <i class="icon-base ti tabler-printer icon-22px text-heading"></i>
                                            <span class="badge rounded-pill bg-danger badge-dot badge-notifications border"></span>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown-notifications navbar-dropdown dropdown" title="Telegramas">
                                    <a class="nav-link btn btn-icon btn-text-secondary rounded-pill waves-effect" href="javascript:void(0);">
                                        <span class="position-relative">
                                            <i class="icon-base ti tabler-building-broadcast-tower icon-22px text-heading"></i>
                                            <span class="badge rounded-pill bg-danger badge-dot badge-notifications border"></span>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-2" title="Solicitações">
                                    <a class="nav-link btn btn-icon btn-text-secondary rounded-pill waves-effect" href="javascript:void(0);">
                                        <span class="position-relative">
                                            <i class="icon-base ti tabler-arrow-autofit-right icon-22px text-heading"></i>
                                            <span class="badge rounded-pill bg-danger badge-dot badge-notifications border"></span>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                    <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <div class="avatar avatar-online">
                                            <img src="{{ asset('assets/img/placeholders/user_placeholder.jpg') }}" alt class="rounded-circle border" />
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar avatar-online">
                                                        <img src="{{ asset('assets/img/placeholders/user_placeholder.jpg') }}" alt class="w-px-40 h-auto rounded-circle border" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                                                        <small class="text-body-secondary">{{ env('APP_POSTO_ABREV') }}</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider my-1 mx-n2"></div>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="icon-base ti tabler-lock icon-md me-3"></i><span>Alterar Senha</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="icon-base ti tabler-user-square icon-md me-3"></i><span>Meu Cadastro</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('saldos') }}">
                                                <i class="icon-base ti tabler-chart-bar icon-md me-3"></i><span>Meus Saldos</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('ponto') }}">
                                                <i class="icon-base ti tabler-hand-click icon-md me-3"></i><span>Ponto Digital</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('solicitacoes') }}">
                                                <i class="icon-base ti tabler-arrow-autofit-right icon-md me-3"></i><span>Solicitações</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('intranet.material') }}">
                                                <i class="icon-base ti tabler-pencil-star icon-md me-3"></i><span>Material</span>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider my-1 mx-n2"></div>
                                        </li>
                                        <li>
                                            <a class="dropdown-item btn-logout" href="javascript:void(0);">
                                                <i class="icon-base ti tabler-power icon-md me-3"></i><span>Sair</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    <div class="content-wrapper">
                        <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                        </div>
                        <footer class="content-footer footer bg-footer-theme">
                            <div class="container-xxl">
                                <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                                    <div class="text-body">
                                        &#169; 2025 -
                                        Consulado-Geral do Brasil em Nagoia
                                    </div>
                                    <div class="d-none d-lg-inline-block">
                                       Rafael Kawaoka
                                    </div>
                                </div>
                            </div>
                        </footer>
                        <div class="content-backdrop fade"></div>
                    </div>
                </div>
            </div>
            <div class="layout-overlay layout-menu-toggle"></div>
            <div class="drag-target"></div>
            <form id="form-logout" action="{{ route('logout') }}" method="post">
                @csrf
            </form>
        </div>
        <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
        <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
        <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script src="{{ asset('assets/js/intranet.js') }}"></script>
        @yield('scripts')
        <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('close-modal', ({ id }) => {
                const modalEl = document.getElementById(id)
                if (!modalEl) return
                const modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl)
                modal.hide()
            })
        })
        </script>
    </body>
</html>
