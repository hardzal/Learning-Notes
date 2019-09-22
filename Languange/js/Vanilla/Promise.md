# Belajar Promise
- sebuah promise seperti artinya adalah sebuah janji yang outputnya belum bisa kita ketahui kapan keluarnya, promise ditujukan untuk menangani asynchrounous.

- nilai pengembalian dalam promise di berikan dalam block .then

- promise menggunakan dua callback yang diregistrasi, hasil kedua callback yang diregistrasi tersebut dua kondisi dimana kondisi tersebut adalah berhasil atau gagal.

- Dalam contoh dibawah kita menggunakan dua callback resolve() jika berhasil sedangkan jika gagal maka reject()

``javascript
let promise = new Promise(function(resolve, reject) {
	let isSuccess  = true; 
	setTimeout(function() {
		if(isSuccess) {
			resolve('sukses!');
		} else {
			reject(Error("Belum sukses!, semangat terus!"));
		}
	}, 2000); // 2 s
});
// seperti sebuah if then, code diatas sebuah permisalan
promise.then(function(isi) {
	console.log(isi);
})
.catch(function(isi) {
	console.log(isi);
});
``

``javascript
let promise1 = Promise.resolve('Berhasil');
let promise2 = promise1.then(function(result) {
	console.log(result);
	return result + ", Semangat terus ya!";
});

promise2.then(function(result) {
	console.log(result);
});
``

- nilai pengembalian pada block .then pertama pada variabel promise2 di outputkan kembali pada .then kedua.

``javascript
Promise.resolve("berhasil ya")
	.then(function(result) {
    	console.log(result);
    	return result+"INDO";
})
.then(function(result) {
	console.log(result);
});
``

``javascript
let promise = Promise.resolve([1, 2, 3,4 ]);
promise.then(function(result) {
    console.log(result); // [1, 2, 3, 4]
	return result.map(x => x*x); 
}).then(function(result0) {
	console.log(result0); [1, 4, 9, 16]
	return result0.filter(x => x > 10); 
}).then(function(result1) {
	console.log(result1);
	return  result1.map(x => x*x).filter(x => x > 20);
}).then(function(result2) {
	console.log(result2);
	return result2.toString() + ", hmmm";
}).then(function(result3) {
	console.log(result3);
}).catch(function(error) {
	console.log(error);
});
``


- Promise.all menerima parameter array yang berisi kumpulan variabel array, di mana jika seluruh promise tersebut menunjukkan output berhasil maka output berhasil yaitu promise resolve seluruhnya akan dijalankan jika tidak berhasil maka akan menjalankan promise reject pertama.

``javascript
let promise5 = Promise.resolve("Berhasil yah ini");

let promise6 = Promise.resolve("Apa ini juga berhasil?");

let promise7 = Promise.reject("Wah tidak janji ya");


Promise.all([promise5, promise6, promise7])
	
	.then(function(result) {
		
		console.log(result);
	
	})
	
	.catch(function(error) {
		
		console.log(error);

	});
``

``javascript
let promise18 = Promise.resolve("Yes, ..");

let promise19 = Promise.resolve("... Apa masih bisa ya..?");

let promise20 = Promise.resolve("Selamat, Anda berhasil dipercobaan ini!");


Promise.all([promise18, promise19, promise20])
	
	.then(function(result){ 
		
		console.log(result);
	
	})
	
	.catch(function(error) {
		
		console.log(error);
	
	});
``

- Promise.race() merupakan promise yang menerima parameter array yang menjalankan promise yang memiliki output paling cepat, perhatikan contoh code di bawah.

``javascript
let promize = new Promise(function(resolve, reject) {
 
	setTimeout(function() {
       
		 resolve("finished in two seconds");
    
	}, 2000);

	});



var promize1 = new Promise(function(resolve, reject) {

	setTimeout(function() {
		
		resolve("selesai dalam 3 detik");
    
	}, 3000);
});

// Mana yang paling cepat?
	

Promise.race([promize1, promize])
	
	.then(function(result) {
		
		console.log(result);
	
	})
	
	.catch(function(error) {
		
		console.log(error);
	
	});
``
# FETCH
- GET 
 -- REQUEST: Permintaan dari Client kepada Server
 -- RESPONSE: Jawaban dari  Permintaan Request dari server, di kirim dari server ke client.

- AJAX CALL dengan Fetch API
 -- Fetch adalah API baru menggantikan XHR
 -- Fetch API berbasis Obyek Promise

- Fungsi Fetch
 -- Metode fetch() API merupakan interface untuk membuat request ke server melalui jaringan
 -- Fungsi fetch() ditargetkan sebagai pengganti API XMLHttpRequest
 -- Metode fetch() didefinisikan pada obyek window, request dilakukan dari browser
 -- Metode ini memberikan Promise sebagai nilai balik (return)

- Syntx Fetch 

``javascript
fetch('./myfile.txt');
``
 -- Fetch memberikan nilai balik berupa obyek promise
 -- secara asynchronous fetch mengirim request
 -- obyek promise memberikan nilai .then bila positif, dan error (catch) bila gagal.


Resource: 

- https://serviceworke.rs/
- https://jakearchibald.com/2014/offline-cookbook/
- https://developers.google.com/web/fundamentals/instant-and-offline/offline-cookbook/?hl=id
- https://medium.com/@hellonehha/pwa-series-service-workers-cookbook-part-1-c89fa0d547a7
- https://medium.com/@hafidmukhlasin/membangun-aplikasi-rss-reader-pwa-menggunakan-vuejs-42d1f3a3fdc0


