<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="utf-8">
		<title>REST :: Batalha Medieval</title>

			<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

			<!-- Optional theme -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

			<!-- Latest compiled and minified JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
			
		<style type="text/css">

		::selection { background-color: #E13300; color: white; }
		::-moz-selection { background-color: #E13300; color: white; }

		body {
			background-color: #fff;
			margin: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
		}

		h1 {
			color: #444;
			background-color: transparent;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}

		h2 {
			color: #444;
			background-color: transparent;
			font-size: 16px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}
			
		h3 {
			color: #444;
			background-color: transparent;
			font-size: 14px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}

		p {
			color: #444;
			background-color: transparent;
			font-size: 14px;
			font-weight: normal;
			padding: 3px 15px 3px 15px;
		}
			
		#body {
			margin: 0 15px 0 15px;
		}

		p.footer {
			text-align: right;
			font-size: 11px;
			border-top: 1px solid #D0D0D0;
			line-height: 32px;
			padding: 0 10px 0 10px;
			margin: 20px 0 0 0;
		}

		#container {
			margin: 10px;
			border: 1px solid #D0D0D0;
			box-shadow: 0 0 8px #D0D0D0;
		}
			
		.menu {
			display: block;
			padding: 10px;
			margin: 0 auto;
			text-align: center;
		}
		</style>
    </head>
    
    <body>
        <div id="body">
            <div class="row">
                <div id="container">
                    <h1>
                        <a href="/coding/battle/" title="Home Page">Batalha Medieval</a>
                    </h1>

					<h2>Projetar e implementar um serviço web REST e um cliente que possa consumir tal serviço e que apresente resultados de todas as interações.</h2>
					
					<p>A solução foi desenvolvida na forma de um jogo de RPG (Batalha medieval) onde cada participante escolhe seu personagem e roda os dados para se defender e atacar.</p>
					<p>O jogo termina quando um dos participantes tem seus pontos de vida zerado.</p>
					<p>Desenvolvi esta solução com framework CodeIgniter 3 e com PHP puro (sem framework). Escolha a opção abaixo pra vê-la em ação:</p>
					
					<div class="menu">
                        <div class="btn-group" role="group" aria-label="...">
                            <a href="./with-framework/" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Com framework </a>
                            <a href="./no-framework/" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Sem framework </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
