$(function () {

    $('.cpf').mask('999.999.999-99');
    $('.rg').mask('?9999999');
    $('.phone').mask('(99) 9999-9999?9');
    $('.date').mask('99/99/9999');

    /**
     * Executa função ao clicar para adicionar um novo campo de telefone
     * @return {void} 
     */
    $('#addPhoneField').click(function () {
      // Clona campo de telefone
      var newInput = $('#fieldPhone').parent().clone();

      // Cria um botão delete para remover o campo
      var btnDelete = $('<a>').attr({
        'href': 'javascript:;',
        'class': 'btn btn-sm btn-danger pull-right removeInputPhone',
      })
      .css('margin-bottom' , '5px')
      .html('<i class="glyphicon glyphicon-remove"></i>');

      // Cria evento para quando clicar nesse botão de remover campo, execute a remoção
      btnDelete.on('click', function () {
        $(this).parent().remove();
      })

      // Insere o botão de delete no novo campo
      newInput.find('label').after(btnDelete);
      newInput.find('input').val('');

      // Adiciona novo campo na tela com efeito
      newInput.appendTo('.return-more-phones').hide().fadeIn('slow');

      $('.phone').mask('(99) 9999-9999?9');

    });

    $('.removeInputPhone').on('click', function () {
      $(this).parent().remove();
    })
  })