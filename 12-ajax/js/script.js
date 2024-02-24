// ambil elemen yg dibutuhkan

const keyword = document.getElementById('keyword');
const searchButton = document.getElementById('searchButton');
const container = document.getElementById('container');

// add event when keyword changed
keyword.addEventListener('keyup', function() {
    // create ajax object
    const ajax = new XMLHttpRequest();

    // check ajax ready
    ajax.onreadystatechange = function() {
        if(ajax.readyState == 4 && ajax.status == 200) {
            container.innerHTML = ajax.responseText;
        }
    }

    // excecute ajax
    ajax.open('GET', 'ajax/mahasiswa.php?keyword=' +keyword.value, true);
    ajax.send();


})