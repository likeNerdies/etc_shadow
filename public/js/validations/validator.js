function validateName(name) {
  console.log(name.required);
  var regex = /[a-zA-Z]{3,100}/i;
  if (!(name.value).match(regex)) {
    name.style.borderColor = "#a94442";
  } else {
    name.style.borderColor = "#5cb85c";
  }
}

function validateCIF(cif) {
  var regex = /^[a-zA-Z][0-9]{8}$/;
  if (!(cif.value).match(regex)) {
    cif.style.borderColor = "#a94442";
  } else {
    cif.style.borderColor = "#5cb85c";
  }
}

function validatePhone(phone) {
  var regex = /\d{9}/;
  if (!(phone.value).match(regex)) {
    phone.style.borderColor = "#a94442";
  } else {
    phone.style.borderColor = "#5cb85c";
  }
}

function validatePrice(price) {
  var regex = /^\d{1,2}[,|.]\d{1,2}$/;
  if (!(price.value).match(regex)) {
    price.style.borderColor = "#a94442";
  } else {
    price.style.borderColor = "#5cb85c";
  }
}

function validateWeight(weight) {
  var regex = /\d{3,4}/;
  if (!(weight.value).match(regex)) {
    weight.style.borderColor = "#a94442";
  } else {
    weight.style.borderColor = "#5cb85c";
  }
}

function validateStock(stock) {
  var regex = /\d+/;
  if (!(stock.value).match(regex)) {
    stock.style.borderColor = "#a94442";
  } else {
    stock.style.borderColor = "#5cb85c";
  }
}

function validateExpDate(date) {
  var today = new Date();
  var input = new Date(date.value);
  if (input < today) { // La fecha de caducidad no puede ser ni hoy ni anterior
    date.style.borderColor = "#a94442";
  } else {
    date.style.borderColor = "#5cb85c";
  }
}

function validateDNI(dni) {
  var regex = /^\d{8}[aA-zZ]{1}$/;
  if (!(dni.value).match(regex)) {
    dni.style.borderColor = "#a94442";
  } else {
    dni.style.borderColor = "#5cb85c";
  }
}

function valideEmail(email) {
  var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (!(email.value).match(regex)) {
    email.style.borderColor = "#a94442";
  } else {
    email.style.borderColor = "#5cb85c";
  }
}
