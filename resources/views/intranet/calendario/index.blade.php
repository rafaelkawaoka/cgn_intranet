@extends('layouts.app')

@section('content')
<div class="row">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
        <div class="d-flex flex-column justify-content-center">
            <h4 class="mb-1">Calendário Geral</h4>
            <p class="mb-0">Visualização do calendário gerencial</p>
        </div>
        <div class="d-flex align-content-center flex-wrap gap-4">
            <button type="submit" class="btn btn-primary waves-effect waves-light">Nova publicação</button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header header-elements">
                <h5 class="mb-0 me-2">Dezembro de 2025</h5>
                <div class="card-header-elements ms-auto">
                    <button type="button" class="btn btn-xs btn-primary waves-effect waves-light">
                        <span class="icon-base ti tabler-plus icon-xs me-1"></span>Adicionar
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-calendar">
                <table class="border"  style="min-width: 100%">
                    <tbody>
                        <tr style="height: 35px">
                            <th class="text-center text-white bg-primary">Gabinete (2)</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Segunda-Feira">01</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Terça-Feira">02</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Quarta-Feira">03</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Quinta-Feira">04</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Sexta-Feira">05</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Sábado">06</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Domingo">07</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Segunda-Feira">08</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Terça-Feira">09</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Quarta-Feira">10</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Quinta-Feira">11</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Sexta-Feira">12</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Sábado">13</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Domingo">14</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Segunda-Feira">15</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Terça-Feira">16</th>
                            <th class="tg-0lax text-center text-white bg-warning" style="width: 35px; border: 1px solid #dededf" title="Quarta-Feira">17</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Quinta-Feira">18</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Sexta-Feira">19</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Sábado">20</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Domingo">21</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Segunda-Feira">22</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Terça-Feira">23</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Quarta-Feira">24</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Quinta-Feira">25</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Sexta-Feira">26</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Sábado">27</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Domingo">28</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Segunda-Feira">29</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Terça-Feira">30</th>
                            <th class="tg-0lax text-center text-white bg-primary" style="width: 35px; border: 1px solid #dededf" title="Quarta-Feira">31</th>
                        </tr>
                        @for ($i = 0; $i < 42; $i++)
                        <tr style="height: 35px;">
                            <td style="border: 1px solid #dededf; border-spacing: 1px;" class="ps-3">Nome do Funcionário</td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                            <td style="border: 1px solid #dededf; border-spacing: 1px;"></td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
