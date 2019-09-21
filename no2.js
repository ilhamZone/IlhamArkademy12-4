/* 
Format username : merupakan kombinasi dari huruf kecil
dengan panjang 5-9 karakter. Username tidak boleh terdapat huruf
besar/angka/karakter special.
*/
function is_username_valid(user) {
  let userCheck = /^[a-z]{5,9}$/;
  if (userCheck.test(user)) {
    return true;
  }
  return false;  
}

/* 
Format password : merupakan kombinasi dari huruf kecil, huruf besar minimal satu karakter, 
angka minimal satu karakter,dan karakter spesial minimal satu karakter dengan panjang password 
harus tepat 10 karakter tidak boleh kurang atau lebih.
*/
function is_password_valid(pass) {
  let passCheck = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W).{10}$/;
  if (passCheck.test(pass)) {
    return true;
  }
  return false;
}

console.log(is_username_valid('@wakwaw')); // Invalid
console.log(is_username_valid('poEtri')); // Invalid
console.log(is_username_valid('tiara')); // Valid

console.log(is_password_valid('p@ssW0rd99')) // Valid
console.log(is_password_valid('p4s$C0d3YourFuture!#')) // Invalid