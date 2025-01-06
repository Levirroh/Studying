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

### level 9 --> 10 
#### (bandit9)

  Neste nível um arquivo data.txt é possível de abrir, ao abrir ele mostra diversos caracteres, incluindo caracteres que o leitor não reconhece, então ficam símbolos. A senha, de acordo com o nível, está ao lado de diversos símbolos de igual "==", pode ser entre 3 e mais. Para filtrar e mostrar somente os digitos que o computador consegue mostrar, podemos usar o comando "strings", ele filtrará por linhas o que tem nelas. Neste momento já é possível achar a senha, porém, para ser mais específico, podemos filtrar para mostrar somente as linhas que possuem iguais "==". Usando o comando "strings data.txt | grep ===" ele mostrará somente os caracteres legíveis do documento, e após isso vai filtra e mostrar somente os que possuem símbolo de igual.

  (FGUW5ilLVJrxX9kMYMmlN4MgbpfMiqey)

  
### level 10 --> 11 
#### (bandit10)

  Entrando no arquivo "data.txt" é possível identificar a senah criptografada em base64, isso é possível de notar por conta de ela acabar em 2 iguais: "VGhlIHBhc3N3b3JkIGlzIGR0UjE3M2ZaS2IwUlJzREZTR3NnMlJXbnBOVmozcVJyCg==". Para decodificá-la, eu usei um site chamado "cryptii" que é bem útil e mostra diversas criptografias, e quando descriptografei me mostrou :"The password is dtR173fZKb0RRsDFSGsg2RWnpNVj3qRr"

  (dtR173fZKb0RRsDFSGsg2RWnpNVj3qRr)

  
  
### level 11 --> 12 
#### (bandit11)

  Entrando no arquivo, é possível ler "Gur cnffjbeq vf 7k16JArUVv5LxVuJfsSVdbbtaHGlw9D4", ou seja, está criptografado, mas como ainda existem espaços e parece que as letras foram trocadas de lugar, é um caso da cifra de césar, ao colocar em 13 caracteres após, aparece: "The password is 7x16WNeHIi5YkIhWsfFIqoognUTyj9Q4".

  (7x16WNeHIi5YkIhWsfFIqoognUTyj9Q4)
  
### level 12 --> 13 
#### (bandit12)

  Neste desafio o arquivo data.txt está comprimido de diversas formas diferentes, usando o comando "file data.txt" é possível identificar em qual compressão ele se encontra no momento, descomprimindo aproximadamente 8 vezes entre 3 compressões diferentes (tar, bzip, gzip) é possível ler: "The password is FO5dwFsc0cbaIiH0h8J2eUks2vdTDwAn". O arquivo original também estava em um hexdump, para reitrá-lo deste formato é necessário usar "xxd -r data.txt".

  (FO5dwFsc0cbaIiH0h8J2eUks2vdTDwAn)

### level 13 --> 14 
#### (bandit13)

  Neste desafio, é necesário baixar um dos arquivos presentes, o "sshkey.private" usando "scp -P 2220 bandit13@bandit.labs.overthewire.org:sshkey.private .", após baixar o arquivo é possível usá-lo como um identificador para um login usando o "bandit14", usando a identificação "ssh -i sshkey.private bandit14@bandit.labs.overthewire.org -p 2220" para logar como "bandit14", é possível acessar o server como ele, entrando no arquivo mencionado no desafio, é encontrado a para a próxima fase.

  (MU4VWeTyJk8ROof1qqmcBPaLh7lDCPvS)

### level 14 --> 15 
#### (bandit14)
  
  Neste desafio é necessário continuar no bandit14, de lá, é necessário usar o "nc" (netcat), que permite escrever algo durante uma conexão de network. Colocando a senha do nível anterior após conectar na porta e endereço denominado "nc localhost 30000" o localhost pode ser substituído por 127.0.0.1 que é o mesmo endereço, colocando a senha do nível anterior, aparece "correct" e ganhamos a senha do próximo.

  (8xCjnmgoKbGLhHFAZlGE5Tmu4M2tKJQo).

### level 15 --> 16 
#### (bandit15)


    
  (8xCjnmgoKbGLhHFAZlGE5Tmu4M2tKJQo)
