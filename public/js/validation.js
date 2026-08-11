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

        if (input.value.trim() === '') {

            isValid = false;

            const error = document.createElement('div');

            error.className = 'form-error';

            error.innerText =
                `لطفا ${input.dataset.required} را ${input.dataset.action}`;

            input.parentElement.appendChild(error);

            input.classList.add('is-invalid');
        }

    });

    return isValid;
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

            isValid = false;

            const error = document.createElement('div');

            error.className = 'form-error';

            error.innerText =
                'تاریخ تحویل باید بعد از تاریخ ثبت باشد.';

            endInput.parentElement.appendChild(error);

            endInput.classList.add('is-invalid');

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
        const error = document.createElement('div');

        error.className = 'form-error';

        error.innerText =
            'رمز باید حداقل ۸ کاراکتر و شامل حروف، ارقام و حداقل یک کاراکتر خاص باشد.';
        newPassInput.parentElement.appendChild(error);

        newPassInput.classList.add('is-invalid');

        isValid = false;
    }

    // بررسی تطابق رمزها
    if (newPass !== reNewPass && reNewPass !== '') {
        const error = document.createElement('div');

        error.className = 'form-error';

        error.innerText ='تکرار رمز عبور با رمز جدید یکسان نیست.';

        reNewPassInput.parentElement.appendChild(error);

        reNewPassInput.classList.add('is-invalid');

        isValid = false;
    }

    return generalValidation && isValid;
}
