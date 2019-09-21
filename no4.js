var angkaSebelum = -1;
var angkaSekarang = 1;

function fibo(kolom, baris) {
  for (let i = 1; i <= baris; i++) {
    for (let j = 1; j <= kolom; j++) {
      let output = angkaSebelum + angkaSekarang;
      document.write(output + ", ")
      angkaSebelum = angkaSekarang;
      angkaSekarang = output;
    }
    document.write('<br/>');
  }
}

fibo(4, 3); 
