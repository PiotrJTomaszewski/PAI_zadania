function isWhiteSpaceOrEmpty(str) {
    return /^[\s\t\r\n]*$/.test(str)
}

function isEmailInvalid(str) {
    let email = /^[a-zA-Z_0-9\.]+@[a-zA-Z_0-9\.]+\.[a-zA-Z][a-zA-Z]+$/;
    return !email.test(str);
}

function checkStringAndFocus(obj, msg, val_fun) {
    let str = obj.value;
    let errorFieldName = "e_" + obj.name.substr(2, obj.name.length);
    if (!val_fun(str)) {
        document.getElementById(errorFieldName).innerHTML = "";
        return true;
    } else {
        document.getElementById(errorFieldName).innerHTML = msg;
        obj.focus();
        return false;
    }
}

function validate(formularz) {
    result = true;
    result &= checkStringAndFocus(formularz.elements["f_imie"], "Podaj imię!", isWhiteSpaceOrEmpty);
    result &= checkStringAndFocus(formularz.elements["f_nazwisko"], "Podaj nazwisko!", isWhiteSpaceOrEmpty);
    result &= checkStringAndFocus(formularz.elements["f_email"], "Podaj właściwy email!", isEmailInvalid);
    result &= checkStringAndFocus(formularz.elements["f_kod"], "Podaj kod pocztowy!", isWhiteSpaceOrEmpty);
    result &= checkStringAndFocus(formularz.elements["f_ulica"], "Podaj nazwę ulicy/osiedla!", isWhiteSpaceOrEmpty);
    result &= checkStringAndFocus(formularz.elements["f_miasto"], "Podaj nazwę miasta!", isWhiteSpaceOrEmpty);
    return Boolean(result);
};

function showElement(e) {
    document.getElementById(e).style.visibility = 'visible';
}

function hideElement(e) {
    document.getElementById(e).style.visibility = 'hidden';
}

function nextNode(e) {
    while (e && e.nodeType != 1) {
        e = e.nextSibling;
    }
    return e;
}

function prevNode(e) {
    while (e && e.nodeType != 1) {
        e = e.previousSibling;
    }
    return e;
}

function alterRows(i, e) {
    if (e) {
        if (i % 2 == 1) {
            e.setAttribute("style", "background-color: Aqua;");
        }
        alterRows(++i, nextNode(e.nextSibling));
    }
}

function swapRows(b) {
    let tab = prevNode(b.previousSibling);
    let tBody = nextNode(tab.firstChild);
    let lastNode = prevNode(tBody.lastChild);
    tBody.removeChild(lastNode);
    let firstNode = nextNode(tBody.firstChild);
    tBody.insertBefore(lastNode, firstNode);
}

function cnt(form, msg, maxSize) {
    if (form.value.length > maxSize)
        form.value = form.value.substring(0, maxSize);
    else
        msg.innerHTML = maxSize - form.value.length;
}