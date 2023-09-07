<div class="col menu-lateral position-relative">

	<nav class="menuprincipal" id="principal">
		<ul class="menu-ul icones">
			<li><a href="<?php echo URL_BASE . "home" ?>"><i class="fas fa-home"></i> Home</a></li>
			<li><a href="#menu_cadastro"><i class="icon fas fa-file"></i> Cadastro <span>+</span></a></li>
			<li><a href="#menu_estoque"><i class="icon fas fa-cubes"></i> Estoque <span>+</span></a></li>
			<li><a href="#menu_compras"><i class="icon fas fa-cart-plus"></i> Compras <span>+</span></a></li>
			<li><a href="#menu_producao"><i class="fas fa-tools"></i> Produção <span>+</span></a></li>
			<li><a href="#menu_financeiro"><i class="icon fas fa-hand-holding-usd"></i> Financeiro <span>+</span></a></li>
		</ul>
	</nav>

	<!-- MENU CADASTRO -->
	<nav class="menuprincipal" id="menu_cadastro">
		<ul class="menu-lista">
			<li class="icones"><a href="#principal" title="Recolher menu"><i class="fas fa-arrow-left ativo"></i></a></li>
			<h1 class="tt px-2"><b><i class="far fa-fw fa-file"></i> Cadastros</b></h1>
			<div id="accordion">
				<h3>Produto</h3>
				<ul>
					<li><a href="<?php echo URL_BASE . "produto" ?>">Produtos</a></li>
					<li><a href="<?php echo URL_BASE . "categoria" ?>">Categoria</a></li>
					<li><a href="<?php echo URL_BASE . "unidade" ?>">Unidade de Medida</a></li>
				</ul>
				<h3>Cliente/Fornecedor</h3>
				<ul>
					<li><a href="<?php echo URL_BASE . "pessoa" ?>">Carteira</a></li>
				</ul>
				<h3>Usuário</h3>
				<ul>
					<li><a href="lst_usuario.html">Lista</a></li>
					<li><a href="lst_tabela.html"> Tabela</a></li>
					<li><a href="lst_acoes.html"> Ações</a></li>
				</ul>
				<h3>Diversos</h3>
				<ul>
					<li><a href="frm_status_entraga.html">Status entrega </a></li>
					<li><a href="frm_status_cotacao.html">Status cotação </a></li>
					<li><a href="frm_status_entraga.html">Status item cotação </a></li>
					<li><a href="frm_status_ordem_compra.html">Status ordem de compra </a></li>
					<li><a href="frm_status_producao.html">Status ordem de produção </a></li>
					<li><a href="frm_status_pedido.html">Status pedidos</a></li>
				</ul>
			</div>
		</ul>
	</nav>

	<!-- MENU ESTOQUE -->
	<nav class="menuprincipal" id="menu_estoque">
		<ul class="menu-lista">
			<li class="icones"><a href="#principal" title="Recolher menu"><i class="fas fa-arrow-left ativo"></i></a></li>
			<h1 class="tt px-2"><b><i class="fas fa-cubes"></i> Estoque</b></h1>
			<small><b>Cadastro</b></small>
			<li><a href="<?php echo URL_BASE . "localestoque" ?>">Local de Estoque</a></li>

			<small><b>Controle</b></small>
			<li><a href="<?php echo URL_BASE . "localproduto" ?>">Local do Produto</a></li>
			<li><a href="<?php echo URL_BASE . "entradaestoque" ?>">Entrada</a></li>
			<li><a href="<?php echo URL_BASE . "saidaestoque" ?>">Saída</a></li>
			<li><a href="<?php echo URL_BASE . "transferenciaestoque" ?>">Transferencia de produto</a></li>

			<small><b>Relatório</b></small>
			<li><a href="<?php echo URL_BASE . "movimentoestoque" ?>">Movimentação por produto</a></li>
		</ul>
	</nav>

	<!-- MENU COMPRAS -->
	<nav class="menuprincipal" id="menu_compras">
		<ul class="menu-lista">
			<li class="icones"><a href="#principal" title="Recolher menu"><i class="fas fa-arrow-left ativo"></i></a></li>
			<h1 class="tt px-2"><b><i class="fas fa-cart-plus"></i> Compras</b></h1>
			<li><a href="lst_solicitacao.html"> Solicitação</a></li>
			<li><a href="lst_cotacao.html"> Cotação</a></li>
			<li><a href="lst_ordemcompra.html"> Ordem de compra</a></li>
		</ul>
	</nav>

	<!-- MENU PRODUÇÃO -->
	<nav class="menuprincipal" id="menu_producao">
		<ul class="menu-lista">
			<li class="icones"><a href="#principal" title="Recolher menu"><i class="fas fa-arrow-left ativo"></i></a></li>
			<h1 class="tt px-2"><b><i class="fas fa-cubes"></i> Produções</b></h1>

			<li><a href="lst_engenharia.html">Produtos</a></li>
			<li><a href="lst_insumos.html">Insumos</a></li>
			<li><a href="lst_ordemproduto.html">Ordem de produção</a></li>

		</ul>
	</nav>

	<!-- MENU FANACEIRO CONTABIL -->
	<nav class="menuprincipal" id="menu_financeiro">
		<ul class="menu-lista">
			<li class="icones"><a href="#principal" title="Recolher menu"><i class="fas fa-arrow-left ativo"></i></a></li>
			<h1 class="tt px-2"><b><i class="fas fa-hand-holding-usd"></i> Financeiro</b></h1>

			<small><b>Financeiro</b></small>
			<li><a href="lst_ordemcompra.html" class="nav-link text-light"> Ordem de compra</a></li>
			<li><a href="pedidos.html" class="nav-link text-light"> Pedidos</a></li>
			<li><a href="contasreceber.html" class="nav-link text-light"> Contas a receber</a></li>
			<li><a href="contasapagar.html" class="nav-link text-light"> Contas a pagar</a></li>
			<li><a href="lst_despesas.html" class="nav-link text-light"> Despesas</a></li>

			<small><b>Contábil</b></small>
			<li><a href="planodecontas.html" class="nav-link text-light"> Plano de contas</a> </li>
			<li><a href="fluxocaixa.html" class="nav-link text-light"> Fluxo de caixas</a></li>
			<li><a href="livrodiario.html" class="nav-link text-light"> livro diário</a></li>
		</ul>
	</nav>
</div>