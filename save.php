<?php
header('Content-Type: application/json');
ini_set('display_errors', 1);
error_reporting(E_ALL);

$data = file_get_contents('php://input');
if (!$data) {
    echo json_encode(['status' => 'error', 'message' => 'لا توجد بيانات']);
    exit;
}

$filename = 'data.json';

// إذا الملف غير موجود، أنشئه
if (!file_exists($filename)) {
    if (!file_put_contents($filename, '[]')) {
        echo json_encode(['status' => 'error', 'message' => 'فشل إنشاء data.json']);
        exit;
    }
}

// تحقق أن الملف قابل للكتابة
if (!is_writable($filename)) {
    echo json_encode(['status' => 'error', 'message' => 'الملف data.json غير قابل للكتابة']);
    exit;
}

// حاول حفظ البيانات
if (file_put_contents($filename, $data)) {
    echo json_encode(['status' => 'success', 'message' => 'تم الحفظ بنجاح ✅']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'فشل الحفظ']);
}
?>
