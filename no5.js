function buyNoodle(tanggal, uang) {
  var mie = 2500;
  var dapat = 0;
  var count = uang / mie;

  for (let i = 1; i <= count; i++) {
    dapat++;

    if (tanggal % 2 == 0 && i == 4) {
      dapat += 1;
    } else if (tanggal % 2 == 1 && i == 3) {
   
    }
  }
  return dapat;
}

console.log(buyNoodle(16, 40000));

/* 
  SORRY ADMIN NO 5 BELUM CLEAR KARENA WAKTU TIDAK KEBURU SEMOGA NO YANG LAIN YANG TELAH SELESAI
  MASIH BISA JADI PERTIMBANGAN UNTUK SAYA LOLOS TAHAP BERIKUTNYA
*/