const { createCipheriv, randomBytes, createDecipheriv } = require('crypto');

/// Cipher

// const message = 'i like turtles';
const key = "0".repeat(32);
// console.log("secret:" + key);
// const key = "498493123123123";
// const iv = randomBytes(16);
const iv = "0".repeat(16);
console.log(iv);

const cipher = createCipheriv('aes256', key, iv);

/// Encrypt

// const encryptedMessage = cipher.update(message, 'utf8', 'hex') + cipher.final('hex');
const encryptedMessage = "UZ/BhDGRQErwVuDmZINhQWYJJL2cNwFstG19Ji3q86g=";
console.log(`Encrypted: ${encryptedMessage}`);

/// Decrypt

const decipher = createDecipheriv('aes256', key, iv);
const decryptedMessage = decipher.update(encryptedMessage, 'hex', 'utf-8') + decipher.final('utf8');

console.log(`Deciphered: ${decryptedMessage.toString('utf-8')}`);