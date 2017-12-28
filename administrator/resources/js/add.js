//var myInput = document.getElementById('input_rupiah');

//    concole.log(myInput.value);
//myInput.addEventListener('keyup', function(e) {
//});

function convertToRupiah(e) {
    var a = e.value;
    var b = a.replace(/[^\d]/g,"").toString();
    
    console.log(b);
}