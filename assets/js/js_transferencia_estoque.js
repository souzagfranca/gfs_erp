$(function () {
    $("#btnInserir").on("click", function () {
        let id_produto = $("#id_produto").val();
        let id_origem = $("#id_origem").val();
        let id_destino = $("#id_destino").val();
        let qtde = $("#qtde").val();

        $.ajax({
            url: base_url + "transferenciaestoque/inserir",
            type: "POST",
            dataType: "json",
            data: {
                id_produto: id_produto,
                id_origem: id_origem,
                id_destino: id_destino,
                qtde: qtde
            },
            success: function (data) {
                if(data.resultado > 0){
                    alert(data.msg[0]);
                }
                lista_transferencia(data.lista);
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
            $("#id_origem").html(html);
            $("#id_destino").html(html);
        }
    });
}

function lista_transferencia(data) {
    html = "<tr>";
    let total_transferencia = 0.00;
    for (let i in data) {
        total_transferencia += parseFloat(data[i].subtotal_transferencia);
        let j = parseInt(i) + 1;
        html += '<td align="center">' + data[i].id_transferencia + '</td>' +
            '<td align="center">' + data[i].data_transferencia + '</td>' +
            '<td align="left" width="290">' + data[i].desc_produto + '</td>' +
            '<td align="center">' + data[i].origem + '</td>' +
            '<td align="center">' + data[i].destino + '</td>' +
            '<td align="center">' + data[i].qtde_transferencia + '</td></tr>';
    }
    $("#lista_transferencia").html(html);

}