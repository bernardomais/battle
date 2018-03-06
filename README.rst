################
Batalha Medieval
################

Projetar e implementar um serviço web REST e um cliente que possa consumir tal 
serviço e que apresente resultados de todas as interações.

Veja o código em ação: `Clique aqui <http://www.ceffsistemas.com.br/coding/battle/>`_

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

- `Listar personagens <http://www.ceffsistemas.com.br/coding/battle/with-framework/API/characters/all>`_, por GET.
- `Listar detalhes de um personagem <http://www.ceffsistemas.com.br/coding/battle/with-framework/API/characters/byid/id/5>`_, por GET passando seu id como parâmtro.
- `Listar armas <http://www.ceffsistemas.com.br/coding/battle/with-framework/API/weapons/all>`_, por GET.
- `Listar detalhes de uma arma <http://www.ceffsistemas.com.br/coding/battle/with-framework/API/weapons/byid/id/9>`_, por GET passando seu id como parâmtro.
- Criar personagem '/battle/with-framework/API/characters/add', passando os parâmetros por POST.
- Criar arma '/battle/with-framework/API/weapons/add', passando os parâmetros por POST.
- Atualizar personagem '/battle/with-framework/API/characters/edit/1', passando os parâmetros por PUT.
- Atualizar arma '/battle/with-framework/API/weapons/edit/1', passando os parâmetros por PUT.
- Excluir personagem '/battle/with-framework/API/characters/delete/1', passando o parâmetro id por DELETE.
- Excluir arma '/battle/with-framework/API/weapons/delete/1', passando os parâmetro id DELETE.
- Criar uma nova partida (Iniciar Jogo) '/battle/with-framework/API/addgame/', passando os parâmetros por POST.

Após clicar em enviar você verá a tela onde cada usuário pode rolar os dados para definir a ordem dos 
ataques e seguindo a lógica do negócio dar continuidade na partida até que os pontos de vida de algum dos 
personagens seja menor ou igual a zero.

Então, "sem mais delongas", vamos partir para ação!
