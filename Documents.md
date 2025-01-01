# 3. Scanner de Vulnerabilidades Básico

### Livros:

    "Automate the Boring Stuff with Python" de Al Sweigart – Gratuito online (https://automatetheboringstuff.com/).
    "Web Application Security: A Beginner's Guide" de Bryan Sullivan – Pago, mas pode estar disponível em bibliotecas.

### Cursos:

    Curso de Python para Iniciantes – Gratuito. (https://www.freecodecamp.org/)
    Udemy - Ethical Hacking with Python – Pago, mas frequentemente em promoção.

### Vídeos:

    YouTube: "How to Build a Simple Vulnerability Scanner" no canal HackerSploit – Gratuito. (https://www.youtube.com/HackerSploit)

### Objetivos

    Objetivo: Criar um programa que verifica vulnerabilidades simples em sites.
    Ferramentas: Python (bibliotecas como requests e BeautifulSoup).
    Tarefas:
        Verificar cabeçalhos HTTP para segurança (como HSTS e X-Frame-Options).
        Identificar páginas que podem estar expostas a ataques XSS ou SQL Injection.


## Passos Iniciais:

    Aprender Python: Familiarize-se com o básico de Python, como manipulação de strings, loops e requests.
        Recursos: Python.org, cursos no freeCodeCamp.
    Explorar HTTP: Entenda como os cabeçalhos e métodos HTTP funcionam (GET, POST, etc.).
        Recursos: Mozilla Developer Network (MDN).
    Bibliotecas Úteis: Instale bibliotecas como:
        requests (para fazer requisições HTTP).
        BeautifulSoup (para analisar conteúdo HTML).
        urllib3 (para gerenciar conexões seguras).

pip install requests beautifulsoup4

Exemplo Inicial: Crie um script que faça uma requisição a um site e exiba os cabeçalhos.

import requests
response = requests.get('https://example.com')
print(response.headers)

Melhore o Script:

    Adicione verificações para cabeçalhos como Content-Security-Policy e X-Frame-Options.
    Documente cada descoberta para referência futura.

----------------------------------------------------------------------------------

# 5. Implementação de Criptografia Básica
 
### Livros:

    "Cryptography and Network Security" de William Stallings – Pago, referência clássica.
    "Crypto101" de Laurens Van Houtven – Gratuito (https://www.crypto101.io/).

### Cursos:

    Coursera - Introduction to Applied Cryptography – Gratuito para assistir (certificado pago). (https://www.coursera.org/learn/crypto)
    Khan Academy - Intro to Cryptography – Gratuito. (https://www.khanacademy.org/computing/computer-science/cryptography)

### Vídeos:
 
    YouTube: Playlist "Applied Cryptography" no canal Computerphile – Gratuito. (https://www.youtube.com/@Computerphile)
    YouTube: "What is AES Encryption?" no canal Tech With Tim – Gratuito. (https://www.youtube.com/@TechWithTim)

### Objetivos

    Objetivo: Criar um programa que codifique e decodifique mensagens usando métodos de criptografia simples.
    Ferramentas: Python (biblioteca cryptography ou sem bibliotecas externas).
    Tarefas:
        Implementar métodos como cifra de César ou cifra de substituição.
        Testar com diferentes entradas para entender como a criptografia funciona.

## Passos Iniciais:

    Conceitos Fundamentais: Estude conceitos básicos de criptografia, como cifragem simétrica e assimétrica.
        Recursos: Artigos no Crypto101.
    Python para Criptografia:
        Experimente com a biblioteca cryptography.

pip install cryptography

    Exemplo simples com cifra de César:

def caesar_cipher(text, shift):
    result = ''
    for char in text:
        if char.isalpha():
            shift_base = 65 if char.isupper() else 97
            result += chr((ord(char) - shift_base + shift) % 26 + shift_base)
        else:
            result += char
    return result

print(caesar_cipher("Hello, World!", 3))  # "Khoor, Zruog!"

Próximo Passo: Explore cifragem de dados reais com cryptography, usando métodos como AES.

----------------------------------------------------------------------------------
# 6. Monitor de Tráfego de Rede

### Livros:

    "Wireshark Network Analysis" de Laura Chappell – Pago, mas excelente para redes.
    "The Practice of Network Security Monitoring" de Richard Bejtlich – Pago, foca na análise de tráfego.

### Ferramentas e Tutoriais:

    Wireshark Official Documentation – Gratuito.
    Scapy Documentation – Gratuito. (https://scapy.readthedocs.io/en/latest/)

### Cursos:

    Udemy - Packet Analysis with Wireshark – Pago, frequentemente em promoção.
    Cisco Networking Academy - Packet Tracer – Gratuito (após registro).

### Vídeos:

    YouTube: "Wireshark Basics" no canal NetworkChuck – Gratuito. (https://www.youtube.com/@NetworkChuck)
    YouTube: "Learn Scapy for Python" no canal Null Byte – Gratuito. (https://www.youtube.com/@NullByteWHT)

### Objetivos

    Objetivo: Criar um monitor que analise pacotes de dados na rede.
    Ferramentas: Python (biblioteca Scapy).
    Tarefas:
        Capturar pacotes na rede local.
        Identificar protocolos usados (HTTP, HTTPS, etc.).
        Filtrar dados sensíveis (como senhas enviadas sem criptografia).

## Passos Iniciais:

    Noções Básicas de Redes: Entenda o que são protocolos como TCP/IP, HTTP, DNS e HTTPS.
        Recursos: Livros como "Computer Networking: A Top-Down Approach".
    Instale Scapy:
        Instale a biblioteca para manipulação de pacotes.

pip install scapy

Capturando Pacotes:

    Crie um script inicial para capturar pacotes na rede.

from scapy.all import sniff

def packet_handler(packet):
    print(packet.summary())

sniff(prn=packet_handler, count=10)

Próximo Passo: Filtre pacotes por protocolo ou porta e analise os dados capturados.

----------------------------------------------------------------------------------
# 7. Simulação de Ataques Phishing

### Livros:

    "Phishing Dark Waters" de Christopher Hadnagy – Pago, sobre engenharia social.

### Ferramentas e Documentação:

    GoPhish Documentation – Gratuito.
    Artigos do OWASP sobre engenharia social – Gratuito. (https://owasp.org/)

### Cursos:

    Pluralsight - Phishing and Social Engineering – Pago (trial grátis disponível). (https://www.pluralsight.com/)
    TryHackMe - Phishing Module – Pago, mas barato. (https://tryhackme.com/)

### Vídeos:

    YouTube: "Phishing Explained and Demo" no canal HackerSploit – Gratuito. (https://www.youtube.com/HackerSploit)
    YouTube: "How to Use GoPhish" no canal CyberSecMeg – Gratuito. (https://www.youtube.com/@CybersecurityMeg/videos)

### Objetivos

    Objetivo: Criar exemplos de e-mails de phishing para aprender a identificá-los.
    Ferramentas: Apenas conhecimento básico de design e HTML.
    Tarefas:
        Desenvolver um e-mail falso (em um ambiente seguro e ético).
        Comparar com exemplos reais para identificar características comuns.
        Aprender a configurar SPF e DMARC para proteção contra phishing.

## Passos Iniciais:

    HTML Básico: Aprenda o básico de HTML e design de e-mails.
        Recursos: HTML MDN.
    Exemplo de E-mail Simples: Crie um e-mail básico.

<html>
    <body>
        <h1>Bem-vindo!</h1>
        <p>Por favor, clique <a href="http://malicious-site.com">aqui</a> para confirmar.</p>
    </body>
</html>

Ambiente Seguro: Nunca envie um e-mail malicioso real. Use ferramentas como GoPhish para simulações controladas.
Próximo Passo: Estude como detectar phishing analisando o SPF, DKIM e DMARC.

----------------------------------------------------------------------------------
# 9. Exploração de Logs

### Livros:

    "Linux Command Line and Shell Scripting Bible" de Richard Blum – Pago, mas essencial para trabalhar com logs no Linux.

### Ferramentas e Tutoriais:

    Splunk Free Trial – Gratuito por 14 dias. (https://www.splunk.com/)
    Graylog Documentation – Gratuito.

### Cursos:

    Pluralsight - Log Analysis Fundamentals – Pago. (https://www.pluralsight.com/)
    Elastic (ELK Stack) Training – Pago, com opções gratuitas. (https://www.elastic.co/training/)

### Vídeos:

    YouTube: "How to Use Splunk for Beginners" no canal HackerSploit – Gratuito. (https://www.youtube.com/HackerSploit)
    YouTube: "Log Management for Security Professionals" no canal DarkNet Diaries – Gratuito. (https://www.youtube.com/@DarknetDiaries)

### Objetivos

    Objetivo: Analisar logs para identificar atividades suspeitas.
    Ferramentas: Splunk (gratuito para iniciantes) ou ferramentas nativas do sistema (como grep e logrotate).
    Tarefas:
        Localizar tentativas de login falhas.
        Identificar acessos fora do horário padrão.
        Criar alertas para atividades incomuns.

## Passos Iniciais:

    Introdução a Logs: Aprenda onde os logs são armazenados no sistema operacional:
        Linux: /var/log (ex.: auth.log, syslog).
        Windows: Event Viewer.
    Instale Ferramentas:
        No Linux, use grep para buscar padrões:

    grep "Failed password" /var/log/auth.log

    No Windows, use o Event Viewer para identificar falhas de login.

Instale Splunk (Opcional):

    Baixe e configure a versão gratuita do Splunk.
    Indexe logs e crie alertas personalizados.

Próximo Passo: Automatize a análise de logs usando scripts Python.

----------------------------------------------------------------------------------
# 10. Simulação de Ataque DDoS (Ética e Controlada)

### Livros:

    "Hands-On Ethical Hacking and Network Defense" de Michael T. Simpson – Pago, com exemplos práticos.
    "Web Application Security Cookbook" de Carlos Bueno – Pago, cobre DDoS e defesa.

### Ferramentas e Tutoriais:

    Hping3 Documentation – Gratuito. (https://www.hping.org/)
    Artigos sobre DDoS no Cloudflare Blog – Gratuito.

### Cursos:

    TryHackMe - Networking Basics – Pago, mas acessível. (https://tryhackme.com/)
    Cybrary - Intro to DDoS Attacks – Gratuito com registro. (https://www.cybrary.it/)

### Vídeos:

    YouTube: "What is a DDoS Attack?" no canal NetworkChuck – Gratuito. (https://www.youtube.com/@NetworkChuck)
    YouTube: "Simulating DDoS Attacks" no canal HackerSploit – Gratuito. (https://www.youtube.com/HackerSploit)

### Objetivos

    Objetivo: Estudar como ataques DDoS funcionam e como mitigá-los.
    Ferramentas: Ferramentas como LOIC (em ambiente isolado e ético).
    Tarefas:
        Configurar um servidor local para receber o ataque.
        Medir o impacto do ataque.
        Implementar estratégias básicas de mitigação.

## Passos Iniciais:

    Entender DDoS:
        Estude o que são ataques DDoS e como eles impactam servidores.
        Recursos: Artigos da OWASP.
    Ferramentas Éticas:
        Configure um ambiente isolado com VirtualBox.
        Instale uma ferramenta como LOIC ou Hping3 (com permissão para testes éticos).
    Configurar um Servidor Local:
        Use Apache ou Nginx como servidor-alvo.

sudo apt install apache2

Teste em Ambiente Seguro: Execute ataques leves em um servidor local e analise os impactos.
Mitigação: Configure firewalls e regras de limite para bloquear ataques.
