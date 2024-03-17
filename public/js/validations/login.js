function validateLogin() {
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (email === "" || password === "") {
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
}
