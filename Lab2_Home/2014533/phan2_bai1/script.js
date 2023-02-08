// Create button
document.querySelector(".create").onclick = () => {
  create();
};

// Delete All
document.querySelector(".del-all").onclick = () => {
  deleteAll();
};

// Add column
document.querySelector(".add-col").onclick = () => {
  addColumn();
};

// Add row
document.querySelector(".add-row").onclick = () => {
  addRow();
};

// Edit
document.querySelector(".edit").onclick = () => {
  if (document.getElementById("table").innerHTML.trim() == "")
    return alert("No table to edit!");

  document.querySelector(".save").style.display = "block";
  document.querySelector(".edit").style.display = "none";
  editRow();
};

// Save
document.querySelector(".save").onclick = () => {
  document.querySelector(".save").style.display = "none";
  document.querySelector(".edit").style.display = "block";
  return saveRow();
};

// Delete row
document.querySelector(".del-row").onclick = () => {
  if (
    document.getElementById("table").innerHTML.trim() == "" ||
    document.getElementById("table-body").innerHTML.trim() == ""
  )
    return alert("No thing to delete!");

  let no = parseInt(document.getElementById("row-del").value);
  let numOfRow = document
    .getElementById("table-id")
    .getElementsByTagName("tr").length;
  no > 0 && no < numOfRow
    ? deleteRow(no)
    : alert(
        `You can delete from row 1 to row ${numOfRow - 1}, header is row 0!`
      );
};

// Delete col
document.querySelector(".del-col").onclick = () => {
  if (document.getElementById("table").innerHTML.trim() == "")
    return alert("No thing to delete!");

  let no = parseInt(document.getElementById("col-del").value);
  let numOfCol = document
    .getElementById("table-id")
    .getElementsByTagName("th").length;
  no > 0 && no <= numOfCol
    ? deleteColumn(no)
    : alert(`You can delete from col 1 to col ${numOfCol}!`);
};

const create = () => {
  const initialTable = `<table id="table-id" class="table-fixed mx-auto mb-5">
  <thead>
    <tr class="t-head bg-gray-100">
      <th class="px-4 py-3">No</th>
      <th class="px-4">Full name</th>
    </tr>
  </thead>
  <tbody id="table-body">
  <tr class="border-y bg-white even:bg-gray-100 hover:bg-green-200">
  <td class="px-4">1</td>
  <td class="px-4 py-3">Huynh Huu Quyet Thang</td>
</tr>
  </tbody>
</table>`;
  const tableSection = document.getElementById("table");
  tableSection.innerHTML = initialTable;
};

const addRow = () => {
  if (document.getElementById("table").innerHTML.trim() == "")
    return alert("No table to add!");

  let numOfCol = document
    .getElementById("table-id")
    .getElementsByTagName("th").length;

  let cell = "";
  for (let index = 0; index < numOfCol; index++) {
    cell += '<td class="px-4 py-3">New data</td>';
  }

  const newRow = `<tr class="border-y bg-white even:bg-gray-100 hover:bg-green-200">${cell}</tr>`;

  const tableBody = document.getElementById("table-body");
  tableBody.innerHTML += newRow;
};

const addColumn = () => {
  if (document.getElementById("table").innerHTML.trim() == "")
    return alert("No table to add!");

  const col = document.querySelector(".t-head");
  col.innerHTML += `<th class="px-4 py-3">New column</th>`;
  const allRow = document
    .getElementById("table-body")
    .getElementsByTagName("tr");

  for (let index = 0; index < allRow.length; index++) {
    allRow[index].innerHTML += `<td class="px-4">New data</td>`;
  }
};

const deleteRow = (no) => {
  const table = document.getElementById("table-id");
  table.getElementsByTagName("tr")[no].remove();
};

const deleteColumn = (no) => {
  const tHead = document.getElementsByTagName("th")[no - 1].remove();
  const row = document.getElementById("table-body").getElementsByTagName("tr");
  for (let index = 0; index < row.length; index++) {
    row[index].getElementsByTagName("td")[no - 1].remove();
  }
};

const deleteAll = () => {
  const tableSection = document.getElementById("table");
  tableSection.innerHTML = ``;
};

const editRow = () => {
  var headerCells = document
    .getElementById("table-id")
    .getElementsByTagName("th");
  for (let index = 0; index < headerCells.length; index++) {
    const oldData = headerCells[index].innerHTML;
    headerCells[
      index
    ].innerHTML = `<input type="text" class="edit-input border-solid border" value="${oldData}" />`;
  }
  var cells = document.getElementById("table-id").getElementsByTagName("td");
  for (let index = 0; index < cells.length; index++) {
    const oldData = cells[index].innerHTML;
    cells[
      index
    ].innerHTML = `<input type="text" class="edit-input border-solid border" value="${oldData}" />`;
  }
};

const saveRow = () => {
  var headerCells = document
    .getElementById("table-id")
    .getElementsByTagName("th");
  for (let index = 0; index < headerCells.length; index++) {
    const newData = headerCells[index].querySelector(".edit-input").value;
    headerCells[index].innerHTML = newData;
  }
  var cells = document.getElementById("table-id").getElementsByTagName("td");
  for (let index = 0; index < cells.length; index++) {
    const newData = cells[index].querySelector(".edit-input").value;
    cells[index].innerHTML = newData;
  }
};
