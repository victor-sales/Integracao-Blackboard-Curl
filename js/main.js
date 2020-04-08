$(document).ready(function () {
    $('#form').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "curl.php",
            type: "POST",
            processData: false,
            contentType: false,
            data: formData,
            beforeSend: function () {
                var verifica_select_unity = $('#select_unity').val();
                var verifica_select_file = $('#select_file').val();
                var verifica_arquivo = $('#file').val();

                if (verifica_select_unity == "" || verifica_select_unity == null) {
                    alert('Selecione uma unidade');
                    return false;
                } else {
                    if (verifica_select_file == "" || verifica_select_file == null) {
                        alert('Selecione uma opção de arquivo');
                        return false;
                    } else {
                        if (verifica_arquivo == "" || verifica_arquivo == null) {
                            alert('O arquivo não foi inserido');
                            return false;
                        } else {
                            if (verifica_arquivo.search(".txt") == -1 && verifica_arquivo.search(".csv") == -1) {
                                alert("Arquivo inválido. A aplicação aceita arquivos .txt e .csv");
                                return false;
                            } else {
                                alert("Enviando Arquivo...");
                            }
                        }
                    }
                }
            },
            success: function (data) {
                var string_ret = data.split(":");
                status = string_ret[0];
                saida = string_ret[1];
                $('#status').html(status);
                $('#saida').html(saida);
                if (status == 'Sucesso') {
                    $('#status').addClass('sucesso');
                    $('#div_table').removeAttr('hidden');
                } else {
                    $('#status').addClass('erro');
                    $('#div_table').removeAttr('hidden');
                }
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        });

        if ($('#status').hasClass('sucesso')) {
            $('#status').removeClass('sucesso');
        } else {
            $('#status').removeClass('erro');
        }
    });
});