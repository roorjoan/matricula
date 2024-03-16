function validateRegister() {
  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;
  const repeatPassword = document.getElementById("repeat_password").value;
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (name === "" || email === "" || password === "" || repeatPassword === "") {
    alert("Todos los campos son obligatorios.");
    return false;
  }

  if (!emailRegex.test(email)) {
    alert("Ingresa un email válido.");
    return false;
  }

  if (password.length < 8) {
    alert("La contraseña debe tener al menos 8 caracteres.");
    return false;
  }

  if (password !== repeatPassword) {
    alert("Las contraseñas no coinciden.");
    return false;
  }
}
