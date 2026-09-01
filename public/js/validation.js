/* ======================
   GENERAL VALIDATION
====================== */

function generalValidateForm(form) {

    let isValid = true;

    // حذف خطاهای قبلی
    form.querySelectorAll('.form-error')
        .forEach(error => error.remove());

    // حذف وضعیت invalid قبلی
    form.querySelectorAll('[data-required]')
        .forEach(input => {
            input.classList.remove('is-invalid');
        });

    // فقط فیلدهای اجباری همین فرم
    const inputs = form.querySelectorAll('[data-required]');

    inputs.forEach(input => {

        if (input.value.trim() === '' && !(input.classList.contains("ignore"))) {

            isValid = false;

            const error = document.createElement('div');

            error.className = 'form-error';

            error.innerText =
                `لطفا ${input.dataset.required} را ${input.dataset.action}`;

            if (!(input.dataset.place === 'grandparent'))
                input.parentElement.appendChild(error);
            else
                input.parentElement.parentElement.appendChild(error);

            input.classList.add('is-invalid');
        }

    });

    return isValid;
}

function makeErr(item, message) {

    const error = document.createElement('div');

    error.className = 'form-error';

    error.innerText = message;

    item.parentElement.appendChild(error);

    item.classList.add('is-invalid');

}

function toEnglishDigits(value) {

    return value.replace(/[۰-۹]/g, digit =>
        String.fromCharCode(
            digit.charCodeAt(0) - 1728
        )
    );
}

/* ======================
   ADD / EDIT PORTFOLIO
====================== */

function validateAdminPortfolioForm(form) {

    // اول validation عمومی
    const generalValidation = generalValidateForm(form);

    let isValid = true;

    let start_date = null;
    let end_date = null;

    const inputs = form.querySelectorAll('.validation-required');

    // پیدا کردن تاریخ‌ها
    inputs.forEach(input => {

        if (input.dataset.type === 'start_date') {
            start_date = input.value.trim();
        }

        if (input.dataset.type === 'end_date') {
            end_date = input.value.trim();
        }

    });


    // بررسی تاریخ‌ها
    if (start_date && end_date) {

        const endInput =
            form.querySelector('[data-type="end_date"]');

        if (start_date >= end_date) {

            makeErr(endInput, 'تاریخ تحویل باید بعد از تاریخ ثبت باشد.');

            isValid = false;
        }
    }

    return generalValidation && isValid;
}

/* ======================
   CHANGE PASSWORD
====================== */
function validateChangePassForm(form) {

    // اول validation عمومی
    const generalValidation = generalValidateForm(form);

    //clean server-side errs
    const errorList = form.querySelector('.errorList');

    if (errorList) {
        errorList.innerHTML = '';
    }

    let isValid = true;
    const oldPassInput = form.querySelector('#oldPassword');
    const newPassInput = form.querySelector('#newPassword');
    const reNewPassInput = form.querySelector('#reNewPassword');

    const oldPass = oldPassInput.value;
    const newPass = newPassInput.value;
    const reNewPass = reNewPassInput.value;

    const pattern =
        /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d @$!%*#?&]{8,}$/;
    const feedback = $('#password-feedback');

    // پاک کردن پیام قبلی
    feedback.text('').css('color', '');

    // بررسی قدرت رمز جدید
    if (!pattern.test(newPass) && newPass !== '') {

        makeErr(newPassInput, 'رمز باید حداقل ۸ کاراکتر و شامل حروف، ارقام و حداقل یک کاراکتر خاص باشد.');

        isValid = false;
    }

    // بررسی تطابق رمزها
    if (newPass !== reNewPass && reNewPass !== '') {
        makeErr(reNewPassInput, 'تکرار رمز عبور با رمز جدید یکسان نیست.');
        isValid = false;
    }

    return generalValidation && isValid;
}


/* ======================
   SITE
====================== */


/* ======================
   ADD EDIT ORDER FORM
====================== */

function validateOrderForm(form) {

    // اول validation عمومی
    const generalValidation = generalValidateForm(form);

    //clean server-side errs
    const errorList = form.querySelector('.errorList');

    if (errorList) {
        errorList.innerHTML = '';
    }

    // اختصاصی
    let isValid = true;
    const mobile = form.querySelector('#mobile');
    const email = form.querySelector('#email');
    const service_id = form.querySelector('#service_id');


    const mobilePattern = /^09\d{9}$/;

    if (mobile.value.trim() != '' && (!mobilePattern.test(mobile.value.trim()))) {

        makeErr(mobile, 'لطفا شماره موبایل را بصورت صحیح وارد کنید.');
        isValid = false;
    }
    const emailPattern =
        /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (email.value.trim() != '' && (!emailPattern.test(email.value.trim()))) {


        makeErr(email, 'لطفا آدرس ایمیل را بصورت صحیح وارد کنید.');

        isValid = false;
    }
    if (service_id.value.trim() !== '') {


        if (service_id.value.trim() === 'PROJECT') {
            const project_category = form.querySelector('#project_category');
            if (project_category.value.trim() == '') {
                makeErr(project_category, 'لطفا نوع پروژه را مشخص کنید.');

                isValid = false;
            }
            const delivery_date = form.querySelector('#delivery_date');
            if (delivery_date.value.trim() == '') {
                makeErr(delivery_date, 'لطفا تاریخ تحویل را مشخص کنید.');

                isValid = false;
            }
            else {

                const value = toEnglishDigits(
                    delivery_date.value.trim()
                );

                const [year, month, day] = value.split('/').map(Number);

                const deliveryDate = new persianDate([
                    year,
                    month,
                    day
                ]);

                const today = new persianDate();

                // حذف ساعت از مقایسه
                deliveryDate.hour(0);
                deliveryDate.minute(0);
                deliveryDate.second(0);
                deliveryDate.millisecond(0);

                today.hour(0);
                today.minute(0);
                today.second(0);
                today.millisecond(0);

                if (deliveryDate && deliveryDate < today) {

                    makeErr(delivery_date, 'تاریخ تحویل نمی تواند قبل از تاریخ امروز باشد.');

                    isValid = false;
                }
            }

        }
        if (service_id.value.trim() === 'TEACH'){
            const teaching_type = form.querySelector('#teaching_type');
            if (teaching_type.value.trim() == '') {
                makeErr(teaching_type, 'لطفا نحوه برگزاری را مشخص کنید.');

                isValid = false;
            }
        }
            }
    return (generalValidation && isValid);
}
