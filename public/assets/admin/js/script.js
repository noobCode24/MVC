// Status enter service

const statusEle = document.getElementById('status');
statusEle.onchange = function () {
    var value = statusEle.value;
    statusEle.classList.add('btn');
    if (value == '1') {
        statusEle.classList.add('btn-success');
        statusEle.classList.remove('btn-danger');
    } else if (value == '0') {
        statusEle.classList.add('btn-danger');
        statusEle.classList.remove('btn-success');
    } else {
        statusEle.classList.remove('btn-success');
        statusEle.classList.remove('btn-danger');
        statusEle.classList.remove('btn');
    }
}
