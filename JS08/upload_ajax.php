<?php
if (isset($_FILES['files'])) {
    $errors = array();
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    $maxsize = 2 * 1024 * 1024; // 2MB
    
    $total_files = count($_FILES['files']['name']);
    
    for ($i = 0; $i < $total_files; $i++) {
        $file_name = $_FILES['files']['name'][$i];
        $file_size = $_FILES['files']['size'][$i];
        $file_tmp = $_FILES['files']['tmp_name'][$i];
        $file_type = $_FILES['files']['type'][$i];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
        // Validasi ekstensi file
        if (!in_array($file_ext, $allowed_extensions)) {
            $errors[] = "$file_name memiliki ekstensi tidak diizinkan.";
            continue;
        }

        // Validasi ukuran file (maksimal 2MB)
        if ($file_size > $maxsize) {
            $errors[] = "$file_name melebihi ukuran maksimal 2MB.";
            continue;
        }

        // Pindahkan file jika tidak ada kesalahan
        if (empty($errors)) {
            if (move_uploaded_file($file_tmp, "documents/" . $file_name)) {
                echo "File $file_name berhasil diunggah.<br>";
            } else {
                $errors[] = "Gagal mengunggah file $file_name.";
            }
        }
    }

    // Jika ada error, tampilkan semua error
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
} else {
    echo "Tidak ada file yang diunggah.";
}
?>
