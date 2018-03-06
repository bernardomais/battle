###########################
Desafio Desenvolvedor HITSS
###########################

Projetar e implementar um serviço web REST e um cliente que possa consumir tal 
serviço e que apresente resultados de todas as interações.

Veja o código em ação: `In Action <http://www.ceffsistemas.com.br/coding/desafio-desenvolvedor-hitss/>`_

******************
Outras Informações
******************

Estou iniciando o desenvolvimento da solução para este desafio com o framework 
`CodeIgniter <https://codeigniter.com/>`_ na versão 3.1.

Esta aplicação foi testada com PHP 5.6/7.0 e a extensão cURL, utilizado o banco 
de dados MySQL versão 5.7 e o Apache Web Server 2.4 com mod_rewrite habilitado.

OBS.: O mod_rewrite do Apache já vem habilitado por padrão, mas, caso queira se 
certificar, veja no arquivo httpd.conf que fica dentro da pasta conf da 
instalação do Apache. Procure pela seguinte linha: 
LoadModule rewrite_module modules/mod_rewrite.so

Caso esta linha esteja precedida por um # remova-o e reinicie o Apache.

Também é necessário que o diretório do seu servidor (local ou remoto) permita o 
uso de arquivos .htaccess. Para isso devemos adicionar a diretiva 
"AllowOverride All" na configuração do diretório do servidor.

Outros requisitos básicos para a execução do CodeIgniter, da solução 
apresentada e também uma visão geral sobre o framework utilizado, está 
disponível no `Guia do Usuário CodeIgniter <https://codeigniter.com/user_guide/>`_.

Durante o desenvolvimento desta solução vou incrementar este arquivo README com 
as especificidades do projeto e os requisitos para sua execução.

A solução deste projeto foi pensada de forma que o usuário/gammer possa 
cadastrar seus próprios personagens e armas que serão utilizadas por eles.
Através do relacionamento personagem x arma no banco de dados, os usuários 
podem associar uma arma ao seu personagem.
Todas as funcionalidades do Web Service REST foram testadas através desse CRUD 
de personagens e armas.
Após criados e selecionados os personagens e suas armas, podemos definir uma 
partida, escolher os participantes e começar a batalha seguindo as regras de 
negócio definidas no escopo do desafio.

Tomando em consideração que este Web Service está sendo executado em sua 
máquina local, as funcionalidades básicas do REST Web Server podem ser 
encontradas conforme listado abaixo:

- `Listar todos os personagens cadastrados e as armas disponíveis <http://localhost/desafio-desenvolvedor-hitss/>`_
- `Listar detalhes de um personagem por seu id <http://localhost/desafio-desenvolvedor-hitss/medieval_battle/viewcharacter/1>`_
- `Listar detalhes de uma arma por seu id <http://localhost/desafio-desenvolvedor-hitss/medieval_battle/viewweapon/1>`_
- `Criar um novo personagem <http://localhost/desafio-desenvolvedor-hitss/medieval_battle/addcharacter/>`_, passando os parâmetros por POST.
- `Criar uma nova arma <http://localhost/desafio-desenvolvedor-hitss/medieval_battle/addweapon/>`_, passando os parâmetros por POST.
- `Atualizar um personagem <http://localhost/desafio-desenvolvedor-hitss/medieval_battle/editcharacter/1>`_, passando os parâmetros por PUT.
- `Atualizar uma arma <http://localhost/desafio-desenvolvedor-hitss/medieval_battle/editweapon/1>`_, passando os parâmetros por PUT.
- `Excluir um personagem <http://localhost/desafio-desenvolvedor-hitss/medieval_battle/deletecharacter/1>`_, passando o parâmetro id por DELETE.
- `Excluir uma arma <http://localhost/desafio-desenvolvedor-hitss/medieval_battle/deleteweapon/1>`_, passando os parâmetro id DELETE.
- `Criar uma nova partida (Iniciar Jogo): <http://localhost/desafio-desenvolvedor-hitss/medieval_battle/addgame/>`_, passando os parâmetros por POST. Nesta etapa deve-se selecionar os oponentes e definir um nome para a batalha.
Após clicar em enviar você verá a tela onde cada usuário pode rolar os dados para definir a ordem dos ataques e seguindo a lógica do negócio dar continuidade na partida até que os pontos de vida de algum dos personagens seja menor ou igual a zero.

Caso vá testar este código em outro diretório que não o localhost de sua 
máquina, faz-se necessário abrir o arquivo "application/config/config.php" e 
editar a diretiva base_url que se encontra na linha 26 deste arquivo.

Então, "sem mais delongas", vamos partir para ação!
