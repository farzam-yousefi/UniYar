<?php

class Helper
{
    function __construct()
    {

    }

    /* ======================
   PICTURES && FILES
    ====================== */
    public static function validatorFileOrImg($file, $subDir, $item = '', $itemName = '', $isRequired)
    {
        /*
    ==========================================
    بررسی اینکه فایل ارسال شده یا نه
    ==========================================
    */

        $noFile =
            !is_array($file) ||
            !isset($file['name']) ||
            !isset($file['error']) ||
            $file['error'] === UPLOAD_ERR_NO_FILE;


        /*
        ==========================================
        فایل اجباری
        ==========================================
        */

        if ($isRequired && $noFile) {

            return [
                'success' => false,

                'data' => [
                    'filename' => null
                ],

                'errors' => [
                    'file' => [
                        'آپلود فایل ' . $itemName . ' الزامی است.'
                    ]
                ]
            ];
        }


        /*
        ==========================================
        فایل اختیاری و ارسال نشده
        ==========================================
        */

        if ($noFile) {

            return [
                'success' => true,

                'data' => [
                    'filename' => null
                ],

                'errors' => []
            ];
        }


        /*
        ==========================================
        فایل ارسال شده
        ==========================================
        */

        $dir = "public/" . $subDir . "/";

        return self::uploadFile(
            $file,
            $dir,
            ['img', 'pdf', 'word', 'zip', 'rar', 'txt'],
            40
        );
    }

    public static function validatorImage($image, $subDir, $item = '', $itemName = '', $imgIsRequired)
    {
        /*
    ==========================================
    بررسی اینکه عکس ارسال شده یا نه
    ==========================================
    */

        $noFile =
            !is_array($image) ||
            !isset($image['name']) ||
            !isset($image['error']) ||
            $image['error'] === UPLOAD_ERR_NO_FILE;


        /*
        ==========================================
        عکس اجباری
        ==========================================
        */

        if ($imgIsRequired && $noFile) {

            return [
                'success' => false,

                'data' => [
                    'filename' => null
                ],

                'errors' => [
                    'file' => [
                        'آپلود تصویر ' . $itemName . ' الزامی است.'
                    ]
                ]
            ];
        }


        /*
        ==========================================
        عکس اختیاری و ارسال نشده
        ==========================================
        */

        if ($noFile) {

            return [
                'success' => true,

                'data' => [
                    'filename' => null
                ],

                'errors' => []
            ];
        }


        /*
        ==========================================
        عکس ارسال شده
        ==========================================
        */

        $dir = "public/images/" . $subDir . "/";
        return self::uploadFile($image, $dir, ['img'], 20);

    }


    public static function create_thumbnail($file, $pathToSave, $w = 300, $h = 300,
                                            $crop = false, $quality = 90)
    {

        if (!file_exists($file)) {
            return false;
        }


        $info = getimagesize($file);


        if (!$info) {
            return false;
        }


        $mime = $info['mime'];


        switch ($mime) {

            case 'image/jpeg':
                $src = imagecreatefromjpeg($file);
                break;


            case 'image/png':
                $src = imagecreatefrompng($file);
                break;


            case 'image/gif':
                $src = imagecreatefromgif($file);
                break;


            default:
                return false;
        }


        $width = $info[0];
        $height = $info[1];


        $ratio = $width / $height;


        if ($crop) {


            $targetRatio = $w / $h;


            if ($ratio > $targetRatio) {

                $newHeight = $height;

                $newWidth = $height * $targetRatio;


                $srcX = ($width - $newWidth) / 2;
                $srcY = 0;


            } else {


                $newWidth = $width;

                $newHeight = $width / $targetRatio;


                $srcX = 0;
                $srcY = ($height - $newHeight) / 2;

            }


        } else {


            if ($ratio > ($w / $h)) {


                $newWidth = $w;
                $newHeight = $w / $ratio;


            } else {


                $newHeight = $h;
                $newWidth = $h * $ratio;

            }


            $srcX = 0;
            $srcY = 0;
            $width = $width;
            $height = $height;

        }


        $dst = imagecreatetruecolor(
            $newWidth,
            $newHeight
        );


// حفظ شفافیت PNG

        if ($mime == 'image/png') {

            imagealphablending($dst, false);

            imagesavealpha($dst, true);

            $transparent = imagecolorallocatealpha(
                $dst,
                255,
                255,
                255,
                127
            );

            imagefilledrectangle(
                $dst,
                0,
                0,
                $newWidth,
                $newHeight,
                $transparent
            );

        }


        imagecopyresampled(
            $dst,
            $src,
            0,
            0,
            $srcX,
            $srcY,
            $newWidth,
            $newHeight,
            $crop ? $newWidth : $width,
            $crop ? $newHeight : $height
        );


        switch ($mime) {


            case 'image/jpeg':

                imagejpeg(
                    $dst,
                    $pathToSave,
                    $quality
                );

                break;


            case 'image/png':

                imagepng(
                    $dst,
                    $pathToSave,
                    9
                );

                break;


            case 'image/gif':

                imagegif(
                    $dst,
                    $pathToSave
                );

                break;

        }
        imagedestroy($src);

        imagedestroy($dst);

        return true;

    }

    public static function uploadFile($file, $dir, $allowFormat, $maxMeg = 20, $name = "")
    {
        $errors = [];
        $uploadOk = 1;


        /* =========================
           بررسی ساختار فایل
        ========================= */

        if (!isset($file['name']) || !isset($file['tmp_name']) || !isset($file['size'])
            || !isset($file['error'])) {
            $errors['file'][] ="ساختار فایل ارسالی نامعتبر است.";

            return [
                'success' => false,
                'data' => [
                    'filename' => null
                ],
                'errors' => $errors
            ];

        }


        /* =========================
           بررسی خطای Upload
        ========================= */

        if ($file['error'] !== UPLOAD_ERR_OK) {

            $errors['file'][] =
                "در آپلود فایل انتخابی خطایی رخ داده است.";

            return [
                'success' => false,
                'data'=> [
                    'filename' => null,
                ],
                'errors' => $errors
            ];
        }


        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileTmp = $file['tmp_name'];
        $fileType=$file['type'];


        /* =========================
           بررسی اینکه فایل واقعی است
        ========================= */

        if (!is_uploaded_file($fileTmp)) {

            $errors['file'][] =
               "فایل".$file['name']."آپلود شده معتبر نیست.";

            return [
                'success' => false,
                'data'=> [
                    'filename' => null,
                ],
                'errors' => $errors
            ];
        }


        /* =========================
           Extension
        ========================= */

        $ext = strtolower(
            pathinfo($fileName, PATHINFO_EXTENSION)
        );


        /* =========================
           بررسی Extension
        ========================= */

        if (!self::validateExtension($allowFormat, $ext)) {

            $uploadOk = 0;

            $errors['file'][] =
                'پسوند فایل '.$file['name']. 'نامناسب است';
        }


        /* =========================
           بررسی حجم
        ========================= */

        if ($fileSize > ($maxMeg * 1024 * 1024)) {

            $uploadOk = 0;

            $errors['file'][]=
                "حداکثر حجم فایل انتخابی {$maxMeg} مگابایت است";
        }


        /* =========================
           بررسی نوع واقعی فایل
        ========================= */

        if ($uploadOk) {

            $finfo = finfo_open(FILEINFO_MIME_TYPE);

            if ($finfo === false) {

                $uploadOk = 0;

                $errors['file'][] =
                    "امکان بررسی نوع فایل {$file['name']}وجود ندارد.";


            } else {

                $mime = finfo_file($finfo, $fileTmp);

                finfo_close($finfo);


                /*
                =========================
                IMAGE
                =========================
                */

                if (
                in_array(
                    $ext,
                    ['jpg', 'jpeg', 'png'],
                    true
                )
                ) {

                    if (!self::is_image($fileTmp)) {

                        $uploadOk = 0;

                        $errors['file'][] =
                            " فایل {$file['name']} یک تصویر معتبر نیست.";

                    }

                } /*
                =========================
                PDF
                =========================
                */

                elseif ($ext === 'pdf') {

                    if ($mime !== 'application/pdf') {

                        $uploadOk = 0;

                        $errors['file'][]=
                            "فایل PDF {$file['name']}معتبر نیست.";

                    }

                } /*
                =========================
                WORD
                =========================
                */

                elseif (
                in_array(
                    $ext,
                    ['doc', 'docx'],
                    true
                )
                ) {

                    $allowedWordMime = [
                        'application/msword',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                    ];

                    if (!in_array($mime, $allowedWordMime, true)) {

                        $uploadOk = 0;

                        $errors['file'][]=
                            "فایل WORD {$file['name']}معتبر نیست.";
                    }

                } /*
                =========================
                ZIP
                =========================
                */

                elseif ($ext === 'zip') {

                    if ($mime !== 'application/zip') {

                        $uploadOk = 0;

                        $errors['file'][] =
                            "فایل ZIP {$file['name']}معتبر نیست.";
                    }

                } /*
                =========================
                RAR
                =========================
                */

                elseif ($ext === 'rar') {

                    $allowedRarMime = [
                        'application/vnd.rar',
                        'application/x-rar',
                        'application/x-rar-compressed'
                    ];

                    if (!in_array($mime, $allowedRarMime, true)) {

                        $uploadOk = 0;

                        $errors['file'][] =
                            "فایل RAR {$file['name']}معتبر نیست.";
                    }

                }
            }
        }


        /* =========================
           ساخت نام فایل
        ========================= */

        if ($name === "") {

            $newName =
                time() .
                "_" .
                random_int(1, 1000000) .
                "." .
                $ext;

        } else {

            $newName = $name;
        }


        /* =========================
           ساخت Directory
        ========================= */

        if (!file_exists($dir)) {

            if (!mkdir($dir, 0755, true)) {

                $errors['file'][] =
                    'خطا در ساخت پوشه';

                return [
                    'success' => false,
                    'data'=> [
                        'filename' => null,
                    ],
                    'errors' => $errors
                ];
            }
        }


        /* =========================
           Upload
        ========================= */

        if (!empty($fileSize) && $uploadOk === 1) {

            $target = $dir . $newName;


            /*
            جلوگیری از overwrite
            */

            if (file_exists($target)) {

                $errors['file'][]=
                    "فایلی با نام{$file['name']}از قبل وجود دارد.";

                return [
                    'success' => false,
                    'data'=> [
                        'filename' => null,
                    ],
                    'errors' => $errors
                ];
            }


            if (move_uploaded_file($fileTmp, $target)) {

                return [
                    'success' => true,
                    'data'=>[
                        'filename' => $newName,
                        'originalName'=>$fileName,
                        'fileSize'=>$fileSize,
                        'fileType'=>$fileType,
                        'path'=>$target
                    ],

                    'errors' => null
                ];
            }


            $errors['file'][] =
                "ذخیره فایل  {$file['name']}با خطا مواجه شد.";
        }


        return [
            'success' => false,
            'data'=> [
                'filename' => null,
            ],
            'errors' => $errors
        ];
    }

//    public static function uploadFile($file, $dir, $allowFormat,$maxMeg=20,$name="")
//    {
//        $errors['picture'] = [];
//        $fileName = $file['name'];
//        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
//        $fileSize = $file['size'];
//        $fileTmp = $file['tmp_name'];
//        $uploadOk = 1;
//
//        if ($name==""){
//            $newName = time()."_".rand(1,1000000) . "." . strtolower($ext);
//        }else{
//            $newName = $name;
//        }
//
//
//            if (!file_exists($dir)) {
//
//                if (!mkdir($dir, 0777, true)) {
//                    $errors['dir']='خطا در ساخت پوشه';
//                    return [
//                        'success' => false,
//                        'filename' => null,
//                        'errors' => $errors
//                    ];
//
//                }
//
//            }
//
//
//        if (!self::validateExtension($allowFormat,$ext)) {
//            $uploadOk = 0;
//            $errors['picture']['ext']= 'پسوند فایل انتخابی نامناسب است';
//        }
//
//        if ($uploadOk && in_array('img', $allowFormat) && !self::is_image($fileTmp)) {
//            $uploadOk = 0;
//            $errors['picture']['format'] = 'فایل انتخاب شده یک تصویر معتبر نیست.';
//        }
//
//        if ($fileSize > ($maxMeg*1024*1024)) {
//            $uploadOk = 0;
//            $errors['picture']['size']= "حداکثر حجم فایل انتخابی {$maxMeg} مگابایت است";
//        }
//        if (!empty($fileSize)  && $uploadOk == 1) {
//            $target = $dir . $newName;
//            if (move_uploaded_file($fileTmp, $target)) {
//
//
//               // $err = 'آپلود فایل با موفقیت انجام شد';
//                return [
//                    'success' => true,
//                    'filename' => $newName,
//                    'errors' => null
//                ];
//            }
//
//        }
//
//        return [
//            'success' => false,
//            'filename' => null,
//            'errors' => $errors
//        ];
//
//    }
    public static function normalizeFiles($files)
    {
        $result = [];

        foreach ($files['name'] as $index => $name) {

            if ($files['error'][$index] === UPLOAD_ERR_NO_FILE) {
                continue;
            }

            $result[] = [
                'name' => $files['name'][$index],
                'full_path' => $files['full_path'][$index],
                'type' => $files['type'][$index],
                'tmp_name' => $files['tmp_name'][$index],
                'error' => $files['error'][$index],
                'size' => $files['size'][$index],
            ];
        }

        return $result;
    }

    public static function validateExtension($allowFormat, $ext)
    {
        $ext = strtolower($ext);

        foreach ($allowFormat as $format) {

            if ($format === 'img' && in_array($ext, ['jpg', 'jpeg', 'png'], true))
                return true;

            if ($format === 'pdf' && $ext === 'pdf')
                return true;

            if (
                $format === 'word' &&
                in_array($ext, ['doc', 'docx'], true)
            ) {
                return true;
            }

            if ($format === 'zip' && $ext === 'zip') {
                return true;
            }

            if ($format === 'rar' && $ext === 'rar') {
                return true;
            }

            if ($format === 'vid' && $ext === 'mp4') {
                return true;
            }

            if ($format == 'txt' && $ext === 'txt') {
                return true;
            }
        }

        return false;
    }

    //just:  jpg    ,jpeg    ,png
    public static function is_image($path)
    {
        $info = getimagesize($path);

        if (!$info) {
            return false;
        }

        return in_array(
            $info['mime'],
            [
                'image/jpeg',
                'image/png'
            ]
        );
    }

//WebP و AVIF ,....every type
    public static function is_image_everyType($path)
    {
        return getimagesize($path) !== false;
    }


    public static function checkImageDimension($file, $minWidth = 400, $minHeight = 300)
    {
        $info = getimagesize($file);

        if (!$info) {
            return false;
        }

        return (
            $info[0] >= $minWidth &&
            $info[1] >= $minHeight
        );
    }

    /* ======================
       CLEANING
      ===================== */

    public static function removeSpecialCharacter($string)
    {
        // تبدیل فاصله‌ها به خط تیره
        $string = preg_replace('/\s+/u', '-', trim($string));

        // حذف همه کاراکترها به جز حروف فارسی، انگلیسی، اعداد و خط تیره
        $string = preg_replace('/[^\p{L}\p{N}-]/u', '', $string);

        // حذف خط تیره‌های تکراری
        $string = preg_replace('/-+/u', '-', $string);

        // حذف خط تیره ابتدا و انتها
        return trim($string, '-');

    }

    public static function cleanInput($text)
    {
        $text = strip_tags($text);

        $text = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $text);

        return $text;
    }

    /**
     * Clean project technical description.
     * Preserves line breaks while removing HTML tags.
     */
    public static function cleanTechDescription($text)
    {
        // Remove HTML tags
        $text = strip_tags($text);

        // Normalize line endings
        $text = str_replace(["\r\n", "\r"], "\n", $text);

        // Remove invisible control characters except \n and \t
        $text = preg_replace('/[^\P{C}\n\t]/u', '', $text);

        // Trim each line
        $lines = array_map('trim', explode("\n", $text));

        // Remove empty lines at beginning/end
        $text = trim(implode("\n", $lines));

        return $text;
    }

    public static function sanitize($input)
    {
        if (is_array($input)) {

            foreach ($input as $key => $value) {
                $input[$key] = self::sanitize($value);
            }

            return $input;
        }

        return trim(self::cleanInput($input));
    }


    /* ======================
  JALALI/MILADI
====================== */

    public static function miladiDate($format = 'Y - m - d')
    {
        $date = date($format);
        return $date;
    }

    public static function jaliliDate($format = 'Y/n/j')
    {

        $date = jdate($format);
        return $date;
    }

    public static function jalaliDataTime($time = null)
    {
        $time = $time ?? time();

        return jdate("Y/m/d", $time);
    }

    public static function jaliliToMiladi($jalili, $format = '/')
    {
        // تبدیل اعداد فارسی/عربی به انگلیسی
        $jalili = self::convert2english($jalili);

        $jalili = explode($format, $jalili);

        if (count($jalili) !== 3) {
            return false;
        }

        $year = (int)$jalili[0];
        $month = (int)$jalili[1];
        $day = (int)$jalili[2];

        $date = jalali_to_gregorian($year, $month, $day);

        return sprintf(
            '%04d-%02d-%02d',
            $date[0],
            $date[1],
            $date[2]
        );
    }

    public static function MiladiTojalili($miladi, $separator = '-')
    {
        $parts = explode($separator, $miladi);

        $year = $parts[0];
        $month = $parts[1];
        $day = $parts[2];

        $date = gregorian_to_jalali($year, $month, $day);

        return sprintf(
            '%04d/%02d/%02d',
            $date[0],
            $date[1],
            $date[2]
        );
    }

//    public static function MiladiTojalili($miladi, $format = '/')
//    {
//
//        $miladi = explode('/', $miladi);
//        $year = $miladi[0];
//        $month = $miladi[1];
//        $day = $miladi[2];
//        $date = gregorian_to_jalali($year, $month, $day);
//        $date = implode($format, $date);
//        return $date;
//    }
//


    /* ======================
GENERAL
====================== */

    public static function convert2english($string)
    {
        $newNumbers = range(0, 9);
        // 1. Persian HTML decimal
        $persianDecimal = array('&#1776;', '&#1777;', '&#1778;', '&#1779;', '&#1780;', '&#1781;', '&#1782;', '&#1783;', '&#1784;', '&#1785;');
        // 2. Arabic HTML decimal
        $arabicDecimal = array('&#1632;', '&#1633;', '&#1634;', '&#1635;', '&#1636;', '&#1637;', '&#1638;', '&#1639;', '&#1640;', '&#1641;');
        // 3. Arabic Numeric
        $arabic = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
        // 4. Persian Numeric
        $persian = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');

        $string = str_replace($persianDecimal, $newNumbers, $string);
        $string = str_replace($arabicDecimal, $newNumbers, $string);
        $string = str_replace($arabic, $newNumbers, $string);
        return str_replace($persian, $newNumbers, $string);
    }


    public static function randomString()
    {
        $characters = '0123456789ab6c0d1e1f5g2h7i5j7kl88mdkn7n6op4qrs3tuvw2xy44z';
        $randstring = '';
        for ($i = 0; $i < 8; $i++) {
            $randstring .= $characters[rand(0, strlen($characters))];
        }
        return $randstring;
    }

}

