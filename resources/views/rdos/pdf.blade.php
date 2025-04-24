<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-size: 12px;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 0;
        }
        .card {
            page-break-inside: avoid;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            word-wrap: break-word;
            overflow-wrap: break-word;
            padding: 10px;
            border: 1px solid #ddd;
        }
        ul {
            padding-left: 20px;
        }
        @media print {
            body {
                margin: 0;
                padding: 0;
            }
            .container {
                margin: 0;
                padding: 0;
            }
            .card {
                box-shadow: none;
                border: none;
            }
            hr {
                border: 1px solid #000;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg rounded">
                    <div class="card-header text-center bg-white">
                        <h4>Relatório Diário de Obra - {{ \Carbon\Carbon::parse($rdo->data)->format('d/m/Y') }}</h4>
                    </div>
                    <div class="card-header text-center">
                        <h5>RDO {{ $rdo->numero_rdo }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <strong>Obra:</strong>
                                <p>{{ $rdo->obras->nome }}</p>
                            </div>
                            <div class="col-md-4">
                                <strong>Empresa Contratada:</strong>
                                <p>{{ $rdo->obras->empresa_contratada }}</p>
                            </div>
                            <div class="col-md-4">
                                <strong>Objeto do Contrato:</strong>
                                <p>{{ $rdo->obras->objeto_contrato }}</p>
                            </div>
                        </div>
                        <p class="text-center bg-light"><strong>Condição do tempo</strong></p>
                        <table>
                            <tr>
                                <td>
                                    <strong>Manhã:</strong>
                                    <p>{{ $rdo->manha }}</p>
                                </td>
                                <td>
                                    <strong>Tarde:</strong>
                                    <p>{{ $rdo->tarde }}</p>
                                </td>
                                <td>
                                    <strong>Noite:</strong>
                                    <p>{{ $rdo->noite }}</p>
                                </td>
                            </tr>
                        </table>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Condição da área:</strong>
                                <p>{{ $rdo->condicao_area }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Acidente:</strong>
                                <p>{{ $rdo->acidente }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <strong>Equipamentos utilizados:</strong>
                                <ul>
                                    @foreach($rdo_equipamento as $equipamento)
                                        <li>{{ $equipamento->nome }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <strong>Mão de obra utilizada:</strong>
                                @if($rdo_mao_obra->isNotEmpty())
                                    <ul>
                                        @foreach($rdo_mao_obra as $mao_obra)
                                            <li>{{ $mao_obra->funcao }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>Não há mão de obra associada a este RDO.</p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <strong>Observação:</strong>
                                <p>{{ $rdo->observacoes ?? 'Nenhuma observação registrada.' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr style="margin-top: 30px;">
                @if ($rdo->aprovado_por)
                    <div style="font-size: 12px; margin-top: 10px;">
                        <strong>Aprovado por:</strong> {{ $rdo_gerente->name }}<br>
                        <strong>Data:</strong> {{ \Carbon\Carbon::parse($rdo->aprovado_em)->format('d/m/Y H:i') }}<br>
                        <strong>Hash conteúdo:</strong><br>
                        <code style="word-break: break-word;">{{ $rdo->hash_conteudo }}</code><br>
                        <strong>Assinatura digital (hash):</strong><br>
                        <code style="word-break: break-word;">{{ $rdo->hash_aprovacao }}</code><br>
                        <strong>Hash final:</strong><br>
                        <code style="word-break: break-word;">{{ $rdo->hash_final }}</code>
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>