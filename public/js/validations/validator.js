/**
 * Se comprueba que el nombre tenga el formato correcto.
 * Si es obligatorio, se valida. Y si no es obligatorio pero se han escrito datos, también.
 * Si no es obligatorio y no se han escrito datos, el border-color será el original.
 * Si el formato es correcto, el borde del input se volverá de color verde. Sino, de color rojo.
 * @param {String} name [Nombre del producto, categoría, etc. También se utiliza para las informaciones]
 */
function validateName(name) {
  if (name.required || (!name.required && name.value.length != 0)) {
    var regex = /[a-zA-Z]{3,100}/i;
    if (!(name.value).match(regex)) {
      name.style.borderColor = "#a94442";
    } else {
      name.style.borderColor = "#5cb85c";
    }
  }
}

/**
 * Se comprueba que el CIF tenga el formato correcto.
 * Si el formato es correcto, el borde del input se volverá de color verde. Sino, de color rojo.
 * @param  {String} cif [CIF de la empresa transportista]
 */
function validateCIF(cif) {
  var regex = /^[a-zA-Z][0-9]{8}$/;
  if (!(cif.value).match(regex)) {
    cif.style.borderColor = "#a94442";
  } else {
    cif.style.borderColor = "#5cb85c";
  }
}

/**
 * Se comprueba que el número de teléfono tenga el formato correcto.
 * Si el formato es correcto, el borde del input se volverá de color verde. Sino, de color rojo.
 * @param  {String} phone [Número de teléfono de las empresas y de los usuarios]
 */
function validatePhone(phone) {
  var regex = /\d{9}/;
  if (!(phone.value).match(regex)) {
    phone.style.borderColor = "#a94442";
  } else {
    phone.style.borderColor = "#5cb85c";
  }
}

/**
 * Se comprueba que el precio tenga el formato correcto.
 * Si el formato es correcto, el borde del input se volverá de color verde. Sino, de color rojo.
 * @param  {String} price [Precio de los productos y de los planes]
 */
function validatePrice(price) {
  var regex = /^\d{1,2}[,|.]\d{1,2}$/;
  if (!(price.value).match(regex)) {
    price.style.borderColor = "#a94442";
  } else {
    price.style.borderColor = "#5cb85c";
  }
}

/**
 * Se comprueba que el peso tenga el formato correcto.
 * Si es obligatorio, se valida. Y si no es obligatorio pero se han escrito datos, también.
 * Si no es obligatorio y no se han escrito datos, el border-color será el original.
 * Si el formato es correcto, el borde del input se volverá de color verde. Sino, de color rojo.
 * @param  {int} weight [Peso del producto]
 */
function validateWeight(weight) {
  if (weight.required || (!weight.required && weight.value.length != 0)) {
    var regex = /\d{3,4}/;
    if (!(weight.value).match(regex)) {
      weight.style.borderColor = "#a94442";
    } else {
      weight.style.borderColor = "#5cb85c";
    }
  }
}

/**
 * Se comprueba que el número de stok tenga el formato correcto.
 * Si el formato es correcto, el borde del input se volverá de color verde. Sino, de color rojo.
 * @param  {int} stock [Cantidad de ese producto en el almacén]
 */
function validateStock(stock) {
  var regex = /\d+/;
  if (!(stock.value).match(regex)) {
    stock.style.borderColor = "#a94442";
  } else {
    stock.style.borderColor = "#5cb85c";
  }
}

/* CAMBIAR POR ISO DATE */
/**
 * Se comprueba que el la fecha de caducidad tenga el formato correcto.
 * Si es obligatorio, se valida. Y si no es obligatorio pero se han escrito datos, también.
 * Si no es obligatorio y no se han escrito datos, el border-color será el original.
 * Se tiene en cuenta que la fecha de caducidad no pueda ser hoy ni anterior.
 * Si el formato es correcto, el borde del input se volverá de color verde. Sino, de color rojo.
 * @param  {Date} date [Fecha de caducidad formato ISO yyyy-mm-dd]
 */
function validateExpDate(date) {
  if (date.required || (!date.required && date.value.length != 0)) {
    var today = new Date();
    var input = new Date(date.value);
    //console.log("date: " + input.toISOString());
    if (input < today) {
      date.style.borderColor = "#a94442";
    } else {
      date.style.borderColor = "#5cb85c";
    }
  }
}

/**
 * Se comprueba que el DNI tenga el formato correcto.
 * Si es obligatorio, se valida. Y si no es obligatorio pero se han escrito datos, también.
 * Si no es obligatorio y no se han escrito datos, el border-color será el original.
 * Si el formato es correcto, el borde del input se volverá de color verde. Sino, de color rojo.
 * @param  {String} dni [DNI del usuario]
 */
function validateDNI(dni) {
  if (dni.required || (!dni.required && dni.value.length != 0)) {
    var regex = /^\d{8}[aA-zZ]{1}$/;
    if (!(dni.value).match(regex)) {
      dni.style.borderColor = "#a94442";
    } else {
      dni.style.borderColor = "#5cb85c";
    }
  }
}

/**
 * Se comprueba que el email tenga el formato correcto.
 * Si el formato es correcto, el borde del input se volverá de color verde. Sino, de color rojo.
 * @type {String} email [Email del usuario]
 */
function validateEmail(email) {
  var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (!(email.value).match(regex)) {
    email.style.borderColor = "#a94442";
  } else {
    email.style.borderColor = "#5cb85c";
  }
}

/**
 * Se comprueba que las dimensiones del producto tengan el formato correcto.
 * Si es obligatorio, se valida. Y si no es obligatorio pero se han escrito datos, también.
 * Si no es obligatorio y no se han escrito datos, el border-color será el original.
 * Si el formato es correcto, el borde del input se volverá de color verde. Sino, de color rojo.
 * @param  {int} dimensions [1: Cabe desde el plan Charming, hasta el Premium,
 * 2: Cabe desde el Pro hasta el Premium, 3: Sólo cabe en la caja Premium]
 */
function validateDimensions(dimensions) {
  if (dimensions.required || (!dimensions.required && dimensions.value.length != 0)) {
    var regex = /^[1-3]{1}$/;
    if (!(dimensions.value).match(regex)) {
      dimensions.style.borderColor = "#a94442";
    } else {
      dimensions.style.borderColor = "#5cb85c";
    }
  }
}
