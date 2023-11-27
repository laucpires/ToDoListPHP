// SELEÇÃO DOS ELEMENTOS
const addForm = document.getElementById("form-add");
const addInputText = document.getElementById("form-input-text");
const addInputDate = document.getElementById("form-input-date");
const downloadList = document.getElementById("download-list");
const taskList = document.getElementsByClassName("task-list")[0];

if (taskList && taskList.hasChildNodes) { // ???
  downloadList.classList.remove("hide");
}

// EVENTOS
addForm.addEventListener("submit", (e) => {

  const inputTextValue = addInputText.value;
  const inputDateValue = addInputDate.value;

  if (!inputTextValue) {
    e.preventDefault();
    alert("O preenchimento da descrição da atividade é obrigatório.");
  }

  let inclusionDate = new Date();
  inclusionDate.setHours(0, 0, 0, 0);

  let conclusionDate = new Date(inputDateValue);
  conclusionDate.setHours(0, 0, 0, 0);
  
  conclusionDate.setDate(conclusionDate.getDate() + 1);

  if (conclusionDate < inclusionDate) {
    e.preventDefault();
    alert("A data de conclusão deve ser maior ou igual a data de inclusão.");
  }

  addInputText.focus();
});
