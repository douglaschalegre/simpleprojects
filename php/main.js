$('.signup-form').submit(function(e) {
    e.preventDefault();

    var nome = $('#inp-nome').val();
    var postForm = {
        'nome': nome
    };

    $.ajax({
        type: 'POST', // Usa o método POST
        url: 'signup.php', // Página que será enviada o formulário
        data: postForm, // Conteúdo do envio
        success: function(data) {
            if (data == 'sucesso') {
                alert('Foo');
            } else {
                alert('Bar');
            }
        }
    });
});