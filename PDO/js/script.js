function addServico(id, nome, valor){
    bootstrap.Modal.getOrCreateInstance(document.getElementById('modalOS')).hide();
    const tcorpo = document.getElementById('itemOS');
    const linha = document.createElement('tr');
    var inputId = '<td><input name="idServ[]" value="'+id+'" readonly size="5" class="form-control-plaintext"></td>';
    var inputNome = '<td>'+nome+'</td>'
    var inputValor = '<td>'+valor+'</td>'
    linha.innerHTML= inputId + inputNome + inputValor;
    tcorpo.appendChild(linha);
}