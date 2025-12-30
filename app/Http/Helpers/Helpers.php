<?php

use Carbon\Carbon;

function calcularIdade($dataNascimento) {
    return Carbon::parse($dataNascimento)->age;
}

function capitalizarNome($nome) {
    if(!$nome){
        return null;
    }
    $excecoes = ['da', 'de', 'do', 'dos', 'das', 'e'];
    $palavras = explode(' ', strtolower($nome));
    $resultado = array_map(function ($palavra) use ($excecoes) {
        return in_array($palavra, $excecoes) ? $palavra : ucfirst($palavra);
    }, $palavras);
    $resultado[0] = ucfirst($resultado[0]);
    $retorno = implode(' ', $resultado);
    return $retorno;
}

function dataPorExtenso($data) {
    $dia = (int)date('d', strtotime($data));
    $mes = (int)date('m', strtotime($data));
    $ano = date('Y', strtotime($data));
    $nomeDia = strtolower(nomeDoDia((int)date('N', strtotime($data))));
    $nomeMes = strtolower(nomeDoMes($mes));
    return "$nomeDia, $dia de $nomeMes de $ano";
}

function diasDeFerias($inicio, $termino) {
    $dataInicio = Carbon::parse($inicio);
    $dataTermino = Carbon::parse($termino);
    if ($dataInicio > $dataTermino) {
        $temp = $dataInicio;
        $dataInicio = $dataTermino;
        $dataTermino = $temp;
    }
    $diasDeFerias = $dataInicio->diffInDays($dataTermino) + 1;
    return (int) $diasDeFerias;
}

function diasUteisNoMes($ano, $mes) {
    $inicio = Carbon::create($ano, $mes, 1);
    $fim = $inicio->copy()->endOfMonth();
    $diasUteis = 0;
    for ($data = $inicio->copy(); $data <= $fim; $data->addDay()) {
        $dataStr = $data->toDateString();
        if ($data->isWeekend()) {
            continue;
        }
        if (isFeriado($dataStr)) {
            continue;
        }
        $diasUteis++;
    }
    return $diasUteis;
}

function diaUtilAnterior($data) {
    $dataCarbon = Carbon::parse($data);
    while ($dataCarbon->isWeekend() || isFeriado($dataCarbon->toDateString())) {
        $dataCarbon->subDay();
    }
    return $dataCarbon->toDateString();
}

function diaUtilSeguinte($data) {
    $dataCarbon = Carbon::parse($data);
    while ($dataCarbon->isWeekend() || isFeriado($dataCarbon->toDateString())) {
        $dataCarbon->addDay();
    }
    return $dataCarbon->toDateString();
}

function diferencaEmMinutos($dataInicio, $dataFim) {
    $inicio = Carbon::parse($dataInicio)->setSeconds(0);
    $fim = Carbon::parse($dataFim)->setSeconds(0);
    return (int) $inicio->diffInMinutes($fim);
}

function diferencaEntreDatas($data1, $data2, $incluirAntesDepois = true) {
    $timestamp1 = strtotime($data1);
    $timestamp2 = strtotime($data2);
    $diferenca = abs($timestamp2 - $timestamp1);
    $antesOuDepois = $timestamp2 < $timestamp1 ? 'antes' : 'depois';
    $resultado = '';
    if ($diferenca < 60) {
        $resultado = "Agora mesmo";
    } elseif ($diferenca < 60 * 60) {
        $minutos = floor($diferenca / 60);
        $resultado = "$minutos minuto" . ($minutos > 1 ? 's' : '');
    } elseif ($diferenca < 24 * 60 * 60) {
        $horas = floor($diferenca / (60 * 60));
        $resultado = "$horas hora" . ($horas > 1 ? 's' : '');
    } elseif ($diferenca < 30 * 24 * 60 * 60) {
        $dias = floor($diferenca / (24 * 60 * 60));
        $resultado = "$dias dia" . ($dias > 1 ? 's' : '');
    } elseif ($diferenca < 365 * 24 * 60 * 60) {
        $meses = floor($diferenca / (30 * 24 * 60 * 60));
        $resultado = "$meses mês" . ($meses > 1 ? 'es' : '');
    } else {
        $anos = floor($diferenca / (365 * 24 * 60 * 60));
        $resultado = "$anos ano" . ($anos > 1 ? 's' : '');
    }
    if ($incluirAntesDepois) {
        return "$resultado $antesOuDepois";
    }
    return $resultado;
}

function formataData($data) {
    $carbonData = Carbon::parse($data);
    if ($carbonData->format('H:i:s') == '00:00:00') {
        return $carbonData->format('d/m/Y');
    }
    return $carbonData->format('d/m/Y H:i');
}

function formataMoeda($valor) {
    return number_format($valor, 2, ',', '.');
}

function formataNumero($numero) {
    return number_format($numero, 0, ',', '.');
}

function isFeriado($data){
    static $feriados = [
        '2025-12-25',
        '2025-12-31',
        '2026-01-01',
    ];
    return in_array($data, $feriados, true);
}

function isFimDeSemana($data) {
    return Carbon::parse($data)->isWeekend();
}

function minutosPorHora(string $inicio, string $fim): array {
    $inicio = Carbon::parse($inicio)->startOfMinute();
    $fim    = Carbon::parse($fim)->startOfMinute();
    if ($inicio->greaterThanOrEqualTo($fim)) {
        return [];
    }
    $resultado = [];
    $dataAtual = $inicio->toDateString();
    $grupoHoras = [
        'data'             => $dataAtual,
        'diasemana'        => nomeDoDia($inicio->dayOfWeek + 1),
        'fimdesemana'      => $inicio->isWeekend(),
        'feriado'          => isFeriado($dataAtual),
        'horas'            => [],
        'total_minutos'    => 0,
        'minutos_diurnos'  => 0,
        'minutos_noturnos' => 0,
    ];
    while ($inicio < $fim) {
        if ($inicio->toDateString() !== $dataAtual) {
            $resultado[] = $grupoHoras;
            $dataAtual = $inicio->toDateString();
            $grupoHoras = [
                'data'             => $dataAtual,
                'diasemana'        => nomeDoDia($inicio->dayOfWeek + 1),
                'fimdesemana'      => $inicio->isWeekend(),
                'feriado'          => isFeriado($dataAtual),
                'horas'            => [],
                'total_minutos'    => 0,
                'minutos_diurnos'  => 0,
                'minutos_noturnos' => 0,
            ];
        }
        $fimTeorico = $inicio->copy()->startOfHour()->addHour();
        $fimBloco = $fimTeorico->lt($fim) ? $fimTeorico : $fim->copy();
        if ($fimBloco->lessThanOrEqualTo($inicio)) {
            break;
        }
        $inicioStr  = $inicio->format('H:i');
        $terminoStr = $fimBloco->format('H:i');
        $minutos = (int) $inicio->diffInMinutes($fimBloco);
        $noturno = $inicio->hour >= 22 || $inicio->hour < 6;
        $grupoHoras['horas'][] = [
            'hora'     => $inicio->format('H'),
            'inicio'   => $inicioStr,
            'termino'  => $terminoStr,
            'noturno'  => $noturno,
            'minutos'  => $minutos, // ✔ 100% INT
        ];
        $grupoHoras['total_minutos'] += $minutos;

        if ($noturno) {
            $grupoHoras['minutos_noturnos'] += $minutos;
        } else {
            $grupoHoras['minutos_diurnos'] += $minutos;
        }
        $inicio = $fimBloco->copy();
    }
    $resultado[] = $grupoHoras;
    return $resultado;
}


function nomeDoMes($numero, $abreviar = false) {
    $meses = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
    return $abreviar ? substr($meses[$numero - 1], 0, 3) : $meses[$numero - 1];
}

function nomeDoDia($numero, $abreviar = false) {
    $dias = ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'];
    return $abreviar ? mb_substr($dias[$numero - 1], 0, 3, 'UTF-8') : $dias[$numero - 1];
}

function nomeExibicao($nomeCompleto) {
    $nomes = explode(' ', $nomeCompleto);
    return $nomes[0] . ' ' . $nomes[count($nomes) - 1];
}

function tempoPassado($data) {
    $dataPassada = strtotime($data);
    $agora = time();
    $diferenca = $agora - $dataPassada;
    if ($diferenca <= 5 * 60) {
        return "agora há pouco";
    }
    elseif ($diferenca <= 59 * 60) {
        $minutos = floor($diferenca / 60);
        return "$minutos minuto" . ($minutos > 1 ? 's' : '') . " atrás";
    }
    elseif ($diferenca <= 23 * 60 * 60) {
        $horas = floor($diferenca / (60 * 60));
        return "$horas hora" . ($horas > 1 ? 's' : '') . " atrás";
    }
    elseif ($diferenca <= 29 * 24 * 60 * 60) {
        $dias = floor($diferenca / (24 * 60 * 60));
        return "$dias dia" . ($dias > 1 ? 's' : '') . " atrás";
    }
    elseif ($diferenca <= 365 * 24 * 60 * 60) {
        $meses = floor($diferenca / (30 * 24 * 60 * 60));
        return "$meses mês" . ($meses > 1 ? 'es' : '') . " atrás";
    }
    else {
        $anos = floor($diferenca / (365 * 24 * 60 * 60));
        $meses = floor(($diferenca % (365 * 24 * 60 * 60)) / (30 * 24 * 60 * 60));
        if ($meses > 0) {
            return "$anos ano" . ($anos > 1 ? 's' : '') . " e $meses mês" . ($meses > 1 ? 'es' : '') . " atrás";
        }
        return "$anos ano" . ($anos > 1 ? 's' : '') . " atrás";
    }
}

function ultimoDiaUtilDoMes($ano, $mes) {
    $ultimoDia = Carbon::create($ano, $mes, 1)->endOfMonth();
    while ($ultimoDia->isWeekend() || isFeriado($ultimoDia->toDateString())) {
        $ultimoDia->subDay();
    }
    return $ultimoDia->toDateString();
}
