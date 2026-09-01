document.addEventListener("DOMContentLoaded", function () {

    const input = document.getElementById('image');
    const preview = document.getElementById('preview');
    const noImage = document.getElementById('no-image');


    if (!input || !preview) {
        return;
    }


    input.addEventListener('change', function () {

        const file = this.files[0];

        if (!file) return;


        if (!file.type.startsWith("image/")) {
            myAlert.error(
                "خطا",
                "لطفا یک فایل تصویری انتخاب کنید"
            );
            input.value = "";
            return;
        }

        if (file.size > 20 *1024 *1024) {
            myAlert.error(
                'خطا',
                'حجم مجاز عکس حداکثر 20 مگا بایت است.'
            );

            return;
        }


        preview.src = URL.createObjectURL(file);

        preview.style.display = "block";


        if(noImage){
            noImage.style.display = "none";
        }

    });

});