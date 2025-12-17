<div class="modal fade" id="modal-nova-solicitacao" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Nova Solicitação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="row">
                        <input type="hidden" name="solicitacao_data" id="solicitacao_data" value="">
                        <div class="col-md-12 mb-2">
                            <div class="form-check custom-option custom-option-basic checked">
                                <label class="form-check-label custom-option-content" for="correcaoPonto">
                                    <input name="solicitacao_tipo" class="form-check-input" type="radio" value="correcao_ponto" id="correcaoPonto">
                                    <span class="custom-option-header">
                                        <span class="h6 mb-0">Correção de registro de ponto</span>
                                        <small class="text-body-secondary"></small>
                                    </span>
                                    <span class="custom-option-body">
                                        <small>Retificar inconsistências no registro de ponto digital.</small>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="form-check custom-option custom-option-basic checked">
                                <label class="form-check-label custom-option-content" for="utilizacaoHoras">
                                    <input name="solicitacao_tipo" class="form-check-input" type="radio" value="utilizacao_horas" id="utilizacaoHoras">
                                    <span class="custom-option-header">
                                        <span class="h6 mb-0">Utilização de banco de horas</span>
                                        <small class="text-body-secondary"></small>
                                    </span>
                                    <span class="custom-option-body">
                                        <small>Indicar ausência com compensação em banco de horas.</small>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="form-check custom-option custom-option-basic checked">
                                <label class="form-check-label custom-option-content" for="indicacaoAusencia">
                                    <input name="solicitacao_tipo" class="form-check-input" type="radio" value="indicacao_ausencia" id="indicacaoAusencia">
                                    <span class="custom-option-header">
                                        <span class="h6 mb-0">Indicação de ausência justificada</span>
                                        <small class="text-body-secondary"></small>
                                    </span>
                                    <span class="custom-option-body">
                                        <small>Indicar ausência com apresentação de comprovante.</small>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="form-check custom-option custom-option-basic checked">
                                <label class="form-check-label custom-option-content" for="trabalhoExtraordinario">
                                    <input name="solicitacao_tipo" class="form-check-input" type="radio" value="trabalho_extraordinario" id="trabalhoExtraordinario">
                                    <span class="custom-option-header">
                                        <span class="h6 mb-0">Indicação de trabalho extraordinário</span>
                                        <small class="text-body-secondary"></small>
                                    </span>
                                    <span class="custom-option-body">
                                        <small>Informar a realização de trablaho presencial extraordinário.</small>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="form-check custom-option custom-option-basic checked">
                                <label class="form-check-label custom-option-content" for="atividadeComplementar">
                                    <input name="solicitacao_tipo" class="form-check-input" type="radio" value="atividade_complementar" id="atividadeComplementar">
                                    <span class="custom-option-header">
                                        <span class="h6 mb-0">Inclusão de atividade complementar</span>
                                        <small class="text-body-secondary"></small>
                                    </span>
                                    <span class="custom-option-body">
                                        <small>Trabalho extraordinário fora do horário normal.</small>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="form-check custom-option custom-option-basic checked">
                                <label class="form-check-label custom-option-content" for="trabalhoRemoto">
                                    <input name="solicitacao_tipo" class="form-check-input" type="radio" value="trabalho_remoto" id="trabalhoRemoto">
                                    <span class="custom-option-header">
                                        <span class="h6 mb-0">Solicitação de trabalho remoto</span>
                                        <small class="text-body-secondary"></small>
                                    </span>
                                    <span class="custom-option-body">
                                        <small>Solicitar autorização para trabalhar remotamente.</small>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="form-check custom-option custom-option-basic checked">
                                <label class="form-check-label custom-option-content" for="agendamentoFerias">
                                    <input name="solicitacao_tipo" class="form-check-input" type="radio" value="agendamento_ferias" id="agendamentoFerias">
                                    <span class="custom-option-header">
                                        <span class="h6 mb-0">Agendamento de férias</span>
                                        <small class="text-body-secondary"></small>
                                    </span>
                                    <span class="custom-option-body">
                                        <small>Solicitar agendamento de período de férias.</small>
                                    </span>
                                </label>
                            </div>
                        </div>
                        @if ($date == false)
                        <div class="col-md-12 mb-2">
                            <div class="form-check custom-option custom-option-basic checked">
                                <label class="form-check-label custom-option-content" for="atestadoTrabalho">
                                    <input name="solicitacao_tipo" class="form-check-input" type="radio" value="atestado_trabalho" id="atestadoTrabalho">
                                    <span class="custom-option-header">
                                        <span class="h6 mb-0">Atestado de trabalho</span>
                                        <small class="text-body-secondary"></small>
                                    </span>
                                    <span class="custom-option-body">
                                        <small>Solicitar atestado de trabalho.</small>
                                    </span>
                                </label>
                            </div>
                        </div>
                        @endif
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                    Cancelar
                </button>
                <button type="button" class="btn btn-primary">Próximo</button>
            </div>
        </div>
    </div>
</div>
