<div class="gallery" style="text-align: center;">
            <?php
            require 'function.php';
            
            // Panggil fungsi untuk menangani upload gambar
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                handleUpload();
            }

            // Panggil fungsi untuk menampilkan galeri dengan 4 gambar per baris
            tampilkanGaleriDenganKolom(4);
            ?>
            <!-- Form untuk upload gambar -->
            <!-- <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <input type="file" name="gambar" accept="image/*">
                <textarea name="descript" placeholder="descript"></textarea>
                <input type="submit" value="Upload">
            </form> -->
            
        </div>
        
</div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        // event will be executed when the toggle-button is clicked
        document.getElementById("button-toggle").addEventListener("click", () => {

        // when the button-toggle is clicked, it will add/remove the active-sidebar class
        document.getElementById("sidebar").classList.toggle("active-sidebar");

        // when the button-toggle is clicked, it will add/remove the active-main-content class
        document.getElementById("main-content").classList.toggle("active-main-content");
        });
    </script>
</body>
</html>
