function validateCreateOrEdit() {
  const ci = document.getElementById("ci").value;
  const name = document.getElementById("name").value;
  const lastName = document.getElementById("last_name").value;
  const gender = document.getElementById("gender").value;
  const address = document.getElementById("address").value;

  if (
    ci === "" ||
    name === "" ||
    lastName === "" ||
    gender === "" ||
    address === ""
  ) {
    alert("Todos los campos son obligatorios.");
    return false;
  }

  if (ci.length !== 11) {
    alert("El carnet de identidad debe tener 11 caracteres.");
    return false;
  }

  if (isNaN(ci)) {
    alert("El carnet de identidad debe ser numérico.");
    return false;
  }
}
