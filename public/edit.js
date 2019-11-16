const editButton = document.getElementById("edit_button");
const deleteButton = document.getElementById("delete_button");
const form = document.getElementById("edit_form");
const error_container = document.getElementsByClassName("error_container")[0];
const _token = document.getElementsByName('_token')[0].value;
const _token2 = document.getElementsByName('_token')[1].value;

/* Toggle visibility of form */

editButton.addEventListener("click", (event) => {
  event.preventDefault();
  const textFields = document.getElementsByClassName("property_value");
  const editInputs = document.getElementsByClassName("edit");
  const buttons = document.getElementsByClassName("btn");
  for (let i = 0; i < textFields.length; i++) {
    textFields[i].classList.add("d-none");
    editInputs[i].classList.remove("d-none");
    if (editInputs[i].nodeName === "SELECT") {
      for (let j = 0; j < editInputs[i].children.length; j++) {
        if (editInputs[i].children[j].textContent.indexOf(textFields[i].textContent) !== -1) {
          editInputs[i].children[j].setAttribute('selected', 'selected');
          break;
        }; 
      };
    } else if (editInputs[i].nodeName === "TEXTAREA") {
      editInputs[i].value = textFields[i].textContent;
      editInputs[i].style.height = editInputs[i].scrollHeight + "px";
    } else {
      editInputs[i].value = textFields[i].textContent;
    };
  };
  for (let i = 0; i < buttons.length; i++) {
    buttons[i].classList.toggle("d-none");
  };
});

/* Submits form data */

/* form.addEventListener("submit", async (event) => {
  event.preventDefault();
  const formData = new FormData(form);
  console.log(form);
  console.log(_token);
  const res = await fetch(`/tours/${tourId}`, {
    method: "put",
    headers: {
      'X-CSRF-TOKEN': _token
    },
    body: formData
  });
  if (res.ok) {
    console.log(res);
    console.log(await res.text());
  } else {
    const text = await res.text();
    error_container.textContent = text;
  }
}); */

/* Send a request to delete a tour */

/* deleteButton.addEventListener("click", async (event) => {
  event.preventDefault();
  const res = await fetch(`/tours/${tourId}`, {
    method: "delete",
    headers: {
      'X-CSRF-TOKEN': _token2
    }
  });
  if (res.ok) {
    window.location.href = res.url;
  } else {
    const text = await res.text();
    error_container.textContent = text;
  }
}); */