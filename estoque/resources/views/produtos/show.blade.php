<!DOCTYPE html>
<html>
    <head>
        <title>Ver Produtos</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://stapath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="styleshhet">
        
        <!-- Bootstrap JS (opcional) -->
        <script src="https://stapath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    </head>
    <body>
        <h1>{{ $produto->nome }}</h1>
        <p>Validade: {{ $produto->validade }}</p>
        <p>Tamanho: {{ $produto->tamanho }}</p>
        <p>Preço: {{ $produto->preco }}</p>
        <p>Código do Produto: {{ $produto->cod_prod }}</p>
        <a href="{{ route('produtos.index') }}">Voltar</a>
    </body>
</html>