function validateName(name) {
  var regex = /\w{3,}/gi;
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
