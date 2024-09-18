let rowCount = 1;

function addRow() {
    rowCount++;
    var table = document.getElementById("dynamicTable").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow();

    var cell1 = newRow.insertCell(0);
    var cell2 = newRow.insertCell(1);
    var cell3 = newRow.insertCell(2);
    var cell4 = newRow.insertCell(3);
    var cell5 = newRow.insertCell(4);
    var cell6 = newRow.insertCell(5);
    var cell7 = newRow.insertCell(6);

    cell1.innerHTML = rowCount;
    cell2.innerHTML = '<input type="text" name="dynamic_name[]" placeholder="Enter name" class="form-control">';
    cell3.innerHTML = '<input type="text" name="dynamic_relation[]" placeholder="Enter relation" class="form-control">';
    cell4.innerHTML = '<input type="number" name="dynamic_dob_day[]" placeholder="Day" class="form-control" min="1" max="31">' +
        '<input type="number" name="dynamic_dob_month[]" placeholder="Month" class="form-control" min="1" max="12">' +
        '<input type="number" name="dynamic_dob_year[]" placeholder="Year" class="form-control" min="1900" max="2100">';
    cell5.innerHTML = '<input type="number" name="dynamic_dom_day[]" placeholder="Day" class="form-control" min="1" max="31">' +
        '<input type="number" name="dynamic_dom_month[]" placeholder="Month" class="form-control" min="1" max="12">' +
        '<input type="number" name="dynamic_dom_year[]" placeholder="Year" class="form-control" min="1900" max="2100">';
    cell6.innerHTML = '<input type="text" name="dynamic_mobile[]" placeholder="Enter mobile" maxlength="10" minlength="10" class="form-control">';
    cell7.innerHTML = '<button type="button" class="remove-button btn btn-danger btn-sm" onclick="removeRow(this)"><i class="fa fa-trash"></i></button>';
}

function removeRow(button) {
    var row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
    var rows = document.querySelectorAll("#dynamicTable tbody tr");
    rows.forEach((row, index) => {
        row.cells[0].innerText = index + 1;
    });
    rowCount = rows.length;
}

let deathRowCount = 1;

function addDeathRow() {
    deathRowCount++;
    var table = document.getElementById("dynamicDeathTable").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow();

    var cell1 = newRow.insertCell(0);
    var cell2 = newRow.insertCell(1);
    var cell3 = newRow.insertCell(2);
    var cell4 = newRow.insertCell(3);
    var cell5 = newRow.insertCell(4);
    var cell6 = newRow.insertCell(5);

    cell1.innerHTML = deathRowCount;
    cell2.innerHTML = '<input type="text" name="death_name[]" placeholder="Enter name" class="form-control">';
    cell3.innerHTML = '<input type="text" name="death_relation[]" placeholder="Enter relation" class="form-control">';
    cell4.innerHTML = '<input type="number" name="death_day[]" placeholder="Day" class="form-control" min="1" max="31">';
    cell5.innerHTML = '<input type="number" name="death_month[]" placeholder="Month" class="form-control" min="1" max="12">';
    cell6.innerHTML = '<button type="button" class="remove-button btn btn-danger btn-sm" onclick="removeDeathRow(this)"><i class="fa fa-trash"></i></button>';
}

function removeDeathRow(button) {
    var row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
    var rows = document.querySelectorAll("#dynamicDeathTable tbody tr");
    rows.forEach((row, index) => {
        row.cells[0].innerText = index + 1;
    });
    deathRowCount = rows.length;
}
