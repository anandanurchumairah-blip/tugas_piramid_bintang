<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generator Piramida Bintang PHP</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            text-align: center;
        }
        h2 { color: #2c3e50; }
        .button-container {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 8px;
            margin: 20px auto;
            max-width: 400px;
        }
        a.btn {
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            background-color: #3498db;
            color: white;
            border-radius: 6px;
            display: inline-block;
            transition: 0.2s;
        }
        a.btn:hover { background-color: #2980b9; }
        .results-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 20px;
            text-align: left;
        }
        .card {
            background: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .card h3 {
            margin-top: 0;
            font-size: 16px;
            color: #e74c3c;
            border-bottom: 2px solid #f1f1f1;
            padding-bottom: 8px;
        }
        pre {
            background: #272822;
            color: #f8f8f2;
            padding: 10px;
            border-radius: 5px;
            overflow-x: auto;
            font-family: monospace;
            font-size: 13px;
            line-height: 1.2;
        }
        #selected-info {
            font-weight: bold;
            color: #27ae60;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <h2>Generator Piramida Bintang (PHP)</h2>
    <p>Klik salah satu tombol angka 1 sampai 20 di bawah:</p>

    <!-- Tombol Input 1 sampai 20 -->
    <div class="button-container">
        <?php for ($i = 1; $i <= 20; $i++): ?>
            <a href="?n=<?= $i ?>" class="btn"><?= $i ?></a>
        <?php endfor; ?>
    </div>

    <?php
    // Ambil nilai 'n' dari URL, default ke 0 jika belum dipilih
    $n = isset($_GET['n']) ? (int)$_GET['n'] : 0;
    
    if ($n >= 1 && $n <= 20):
    ?>
        <div id="selected-info">Menampilkan pola untuk angka: <?= $n ?></div>

        <div class="results-grid">
            <!-- 1. Piramida ke Atas -->
            <div class="card">
                <h3>1. Piramida ke Atas</h3>
                <pre><?php
                    for ($i = 1; $i <= $n; $i++) {
                        echo str_repeat(" ", $n - $i) . str_repeat("*", 2 * $i - 1) . "\n";
                    }
                ?></pre>
            </div>

            <!-- 2. Piramida ke Bawah -->
            <div class="card">
                <h3>2. Piramida ke Bawah</h3>
                <pre><?php
                    for ($i = $n; $i >= 1; $i--) {
                        echo str_repeat(" ", $n - $i) . str_repeat("*", 2 * $i - 1) . "\n";
                    }
                ?></pre>
            </div>

            <!-- 3. Piramida ke Kanan -->
            <div class="card">
                <h3>3. Piramida ke Kanan</h3>
                <pre><?php
                    $kanan = [];
                    for ($i = 1; $i <= $n; $i++) $kanan[] = str_repeat("*", 2 * $i - 1);
                    for ($i = $n - 1; $i >= 1; $i--) $kanan[] = str_repeat("*", 2 * $i - 1);
                    echo implode("\n", $kanan);
                ?></pre>
            </div>

            <!-- 4. Piramida ke Kiri -->
            <div class="card">
                <h3>4. Piramida ke Kiri</h3>
                <pre><?php
                    $max_bintang = 2 * $n - 1;
                    $rows = [];
                    for ($i = 1; $i <= $n; $i++) $rows[] = $i;
                    for ($i = $n - 1; $i >= 1; $i--) $rows[] = $i;

                    foreach ($rows as $i) {
                        $bintang = str_repeat("*", 2 * $i - 1);
                        $spasi = str_repeat(" ", $max_bintang - strlen($bintang));
                        echo $spasi . $bintang . "\n";
                    }
                ?></pre>
            </div>
        </div>
    <?php else: ?>
        <div id="selected-info">Silakan klik salah satu angka di atas terlebih dahulu!</div>
    <?php endif; ?>

</body>
</html>