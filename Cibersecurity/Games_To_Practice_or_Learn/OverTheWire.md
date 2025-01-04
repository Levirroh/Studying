# Bandit

### Level 0:

  Somente conectar usando o ssh (ssh -l bandit0 bandit.labs.overthewire.org -p 2220)

### level 0 --> 1  
#### (bandit0)
  Achar uma chave dentro do arquivo readme (ZjLjTmM6FvvyRnrb2rfNWOZOTa6ip5If)

### level 1 --> 2 
#### (bandit1)
  Abrir um arquivo com nome "-" usando o comando "cat ./-" (263JGJPfgU6LtdEvgfWU1XP5yac29mFx)

### level 2 --> 3 
#### (bandit2)
  Abrir um arquivo com nome "spaces in this filename" usando o comando "cat spaces\ in\ this\ filename" (MNk8KNH3Usiio41PRUEoDFPqfxLPlSmx)

### level 3 --> 4 
#### (bandit3)
  Abrir uma pasta com nome "inhere" que possui um arquivo com nome "...Hiding-From_You", que como possui . no inicio do nome fica invisível na linha de comando, usando o comando "ls -a", para mostrar tudo (-a --> all), o arquivo se mostra.

  Então basta digitar cat ...Hiding-From-You

Lembrando que o command line é KeySensitive (Importa se é minúsculo ou maíusculo)

  (2WmrDFRmJIq3IPxneAaMGhap0pFhF3NJ)

### level 4 --> 5 
#### (bandit4)

  Abrir uma pasta com nome "inhere", dentro da pasta diversos arquivos com nome iniciando com "-" são visíveis, abrindo um por um usando cat "./-nomeDoArquivo" é possível identificar a chave no arquivo "-file07".

  (4oQYVPkxZOOEOO5pTW81FB8j8lxXGUQw)

### level 5 --> 6 
#### (bandit5)

  Abrir a pasta com nome "inhere", dentro da pasta diversas pastas com pastas com arquivos são vistos, totalizando 88 esta quantidade é possível de identificar usando o comando "ls -la" que lista todos os diretórios com a quantidade de arquivo dentro deles, mostrando também o total de arquivos.

  Como existe dezenas de arquivos, é necessário identificar uma abordagem, no desafio a descrição menciona que o arquivo possui 1033 bytes em tamanho e que não é executável, ou seja é um arquivo de texto ou semelhante, não é uma pasta, não é possível interagir.

    Com isso, é possível fazer o comando "du -a -b", o comando "du" exibe o tanto de espaço que os repositórios estão usando, com o adicional de "-a e -b" é possível: "-a" ver todos os arquivos e diretórios e, com o "-b" é possível listar a quantidade de bytes em um arquivo. 
    Além disso, para facilitar e não necessário procurar em uma enorme lista algum arquivo com a quantidade de bytes: 1033, é possível digitar no total: "du -a -b | grep 1033". O "|" significa que com o resultado da primeira parte do comando, que seria o "du -a -b" ele vai fazer o que vem depois, o "grep 1033" vai mostrar somente os arquivos que possuem este elemento (1033) na texto de entrada, ou seja, na saída do "du -a -b", então ele vai mostrar quem tem 1033 bytes, já que o comando "-b" mostra a quantidade de bytes no texto de entrada. 

      Com isso ele mostra o único arquivo com 1033 bytes dos repositórios, que é o "./maybehere07/.file2", no .file2, que é acessado digitando "cat ./.file2" mostra a senha.

  (HWasnPhtq9AVKe0dmk45nxy20cvUa6EG)
 
### level 6 --> 7 
#### (bandit6)

  A dica da vez é que a senha está em quanlquer lugar do server, ou seja, entrando e colocando a senha é necessário voltara os repositórios até o início do server. De lá, as dicas mencionam: que o usuário "bandit7" é o dono, que o grupo a qual o arquivo pertence é "bandit7" e o tamanho do arquivo é 33 bytes, com isso já é possível identificar o arquivo diretamente. 
    Usando o comando "file", é possível fazer uma combinaçaõ para filtrar todos os arquivos pelo nome do dono, grupo e tamanho. Para se filtrar por dono se usa "-user bandit7", o "-user" filtrará por dono, "-group" filtrará por grupo, então até agora: "file / -user bandit7 -group bandit6", para filtrar tamanho se coloca "-size 33c" o sufixo "c" significa "bytes" no comando "file". Esta resposta fica: "file / -user bandit7 -group bandit6 -size 33c"

    Com todos esses comandos a resposta já aparece no terminal, porém, diversos outros arquivos com o mesmo tamanho, dono e grupo aparecem, porém, como estamos em um desafio e este desafio nos dá permissões para cada usuário e nível que entramos, todos os outros arquivos sem ser o nosso alvo está com permissão negada, para tirar as mensagens de erro, no final do comando pode ser colocado 2>/dev/null, para  tirar todos os resultados que mostram "Permissão negada.". Isso acontece por conta de todos os resultados com valor 2 será redirecionado para o diretório dev/null, que é basicamente uma lixeira.

    No arquivo encontrado após o comando "file / -user bandit7 -group6 -size 33c 2>/dev/null" é encontrado um arquivo dentro de um diretório que, ao usar o comando "cat" para mostrar o que tem dentro, mostra a senha.

  (morbNTDkSW6jIlUc0ymOdMaLnOlFVAaj)

### level 7 --> 8 
#### (bandit7)

  Neste cenário, ao colocar login e senha, um arquivo de texto chamado de "data.txt" é encontrado, este arquivo possui 4.189.194 bytes, eu mencionei isso para ser bem óbvio que ele possui uma quantidade gigantesca de letras, a dica é que a chave está ao lado da palavra "milionth", dentro deste arquivo, que é uma sequencia de : "palavra letras-aleatórias-que-podem-ser-uma-senha-pra-proxima-fase". Usando o comando "grep", que identifica padrões, podemos colocar no terminal "grep millionth data.txt" usando isso, ele vai procurar por "millionth" no arquivo "data.txt", assim ele mostrará a linha que isso aparece, mostrando imediatamente a chave.

  (dfwvzFQi4mU0wfNbFOe9RoWskMLg7eEc)

### level 8 --> 9 
#### (bandit8)

  Neste cenário, ao colocar login e senha, um arquivo de texto chamado de "data.txt" é encontrado, lotado de senhas possíveis, porém, a senha correta é a única que aparece somente uma única vez no arquivo todo. Para solucionar isso, devemos usar o comando "uniq -u", o "uniq" vai juntar todas as palavras iguais, porém elas ainda vão aparecer, com o "-u" ele vai mostrar somente a que nõa juntou com ninguém, ou seja, a que não repete nenhuma vez. Porém, este comando não pode ser usado sozinho, por isso, o comando "sort" que é requerido para o comando "uniq" funcionar, deve ser colocado junto, então a resposta aparece após digitar: "sort data.txt | uniq -u", o "|" é para o "uniq -u" ser feito juntamente com o resultado do "sort data.txt", filtrando a palavra diferente.

  (4CKMh1JI91bUIZZPXDqGanal4xvAg0JM)
