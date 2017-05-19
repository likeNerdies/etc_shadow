function validateName(name) {
  // Si es obligatorio, se valida. Y si no es obligatorio pero se han escrito datos, también.
  //Si no es obligatorio y no se han escrito datos, el border-color será el original.
  if (name.required || (!name.required && name.value.length != 0)) {
    var regex = /[a-zA-Z]{3,100}/i;
    if (!(name.value).match(regex)) {
      name.style.borderColor = "#a94442";
    } else {
      name.style.borderColor = "#5cb85c";
    }
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
  // Si es obligatorio, se valida. Y si no es obligatorio pero se han escrito datos, también.
  //Si no es obligatorio y no se han escrito datos, el border-color será el original.
  if (weight.required || (!weight.required && weight.value.length != 0)) {
    var regex = /\d{3,4}/;
    if (!(weight.value).match(regex)) {
      weight.style.borderColor = "#a94442";
    } else {
      weight.style.borderColor = "#5cb85c";
    }
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

function validateExpDate(date) { // CLARA: Comprovar que la data no sigui NaN
  // Si es obligatorio, se valida. Y si no es obligatorio pero se han escrito datos, también.
  //Si no es obligatorio y no se han escrito datos, el border-color será el original.
  if (date.required || (!date.required && date.value.length != 0)) {
    var today = new Date();
    var input = new Date(date.value);
    console.log("input: " + isNaN(input));
    if (input < today) { // La fecha de caducidad no puede ser ni hoy ni el anterior
      date.style.borderColor = "#a94442";
    } else {
      date.style.borderColor = "#5cb85c";
    }
  }
}

function validateDNI(dni) {
  // Si es obligatorio, se valida. Y si no es obligatorio pero se han escrito datos, también.
  //Si no es obligatorio y no se han escrito datos, el border-color será el original.
  if (dni.required || (!dni.required && dni.value.length != 0)) {
    var regex = /^\d{8}[aA-zZ]{1}$/;
    if (!(dni.value).match(regex)) {
      dni.style.borderColor = "#a94442";
    } else {
      dni.style.borderColor = "#5cb85c";
    }
  }
}

function validateEmail(email) {
  var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (!(email.value).match(regex)) {
    email.style.borderColor = "#a94442";
  } else {
    email.style.borderColor = "#5cb85c";
  }
}

function validateDimensions(dimensions) {
  // Si es obligatorio, se valida. Y si no es obligatorio pero se han escrito datos, también.
  //Si no es obligatorio y no se han escrito datos, el border-color será el original.
  if (dimensions.required || (!dimensions.required && dimensions.value.length != 0)) {
    var regex = /^\d{1,2}([,.]\d{1,2})?x\d{1,2}([,.]\d{1,2})x\d{1,2}([,.]\d{1,2})?$/;
    if (!(dimensions.value).match(regex)) {
      dimensions.style.borderColor = "#a94442";
    } else {
      dimensions.style.borderColor = "#5cb85c";
    }
  }
}
