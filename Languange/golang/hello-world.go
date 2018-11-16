// 3 November 2018
package main // file dengan package main akan pertama kali dieksekusi
import "fmt"

// mengimport package lain

func main() {
	// hello world
	// fmt.Println("Hello, World!", "Can you learn fast than anyone?!", "Yes, I can!!")

	// manifest typing
	var firstName string = "Kanna"
	var lastName string = "Hashimoto"
	// mendeklarasikan variabel baru
	// hanya bisa dilakukan di dalam fungsi
	// type inference
	do := "Love You"

	fmt.Printf("Hello, I %s %s %s <3\n", do, firstName, lastName)

	var hello, world string = "Hello", "World!"
	skill, hobby, learn := "Programming", "Anime, Manga", "Anything"
	fmt.Println(hello, world)
	fmt.Println("My Skill is ", skill, ", my hobby is ", hobby, " I'm learn ", learn)

	// semua variabel di golang wajib digunakan jika tidak akan menghasilkan error
	// untuk menyimpan suatu nilai yang tidak gunakan bisa dengan menggunakan variabel "underscore"
	_ = "Hello aku tidak ada"
	name := new(string) // pointer
	fmt.Println(name)   //
	fmt.Println(*name)
}
