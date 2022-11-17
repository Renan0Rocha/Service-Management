function addServico(id, nome, valor){
    bootstrap.Modal.getOrCreateInstance(document.getElementById('modalOS')).hide();
    const tcorpo = document.getElementById('itemOS');
    const linha = document.createElement('tr');
    linha.innerHTML="<td>"+id+"</td><td>"+nome+"</td>";
    tcorpo.appendChild(linha);
}