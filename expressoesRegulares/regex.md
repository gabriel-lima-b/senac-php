# Expressões Regulares
É uma especificação ou padrão de texto, para busca de algo ou para auxiliar na validação de entrada de dados.

O PHP suporta dois tipos de expressões regulares, são elas:
-	POSIX_EXTENDED
-	PCR ( Pear Compatible Regular Expression)

## Regras básicas de uma expressão regular no PHP
Toda expressão regular deve estar obrigatoriamente entre apóstrofes e barras.
‘/ expressão /’

[] – Cadeia de Caracteres ( Representantes)
Os colchetes são chamados de caracteres representantes, cuja função é representar um ou mais caracteres (cadeia de caracteres), por exemplo:

### Exemplos:
‘/1-8/’ – Compreende números de 1 à 8.

‘/a-zA-z/’ – Compreende letras de “a” a “z”, tanto maiúsculas como minúsculas

## Metacaracteres quantificadores

\+ \- Deve conter no mínimo uma ocorrência de caracter ou mais.

\? - Deves conter apenas um ou nenhum caractere. Cada sinal de interrogação corresponde a somente um caractere.

\* \- O asterisco significa que não precisa ter nenhum, porém pode ter “n” caracteres.

. – Indica qualquer caractere, exceto nova linha

() – Indicam um grupo de expressões

| - Indica um ou outro.

{} – AS chaves indicam a quantidade de caracteres.

{m,p} – De m até p (m, n, o, p)

{1,5} – Deve conter no mínimo um caractere e no máximo 5.

{5} – Exatos 5 caracteres

### Exemplos:
‘/[1,8]{6,8}/’ – Deve conter no mínimo 6 e no máximo 8 números(caracteres) entre, inclusive 1 e 8.

‘/[a-zA-z]+/’ – Deve conter no mínimo um caractere de “a” à “z’, tanto maiúscula como minúscula.

‘/[1-8]?/’ – Pode conter nenhum ou um número de 1 à 8.

‘/[^a-z]{10}/’ – Deve conter exatos(10) caracteres que não sejam caracteres entre “a” e “z” minúsculos

## Âncoras

^ - O circunflexo no início da linha indica que os caracteres devem estar no início da linha, porém, quando utilizados dentro da cadeia [^] de caracteres, nega a cadeia.  

$ - O caractere específico cifrão indica que os caracteres devem estar no final da string

### Mais exemplos:

‘/[^1-8]/’ – Não pode conter números de 1 à 8.

‘/[^a-zA-Z]/’ – Não pode conter letras de “a” à “z”, tanto maiúscula quanto minúscula.

‘/^[^1-8]/’ – Não pode conter números de 1 à 8 no primeiro caractere.

‘/.{5}do/’ – Aceita qualquer cadeia de 5 caracteres, seguidos obrigatoriamente de “do”.

‘/.*/’ – O ponto significa qualquer caractere, enquanto o asterisco aceita nenhum caractere ou “n” ocorrências.

‘/^cliente:.*/’ – Deve iniciar com a palavra cliente: e pode ou não conter qualquer caracteres após os dois pontos.

‘/^([a-z]{1,2})([A-Z]{1})$/’ – a sequencia começa com 1 ou 2 caracteres minúsculos e termina com 1 caractere maiusculo

‘/^licen(ça|se)$/’  - licença ou license

‘/[A-Za-z0-9,.()%!]/’ – qualquer Letra maiúscula ou minúscula ou numeros ou virgula, ou ponto, ou paratenses ou porcentagem ou exclamacao
