const tombolCari = document.querySelector('.tombol-cari');
const keyword = document.querySelector('.keyword');
const container = document.querySelector('.container');

//hilangkan tombol carinya
tombolCari.style.display = 'none';

keyword.addEventListener('keyup',function () {

//ajax
// cara lama xmlhttprequest
// const xhr = new XMLHttpRequest();

// xhr.onreadystatechange = function(){
//   if(xhr.readyState == 4 && xhr.status == 200){
//     container.innerHTML = xhr.responseText;
//   }
// }

// xhr.open('get','ajax/ajax_cari.php?keyword=' + keyword.value);
// xhr.send();

// cara baru fetch
fetch('ajax/ajax_cari.php?keyword=' + keyword.value)
.then((response) => response.text())
.then((response) => (container.innerHTML = response));

})

