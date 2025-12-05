<?php
header('Content-Type: application/json');

// قراءة البيانات المرسلة عبر POST
$data = file_get_contents('php://input');

if(!$data) {
    echo json_encode(['status' => 'error', 'message' => 'لا توجد بيانات']);
    exit;
}

// كتابة البيانات في ملف JSON
if(file_put_contents('data.json', $data)) {
    echo json_encode(['status' => 'success', 'message' => 'تم الحفظ بنجاح ✅']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'فشل الحفظ']);
}
?>
