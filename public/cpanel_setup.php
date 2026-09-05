<?php
/**
 * cPanel Setup & Maintenance Helper for Laravel
 * Gunakan file ini melalui browser jika cPanel hosting Anda tidak memiliki akses SSH / Terminal.
 * 
 * Akses: https://domain-anda.com/cpanel_setup.php?token=PksOi2026Setup&action=status
 */

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

$secretToken = env('CPANEL_SETUP_TOKEN', 'PksOi2026Setup');
$isAllowedInProd = env('ENABLE_CPANEL_SETUP', true);

if (!isset($_GET['token']) || empty($_GET['token']) || !hash_equals($secretToken, (string)$_GET['token'])) {
    http_response_code(403);
    echo '<h3 style="color:red;font-family:sans-serif;text-align:center;margin-top:50px;">403 Forbidden: Token Akses Tidak Valid!</h3>';
    exit;
}

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

$action = $_GET['action'] ?? 'status';

function runArtisan($kernel, $command, $params = []) {
    ob_start();
    try {
        $kernel->call($command, $params);
        $output = $kernel->output();
    } catch (\Throwable $e) {
        $output = "Error: " . $e->getMessage();
    }
    ob_end_clean();
    return $output;
}

$results = [];

switch ($action) {
    case 'storage_link':
        $results['storage:link'] = runArtisan($kernel, 'storage:link');
        break;

    case 'optimize':
        $results['config:cache'] = runArtisan($kernel, 'config:cache');
        $results['route:cache'] = runArtisan($kernel, 'route:cache');
        $results['view:cache'] = runArtisan($kernel, 'view:cache');
        break;

    case 'clear_cache':
        $results['cache:clear'] = runArtisan($kernel, 'cache:clear');
        $results['config:clear'] = runArtisan($kernel, 'config:clear');
        $results['route:clear'] = runArtisan($kernel, 'route:clear');
        $results['view:clear'] = runArtisan($kernel, 'view:clear');
        break;

    case 'deploy_sync':
        $currentDir = __DIR__;
        $parentDir = dirname($currentDir);
        $publicHtml = dirname($parentDir) . '/public_html';
        $synced = 0;
        if (is_dir($publicHtml) && realpath($currentDir) !== realpath($publicHtml)) {
            $iterator = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($currentDir, RecursiveDirectoryIterator::SKIP_DOTS),
                RecursiveIteratorIterator::SELF_FIRST
            );
            foreach ($iterator as $item) {
                $subPath = $iterator->getSubPathName();
                $target = $publicHtml . '/' . $subPath;
                if ($item->isDir()) {
                    if (!is_dir($target)) @mkdir($target, 0755, true);
                } else {
                    @copy($item->getPathname(), $target);
                    $synced++;
                }
            }
            $results['Asset Sync'] = "Berhasil menyinkronkan {$synced} file aset dari public/ ke public_html/";
        } else {
            $results['Asset Sync'] = "Aplikasi berjalan langsung pada web root ({$currentDir}). Tidak perlu copy aset.";
        }
        $results['storage:link'] = runArtisan($kernel, 'storage:link');
        $results['cache:clear'] = runArtisan($kernel, 'optimize:clear');
        $results['config:cache'] = runArtisan($kernel, 'config:cache');
        $results['route:cache'] = runArtisan($kernel, 'route:cache');
        $results['view:cache'] = runArtisan($kernel, 'view:cache');
        break;

    case 'migrate':
        $results['migrate'] = runArtisan($kernel, 'migrate', ['--force' => true]);
        break;

    case 'status':
    default:
        $results['PHP Version'] = phpversion();
        $results['Laravel Version'] = $app->version();
        $results['Environment'] = app()->environment();
        $results['Database Connected'] = 'Checking...';
        try {
            \Illuminate\Support\Facades\DB::connection()->getPdo();
            $results['Database Connected'] = 'SUKSES (' . \Illuminate\Support\Facades\DB::connection()->getDatabaseName() . ')';
        } catch (\Throwable $e) {
            $results['Database Connected'] = 'GAGAL: ' . $e->getMessage();
        }
        $results['GD WebP Support'] = function_exists('imagewebp') ? 'AKTIF (Siap konversi WebP)' : 'NON-AKTIF';
        break;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cPanel Helper - DPD PKS Ogan Ilir</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: #f3f4f6; padding: 2rem; color: #1f2937; }
        .card { max-width: 700px; margin: 0 auto; background: white; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); padding: 2rem; }
        h1 { font-size: 1.4rem; color: #f97316; margin-bottom: 1.5rem; border-bottom: 2px solid #fed7aa; padding-bottom: 0.5rem; }
        .nav-links { display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 1.5rem; }
        .nav-links a { background: #ea580c; color: white; padding: 8px 14px; text-decoration: none; border-radius: 6px; font-size: 0.85rem; font-weight: 600; }
        .nav-links a:hover { background: #c2410c; }
        .nav-links a.gray { background: #4b5563; }
        .result-box { background: #111827; color: #10b981; padding: 1.2rem; border-radius: 8px; font-family: monospace; font-size: 0.9rem; overflow-x: auto; }
        .warning { margin-top: 1.5rem; font-size: 0.8rem; color: #ef4444; background: #fee2e2; padding: 0.8rem; border-radius: 6px; }
    </style>
</head>
<body>
    <div class="card">
        <h1>🛠️ Helper Deployment cPanel - DPD PKS Ogan Ilir</h1>
        <div class="nav-links">
            <a href="?token=<?= $secretToken ?>&action=status">Cek Status Sistem</a>
            <a href="?token=<?= $secretToken ?>&action=deploy_sync" style="background:#16a34a;">⚡ Sinkron & Deploy Manual</a>
            <a href="?token=<?= $secretToken ?>&action=storage_link">Buat Storage Link</a>
            <a href="?token=<?= $secretToken ?>&action=optimize">Optimasi Cache (Produksi)</a>
            <a href="?token=<?= $secretToken ?>&action=clear_cache" class="gray">Bersihkan Cache</a>
            <a href="?token=<?= $secretToken ?>&action=migrate" class="gray">Jalankan Migrasi DB</a>
        </div>

        <div class="result-box">
            <?php foreach ($results as $k => $v): ?>
                <strong>[<?= htmlspecialchars($k) ?>]</strong><br>
                <?= nl2br(htmlspecialchars(trim($v))) ?><br><br>
            <?php endforeach; ?>
        </div>

        <div class="warning">
            ⚠️ <strong>Keamanan:</strong> Setelah website Anda berjalan normal di cPanel, disarankan untuk menghapus atau mengganti nama file <code>public/cpanel_setup.php</code> untuk menjaga keamanan instalasi.
        </div>
    </div>
</body>
</html>
