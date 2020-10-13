/**
 * Método capaz de realizar a consulta do Cep em uma API pública
 * E retornar os Dados em Json do nome da cidade, estado e rua
 * 
 * Dependencia Jquery Versão 3.5.1
 * Atuamente esse arquivo utiliza a API publica do postmon.com.br
 * 
 * @param {string} cep
 * @return {string}
 * 
 * 
 * @autor Adriel Rosanelli
 * @date 02-06-2020
 * 
 */



function consultaCep(cep, retornoDados) {
    if (cep != "") {
        let apiUrl = "https://api.postmon.com.br/v1/cep/";
        $.ajax({
            method: "GET",
            url: apiUrl + cep,
            dataType:"json",
            timeout: 15000,
            success: function (dados) {
                retornoDados(dados);
            },
            error: function () {
                return false;
            }
        });
    } else {
        return false;
    }
}