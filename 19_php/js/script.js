console.log("oke");
const keyword = document.getElementById("keyword");
const submit = document.getElementById("submit");
const container = document.getElementById("container");

//tambahkan event ke keyword dimana saat mengetik dapat di ambil value nya
keyword.addEventListener("keyup", function () {
  //membuat object ajax
  const ajax = new XMLHttpRequest();

  //cek kondisi
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      container.innerHTML = ajax.responseText;
    }
  };

  //eksekusi ajax
  //rumus
  //   ajax.open("method","tujuan",jika true itu Asynchronous sedang kan false Synchronous)
  ajax.open("GET", "ajax/dataweb.php?keyword=" + keyword.value, true);
  ajax.send();
});

