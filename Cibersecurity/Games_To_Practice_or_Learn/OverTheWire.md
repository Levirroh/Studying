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


