const tcorpo = document.getElementById('ItemOS');

function AddServico(id, nome, valor) {
    const mOS = bootstrap.Modal.getOrCreateInstance(document.getElementById('modalOS'));
    mOS.hide();
    const linha = document.createElement('tr');
    var inputID = '<td><input value="' + id + '" name="idServ[]" readonly size="2" class="form-control-plaintext" id="id' + id + '"></td>';
    var inputNome = '<td>' + nome + '</td>';
    var inputQtde = '<td><input value="1" name="qtdeServ[]" size="5" onblur="calcular(' + id + ')" id="qtde' + id + '"></td>';
    var inputValor = '<td><input value="' + valor + '" name="valorServ[]" readonly size="5" id="valor' + id + '" class="form-control-plaintext"></td>';
    var inputTotal = '<td><input value="' + valor + '" name="totServ[]" readonly size="5" id="total' + id + '" class="form-control-plaintext"></td>';
    var inputDel = '<td><button type="button" class="btn btn-outline-danger" onclick="removeServ(this)"><i class="bi bi-trash3-fill"></i></button></td>'
    linha.innerHTML = inputID + inputNome + inputQtde + inputValor + inputTotal + inputDel;
    tcorpo.appendChild(linha);
    totalVenda();
}

function removeServ(linha) {
    var i = linha.parentNode.parentNode.rowIndex;
    document.getElementById('tblOS').deleteRow(i);
    totalVenda();
}

function calcular(id) {
    const total = document.getElementById('total' + id);
    var qtde = parseFloat(document.getElementById('qtde' + id).value);
    var valor = parseFloat(document.getElementById('valor' + id).value);
    total.value = qtde * valor;
    totalVenda();
}

function totalVenda() {
    var l = tcorpo.rows.length;
    var s = 0;
    for (var i = 0; i < l; i++) {
        var tr = tcorpo.rows[i];
        var total = parseFloat(document.getElementById(tr.childNodes[4].childNodes[0].getAttribute('id')).value);
        s += total;
    }
    var totLiq = s-document.getElementById('txtDesconto').value;
    document.getElementById('txtTotal').value = totLiq;
}