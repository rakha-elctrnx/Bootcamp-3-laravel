// Module
// 1. Local Module
//  Module yang dibuat oleh sendiri
// 2. Core File
//  Module Bawaan node js
// 3. Third-party Module
//  Module yang dibuat oleh pihak ketiga


// Local Module
// const { lingkaran, pi } = require('./lingkaran');

// console.log(pi);
// console.log(lingkaran(7));

// Core Module
// const fs = require('fs');

// const data = 'ini adalah file yang kita buat'
// fs.writeFile('coba.txt', data, (err) => {
//     if (err) console.log("terjadi kesalahan di", err);

//     console.log("File berhasil dibuat");
// })

import chalk from 'chalk';

console.log(chalk.blue('Hello world!'));
