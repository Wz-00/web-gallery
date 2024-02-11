<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "agile");

// Fungsi untuk menjalankan query
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Panggil fungsi untuk menampilkan galeri
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

tampilkanGaleri($currentPage);

// Fungsi untuk memasukkan upload gambar ke dalam tabel "post"
function tambahPost($gambar, $descript, $posted_date)
{
    global $conn;
    $gambar = mysqli_real_escape_string($conn, $gambar);
    $descript = mysqli_real_escape_string($conn, $descript);
    $posted_date = mysqli_real_escape_string($conn, $posted_date);

    $query = "INSERT INTO post (gambar, descript, posted_date) VALUES ('$gambar', '$descript', '$posted_date')";
    return mysqli_query($conn, $query);
}


// Fungsi untuk menampilkan galeri gambar
function tampilkanGaleri($halaman = 1, $gambarPerHalaman = 9)
{
    global $conn;

    // Hitung offset untuk pagination
    $offset = ($halaman - 1) * $gambarPerHalaman;

    // Query untuk mengambil data gambar dari tabel post (misalnya, field 'gambar' menyimpan nama gambar)
    $query = "SELECT gambar FROM post LIMIT $offset, $gambarPerHalaman";
    $result = query($query);

    // Tampilkan galeri gambar
    echo '<div class="gallery">';
    foreach ($result as $row) {
        echo '<img src="uploads/' . $row['gambar'] . '" alt="Karya Seni">';
    }
    echo '</div>';

    // Tampilkan navigasi halaman jika perlu
    $totalGambar = count(query("SELECT gambar FROM post"));
    $totalHalaman = ceil($totalGambar / $gambarPerHalaman);

    echo '<div class="pagination">';
    for ($i = 1; $i <= $totalHalaman; $i++) {
        echo '<a href="?page=' . $i . '">' . $i . '</a>';
    }
    echo '</div>';
}

function tampilkanGaleriDenganKolom($jumlahKolom) {
    global $conn;

    // Query untuk mengambil semua data gambar dari database
    $query = "SELECT * FROM post";
    $result = mysqli_query($conn, $query);

    // Periksa apakah ada hasil yang dikembalikan dari query
    if (mysqli_num_rows($result) > 0) {
        // Tampilkan gambar-gambar dalam kolom-kolom
        $counter = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            // Jika counter mencapai jumlah kolom, tutup baris dan mulai baris baru
            if ($counter % $jumlahKolom == 0) {
                echo '<div class="image-container">';
            }

            // Tampilkan gambar
            echo '<img src="' . $row['gambar'] . '" alt="' . $row['descript'] . '">';

            // Jika counter mencapai jumlah kolom - 1, tutup baris
            if ($counter % $jumlahKolom == $jumlahKolom - 1) {
                echo '</div>'; // Tutup image-container
            }

            $counter++;
        }

        // Jika masih ada gambar yang belum ditutup, tutup baris terakhir
        if ($counter % $jumlahKolom != 0) {
            echo '</div>'; // Tutup image-container
        }
    } else {
        echo "Tidak ada gambar yang ditemukan.";
    }

    // Tutup koneksi database
    mysqli_close($conn);
}
function tampilkanPagination($totalPages, $currentPage) {
    echo '<div class="pagination">';
    // Tautan ke halaman sebelumnya
    if ($currentPage > 1) {
        echo '<a href="?page='.($currentPage - 1).'">&laquo;</a>';
    } else {
        echo '<a href="#">&laquo;</a>';
    }
    // Tautan ke setiap halaman
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $currentPage) {
            echo '<a href="#" class="active">'.$i.'</a>';
        } else {
            echo '<a href="?page='.$i.'">'.$i.'</a>';
        }
    }
    // Tautan ke halaman berikutnya
    if ($currentPage < $totalPages) {
        echo '<a href="?page='.($currentPage + 1).'">&raquo;</a>';
    } else {
        echo '<a href="#">&raquo;</a>';
    }
    echo '</div>';
}

// Gunakan fungsi ini di dalam tampilan Anda dengan parameter $totalPages dan $currentPage yang sesuai



// Fungsi untuk menangani upload gambar
function handleUpload()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $gambarName = $_FILES["gambar"]["name"];
        $descript = $_POST["descript"];
        $posted_date = date("Y-m-d H:i:s");

        // Tentukan direktori tempat gambar akan disimpan
        $uploadDir = "uploads/";
        $targetFile = $uploadDir . basename($gambarName);

        // Pindahkan gambar yang diunggah ke direktori tujuan
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile)) {
            // Jika berhasil diupload, tambahkan informasi gambar ke dalam database
            if (tambahPost($gambarName, $descript, $posted_date, $targetFile)) {
                echo "Upload berhasil.";
            } else {
                echo "Terjadi kesalahan saat memasukkan data gambar ke database.";
            }
        } else {
            echo "Terjadi kesalahan saat mengunggah gambar.";
        }
    }
}

?>
