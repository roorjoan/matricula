function validateMatricula() {
  const noMatricula = document.getElementById("no_matricula").value;
  const grade = document.getElementById("grade").value;
  const grupo = document.getElementById("grupo").value;
  const regime = document.getElementById("regime").value;
  const school = document.getElementById("school").value;

  if (
    noMatricula === "" ||
    grade === "" ||
    grupo === "" ||
    regime === "" ||
    school === ""
  ) {
    alert("Todos los campos son obligatorios.");
    return false;
  }

  if (noMatricula.length !== 8) {
    alert("El número de matrícula debe tener 8 caracteres.");
    return false;
  }

  if (isNaN(noMatricula)) {
    alert("El número de matrícula debe ser numérico.");
    return false;
  }
}
