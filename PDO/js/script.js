function addServico(id, nome, valor){
    bootstrap.Modal.getOrCreateInstance(document.getElementById('modalOS')).hide();
    const tcorpo = document.getElementById('itemOS');
    const linha = document.createElement('tr');
    var inputId = '<input name="id[]" value="'+id+'" readonly>';
    var inputQtde = '<input name="qtde[]" value="'+id+'" readonly>';
    linha.innerHTML="<td>"+inputId+"</td><td>"+nome+"</td><td></td>" + inputQtde;
    tcorpo.appendChild(linha);
}