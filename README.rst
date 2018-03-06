################
Batalha Medieval
################

Projetar e implementar um serviço web REST e um cliente que possa consumir tal 
serviço e que apresente resultados de todas as interações.

Veja o código em ação: `In Action <http://www.ceffsistemas.com.br/coding/battle/>`_

******************
Outras Informações
******************

Esta aplicação foi testada com PHP 5.6/7.0 e a extensão cURL, utilizado o banco 
de dados MySQL versão 5.7 e o Apache Web Server 2.4 com mod_rewrite habilitado.

No arquivo .htaccess da raiz do projeto definimos o parâmetros RewriteBase para 
/coding/battle/with-framework/ evitando assim o conflito com outros arquivos .htaccess no diretório web
de testes que eu uso. Caso vc estaja testando na raiz do seu localhost ou em algum outro path, faça os 
ajustes necessários para o funcionamento do sistema.

Outros requisitos básicos para a execução do CodeIgniter, da solução 
apresentada e também uma visão geral sobre o framework utilizado, está 
disponível no `Guia do Usuário CodeIgniter <https://codeigniter.com/user_guide/>`_.

Durante o desenvolvimento desta solução vou incrementar este arquivo README com  as especificidades do 
projeto e os requisitos para sua execução.

A solução deste projeto foi pensada de forma que o usuário (gamer) possa 
cadastrar seus próprios personagens e armas que serão utilizadas por ele.

Todas as funcionalidades do Web Service REST foram testadas através desse CRUD 
de personagens e armas.
Após criados e selecionados os personagens e suas armas, podemos definir uma 
partida, escolher os participantes e começar a batalha!

Para ver as funcionalidades do Web Service em ação acesse os links abaixo ou use os paths fazendo 
as devidas adaptações para o seu servidor:

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

Após clicar em enviar você verá a tela onde cada usuário pode rolar os dados para definir a ordem dos 
ataques e seguindo a lógica do negócio dar continuidade na partida até que os pontos de vida de algum dos 
personagens seja menor ou igual a zero.

Então, "sem mais delongas", vamos partir para ação!
