/**
 * Se comprueba que el nombre tenga el formato correcto.
 * @param {String} name [Nombre del producto, categoría, etc. También se utiliza para las informaciones]
 */
function validateName(name) {
    var retorn = true;
    var regex = /[a-zA-Z]{3,150}/i;
    if (!String(name).match(regex)){
        retorn = false;
    }
    return retorn;
}
function validateLongText(text) {
    var retorn = true;
    var regex = /\w{3,}/i;
    if (!String(text).match(regex)){
        retorn = false;
    }
    return retorn;
}

/**
 * Se comprueba que el CIF tenga el formato correcto.
 * @param  {String} cif [CIF de la empresa transportista]
 */
function validateCIF(cif) {
    if (!cif || cif.length !== 9) {
        return false;
    }

    var letters = ['J', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I'];
    var digits = cif.substr(1, cif.length - 2);
    var letter = cif.substr(0, 1);
    var control = cif.substr(cif.length - 1);
    var sum = 0;
    var i;
    var digit;

    if (!letter.match(/[A-Z]/)) {
        return false;
    }

    for (i = 0; i < digits.length; ++i) {
        digit = parseInt(digits[i]);

        if (isNaN(digit)) {
            return false;
        }

        if (i % 2 === 0) {
            digit *= 2;
            if (digit > 9) {
                digit = parseInt(digit / 10) + (digit % 10);
            }

            sum += digit;
        } else {
            sum += digit;
        }
    }

    sum %= 10;
    if (sum !== 0) {
        digit = 10 - sum;
    } else {
        digit = sum;
    }

    if (letter.match(/[ABEH]/)) {
        return String(digit) === control;
    }
    if (letter.match(/[NPQRSW]/)) {
        return letters[digit] === control;
    }

    return String(digit) === control || letters[digit] === control;
}

/**
 * Se comprueba que el número de teléfono tenga el formato correcto.
 * @param  {String} phone [Número de teléfono de las empresas y de los usuarios]
 */
function validatePhone(phone) {
    var retorn = true;
    var regex = /^((\+?34([ \t|\-])?)?[9|6|7]((\d{1}([ \t|\-])?[0-9]{3})|(\d{2}([ \t|\-])?[0-9]{2}))([ \t|\-])?[0-9]{2}([ \t|\-])?[0-9]{2})$/;
    if (!(phone).match(regex)) {
        retorn = false;
    }
    return retorn;
}

/**
 * Se comprueba que el precio tenga el formato correcto.
 * @param  {String} price [Precio de los productos y de los planes]
 */
function validatePrice(price) {
    var retorn = true;
    var regex = /^(\d{1,3}\.\d{1,2}$)|^(\d{1,3}$)/;
    if (!(price).match(regex)) {
        retorn = false;
    }
    return retorn;
}

/**
 * Se comprueba que el peso tenga el formato correcto.
 * @param  {int} weight [Peso del producto]
 */
function validateWeight(weight) {
    var retorn = true;
    var regex = /^\d{3,4}$/;
    if (!(weight).match(regex)) {
        retorn = false;
    }
    return retorn;

}

/**
 * Se comprueba que el número de stok tenga el formato correcto.
 * @param  {int} stock [Cantidad de ese producto en el almacén]
 */
function validateStock(stock) {
    var retorn = false;
    var regex = /\d+/;
    if ((stock).match(regex) && (stock >= 0 && stock <= 2999)) {
        retorn = true;
    }
    return retorn;
}

/* CAMBIAR POR ISO DATE */
/**
 * Se comprueba que el la fecha de caducidad tenga el formato correcto.
 * @param  {Date} date [Fecha de caducidad formato ISO yyyy-mm-dd]
 */
function validateDate(date) {
    var retorn = true;
    var regex = /^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d$/;
    if (!(date).match(regex)) {
        retorn = false;
    }
    return retorn;
}

/**
 * Se comprueba que el DNI tenga el formato correcto.
 * @param  {String} dni [DNI del usuario]
 */
function validateDniNif(value){

    var validChars = 'TRWAGMYFPDXBNJZSQVHLCKET';
    var nifRexp = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]{1}$/i;
    var nieRexp = /^[XYZ]{1}[0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKET]{1}$/i;
    var str = value.toString().toUpperCase();

    if (!nifRexp.test(str) && !nieRexp.test(str)) return false;

    var nie = str
        .replace(/^[X]/, '0')
        .replace(/^[Y]/, '1')
        .replace(/^[Z]/, '2');

    var letter = str.substr(-1);
    var charIndex = parseInt(nie.substr(0, 8)) % 23;

    if (validChars.charAt(charIndex) === letter) return true;

    return false;
}

/**
 * Se comprueba que el email tenga el formato correcto.
 * @type {String} email [Email del usuario]
 */
function validateEmail(email) {
    var retorn=true;
    var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!(email).match(regex)) {
        retorn=false;
    }
    return retorn;
}
function validateCodePostal(code) {
    var retorn=true;
    var regex =/^(5[0-2]|[0-4][0-9])[0-9]{3}$/;
    if (!(code).match(regex)) {
        retorn=false;
    }
    return retorn;
}

function validatePassword(password){
    return password.length>=8
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
    var retorn=true;
    var regex = /^[1-3]{1}$/;
    if (!dimensions.match(regex)) {
        retorn=false;
    }
    return retorn;
}

