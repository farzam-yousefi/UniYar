<?php


define("PENDING","در انتظار");
define("REVIEW","در حال بررسی");
define("DONE","برطرف شد");

define("IN_PROGRESS","پیش نویس");
define("COMPLETED","منتشر شده");


define("ASSOCIATE","کاردانی");
define("BACHELOR","کارشناسی");
define("MASTER","کارشناسی ارشد");
define("PHD","دکترا");
define("OTHER","سایر");

define("in_person","حضوری");
define("online","مجازی");
define("agreement","توافقی");


define("WEBSITE","وب سایت");
define("RESEARCH","تحقیقاتی-مقاله-پایان نامه");
define("DATABASE","پایگاه داده");
define("PROGRAMMING","برنامه نویسی");

define("PROJECT","انجام پروژه");
define("TEACH","تدریس خصوصی");
define("DEBUG","رفع اشکال");
define("CONSULT","مشاوره آموزشی");



define("type","نوع خدمت");
define("PROJECT_CATEGORY","نوع پروژه");
define("TEACHING_TYPE","نحوه برگزاری");

define('ALLOWED_TEACHING_TYPE', [
    'online',
    'in_person',
    'agreement'
]);

define('ALLOWED_SERVICES', [
    'PROJECT',
    'TEACH',
    'DEBUG',
    'CONSULT'
]);

define('ALLOWED_SERVICES_ITEMS', [
    'WEBSITE',
    'DATABASE',
    'PROGRAMMING',
    'RESEARCH'
]);

define('ALLOWED_CATEGORIES', [
    'WEBSITE',
    'DATABASE',
    'PROGRAMMING'
]);

define('ALLOWED_LEVELS', [
    'ASSOCIATE',
    'BACHELOR',
    'MASTER',
    'PHD',
    'OTHER'
]);

define('ALLOWED_STATUSES', [
    'IN_PROGRESS',
    'COMPLETED'
]);

?>