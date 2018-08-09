# Array
    =>Array pada PHP lebih bebas, tidak bergantung pada tipe data apakah dia string, char ataupun int, jadi array pada php layaknya sebuah variabel yang menyimpan sekumpulan data.

    =>Array PHP
    //Deklarasi Kosong
    $arr = [];
    $arr = array();

    //Mengisi Array
    $arr = [1, 2, 3];
    $arr = array(1, 2, 3);

    //mengisi array satu persatu
    $arr[0] = 4;

    //Menampilkan Array
    // satu persatu
    echo $arr[1]. $arr[2]. $arr[0];
    // menampilkan lebih dari satu data
    // gunakan for, foreach, while

    // menghapus data array
    unset($arr[0]);

    //menambah array
    $arr[3] = "hello";
    $arr[] = "hello"; // menambahkan elemen terakhir.

    // jenis array
    // array asosiatif
    // array multidimensi

    // functions array [http://php.net/manual/en/book.array.php]
        // search in array
            in_array // returning boolean
            array_search // returning the key of value if true otherwise false 
        
        // sorting in array
            sort
            rsort
            asort
            arsort
            ksort
            krsort
        array_keys
        array_values
        array_merge
        count


# Object Oriented Style
    
    // mysqli
    $mysqli = new mysqli(DB_ROOT, DB_USER, DB_PASS, DB_NAME, DB_PORT, DB_SOCKET);

    $mysqli->connect_errno
    $mysqli->connect_error
    $mysqli->host_info
    $mysqli->query(QUERY)

    $result = $mysqli_query(QUERY)
    $result->num_rows
    $result->data_seek
    $result->fetch_assoc();

    $row = $result->fetch_assoc();
    $mysqli->real_query(QUERY);
    $res = $mysqli->use_result();
    $row = $res->fetch_assoc();

    $mysqli = mysqli_init();
    $mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
    $mysqli->real_connect();

# Procedural
    mysqli_query()
    mysqli_real_query()
    mysqli_multi_query()
    .:. functions are used to execute non-prepared statements

    mysqli_store_result()

    mysqli_connect()
    mysqli_fetch_array()
    mysqli_fetch_row()
    mysqli_fetch_object()

# Security
    mysqli_real_escape_string()

#enkripsi<=>dekripsi

#hashing
    password_hash() => password_verify()
    crypt()
    md5()
    hash()
    sha1()
    bcrypt()

#encode<=>decode
    base64_encode()

# MAGIC METHOD
    __construct
    __call
    __get
    __toString

# MAGIC CONSTANTS PHP
    __LINE__
    __FILE__
    __DIR__
    __FUNCTION__
    __CLASS__
    __TRAIT__
    __METHOD__
    __NAMESPACE__
    ClassName::class

#checking
    filter_input()

#manipulasi direktori php
    mkdir()
    membuat direktori
    scandir()
    melihat isi direktori
    rmdir()
    menghapus direktori
    rename()
    mengubah nama direktori

#FILE SYSTEM [http://uk1.php.net/manual/en/book.filesystem.php]
    json_encode
    json_decode
    file_get_contents
    file_put_contents
    file_exists
    is_writeable

# [Output Control Functions](http://php.net/manual/en/ref.outcontrol.php)
    flush()
    ob_start()  ob_flush()
    // menyimpan output sebelum ditampilkan di halaman tertentu.
    // jadi data tersebut tersimpan dalam output buffer sehingga ketika user mereload kembali halaman website browser tidak perlu lagi memanggil ulang data yang sudah tersimpan
    ob_end_flush
    // mengosongkan output buffering
    ob_get_contents()
    // mengambil konten yang terdapat pada output buffer
    ob_clean
    // menghapus output buffer
    ob_end_clean
    // menghapus output buffer dan menutup output buffer

# Object Oriented Programming
    Basic OOP Concepts
    1. Object and Classes
    2. Encapsulation
    3. Inheritance
    4. Polymorphism
    5. Method Overloading / Overriding
    6. Abstraction
    7. Interface/Abstract Class/Pure Virtual Functions
    8. Virtual Method Table
    9. Using autoloading classes