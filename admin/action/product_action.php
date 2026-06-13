<link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 612 792' fill='white'><polyline points='241.71 327.03 329.52 275.37 492.73 370.17 394.52 420.69 241.71 327.03'/><polygon points='131.82 313.97 230.03 263.44 232.3 373.58 131.82 313.97'/><polygon points='232.3 373.58 131.82 421.83 131.82 313.97 232.3 373.58'/><polyline points='232.31 373.55 232.31 373.55 351.61 448.52 246.02 511.92 131.82 421.83'/><polygon points='394.52 420.69 492.73 370.17 495 480.3 394.52 420.69'/><polygon points='495 480.3 394.52 528.56 394.52 420.69 495 480.3'/></svg>">
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once __DIR__ . '/../../includes/auth.php';
checkAdmin();
require_once __DIR__ . '/../../config/database.php';

// ---------- DELETE ----------
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    // Get image name before deleting record
    $result = mysqli_query($link, "SELECT image FROM products WHERE id = $id");
    if ($row = mysqli_fetch_assoc($result)) {
        if (!empty($row['image']) && file_exists(__DIR__ . '/../../uploads/products/' . $row['image'])) {
            unlink(__DIR__ . '/../../uploads/products/' . $row['image']);
        }
    }
    mysqli_query($link, "DELETE FROM products WHERE id = $id");
    echo "<script>window.location.href='../products.php';</script>";
    exit();
}

// ---------- COMMON IMAGE VALIDATION FUNCTION ----------
function validateImage($file) {
    $target_dir = __DIR__ . '/../../uploads/products/';
    $image_name = basename($file["name"]);
    $target_file = $target_dir . $image_name;
    $uploadOk = 1;

    // 1. Check if file is a real image
    $check = getimagesize($file["tmp_name"]);
    if ($check === false) {
        echo "<p style='color:red;'><b>Error: The selected file is not a valid image.</b></p>";
        $uploadOk = 0;
    }

    // 2. Check if file already exists (optional – you can also generate a unique name instead)
    if ($uploadOk && file_exists($target_file)) {
        echo "<p style='color:red;'><b>Error: A file with the same name already exists on the server.</b></p>";
        $uploadOk = 0;
    }

    // 3. Limit file size (5000 KB)
    if ($uploadOk && $file["size"] > 5000 * 1024) {
        echo "<p style='color:red;'><b>Error: File size exceeds 5000 KB.</b></p>";
        $uploadOk = 0;
    }

    // 4. Allow only specific extensions
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];
    if ($uploadOk && !in_array($imageFileType, $allowed)) {
        echo "<p style='color:red;'><b>Error: Only JPG, JPEG, PNG, and GIF files are allowed.</b></p>";
        $uploadOk = 0;
    }

    return $uploadOk ? $image_name : false;
}

// ---------- ADD ----------
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'add') {
    $name        = mysqli_real_escape_string($link, $_POST['name']);
    $category    = mysqli_real_escape_string($link, $_POST['category']);
    $price       = (float)$_POST['price'];
    $stock       = (int)$_POST['stock'];
    $emoji       = mysqli_real_escape_string($link, $_POST['emoji'] ?? '📦');
    $rating      = (float)($_POST['rating'] ?? 0);
    $reviews     = (int)($_POST['reviews'] ?? 0);
    $description = mysqli_real_escape_string($link, $_POST['description'] ?? '');
    $featured = isset($_POST['featured']) ? 1 : 0;

    $imagePath = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $validated_name = validateImage($_FILES['image']);
        if ($validated_name === false) {
            exit();  // validation error already printed
        }
        // Move the file
        if (move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../../uploads/products/' . $validated_name)) {
            $imagePath = $validated_name;
        } else {
            echo "<p style='color:red;'><b>Error: Failed to upload the image.</b></p>";
            exit();
        }
    }

mysqli_query($link, "INSERT INTO products 
    (name, category, price, stock, emoji, rating, reviews, description, image, featured) 
    VALUES 
    ('$name', '$category', $price, $stock, '$emoji', $rating, $reviews, '$description', '$imagePath', $featured)");
    echo "<script>window.location.href='../products.php';</script>";
    exit();
}

// ---------- UPDATE ----------
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'update') {
    $id          = (int)$_POST['id'];
    $name        = mysqli_real_escape_string($link, $_POST['name']);
    $category    = mysqli_real_escape_string($link, $_POST['category']);
    $price       = (float)$_POST['price'];
    $stock       = (int)$_POST['stock'];
    $emoji       = mysqli_real_escape_string($link, $_POST['emoji'] ?? '📦');
    $rating      = (float)($_POST['rating'] ?? 0);
    $reviews     = (int)($_POST['reviews'] ?? 0);
    $description = mysqli_real_escape_string($link, $_POST['description'] ?? '');
    $featured = isset($_POST['featured']) ? 1 : 0;

    $imageSQL = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $validated_name = validateImage($_FILES['image']);
        if ($validated_name === false) {
            exit();
        }
        if (move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../../uploads/products/' . $validated_name)) {
            $imageSQL = ", image='$validated_name'";
        } else {
            echo "<p style='color:red;'><b>Error: Failed to upload the image.</b></p>";
            exit();
        }
    }

mysqli_query($link, "UPDATE products SET 
    name='$name', category='$category', price=$price, stock=$stock, 
    emoji='$emoji', rating=$rating, reviews=$reviews, description='$description',
    featured = $featured
    $imageSQL
    WHERE id=$id");
    
    echo "<script>window.location.href='../products.php';</script>";
    exit();
}

// Fallback
echo "<script>window.location.href='../products.php';</script>";
exit();