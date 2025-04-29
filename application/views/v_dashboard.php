<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kasir</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="kumpulan  font-mono  bg-red-300 p-4 flex">
        <h1 class="judul text-left text-3xl "><?php echo $judul?></h1>
        <div class="navbar">
            <ul class="anchor flex p-2">
                <li class="m-2"><a href="">Beranda</a></li>
                <li class="m-2"><a href="">Barang</a></li>
                <li class="m-2"><a href="">Kasir</a></li>
            </ul>
        </div>
    </div>
    <hr>
    <footer class="text-center bagroun">
        <?php echo $footer ?>
    </footer>
</body>
</html>