$(function () {
    $("#btnInserir").on("click", function () {
        let id_produto = $("#id_produto").val();
        let id_local_estoque = $("#id_local_estoque").val();
        let qtde = $("#qtde").val();
        let preco = $("#preco").val();

        $.ajax({
            url: base_url + "saidaestoque/inserir",
            type: "POST",
            dataType: "json",
            data: {
                id_produto: id_produto,
                id_local_estoque: id_local_estoque,
                qtde: qtde,
                preco: preco
            },
            success: function (data) {
                lista_saida(data.lista);
            },
        });
    });

    $("#produto").on("keyup", function () {
        let ValorCampo = $(this).val();
        if (ValorCampo == "") {
            $(".listaProdutos").hide();
            return;
        }
        $.ajax({
            url: base_url + "produto/buscar/" + ValorCampo,
            type: "GET",
            dataType: "json",
            data: {},
            success: function (data) {
                $("#produto").after('<div class="listaProdutos"></div>');
                html = "";
                for (i = 0; i < data.length; i++) {
                    html += '<div class="si"><a href="javascript:;" onclick="selecionarProduto(this)"'
                        + 'data-id="' + data[i].id_produto +
                        '" data-preco="' + data[i].vr_venda +
                        '" data-nome="' + data[i].desc_produto + '">' +
                    data[i].id_produto + " - " + data[i].desc_produto + " - R$ " + data[i].vr_venda + '</a></div>';

                }
                $(".listaProdutos").html(html);
                $(".listaProdutos").show();
            }
        });
    });
});

function selecionarProduto(obj) {
    let id = $(obj).attr("data-id");
    let nome = $(obj).attr("data-nome");
    let preco = $(obj).attr("data-preco");

    $(".listaProdutos").hide();
    $("#produto").val(nome);
    $("#preco").val(preco);
    $("#qtde").val(1);
    $("#qtde").focus();
    $("#id_produto").val(id);

    listarLocalEstoque(id);
}

function listarLocalEstoque(id) {
    $.ajax({
        url: base_url + "localproduto/listaPorProduto/" + id,
        type: "GET",
        dataType: "json",
        data: {},
        success: function (data) {
            html = "";
            for (i = 0; i < data.length; i++) {
                html += "<option value='" + data[i].id_local_estoque + "'>" + data[i].local_estoque + "</option>";
            }
            $("#id_local_estoque").html(html);
        }
    });
}

function lista_saida(data) {
    html = "<tr>";
    let total_saida = 0.00;
    for (let i in data) {
        total_saida += parseFloat(data[i].subtotal_saida);
        let j = parseInt(i) + 1;
        html += '<td align="center">' + data[i].id_saida + '</td>' +
            '<td align="center">' + data[i].data_saida + '</td>' +
            '<td align="left" width="290">' + data[i].desc_produto + '</td>' +
            '<td align="center">' + data[i].qtde_saida + '</td>' +
            '<td align="center">' + data[i].valor_saida + '</td>' +
            '<td align="center">' + data[i].subtotal_saida + '</td></tr>';
    }

    html += '<tr><td align="right" colspan="6" ><b>Total:</b> R$ ' + total_saida + '</td> </tr>'
    $("#lista_saida").html(html);

}