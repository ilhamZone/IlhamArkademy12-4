function count_handshake(orang) {
  let salam = 0;
  for (let i = orang - 1; i >= 1; i--) {
    salam += i;
  }
  return salam;
}

console.log(count_handshake(3));
console.log(count_handshake(6));