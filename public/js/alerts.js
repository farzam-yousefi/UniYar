/**
 * ==========================================
 * UniYar Admin Alerts
 * ==========================================
 */
/**
 * ==========================================
 * UniYar Admin Alert System
 * ==========================================
 */

const swal = Swal.mixin({

    customClass: {

        popup: "admin-swal",

        title: "admin-swal-title",

        htmlContainer: "admin-swal-text",


    },

    buttonsStyling: false,

    reverseButtons: true,

    allowOutsideClick: false,

    allowEscapeKey: true

});
const myAlert = {

    success(title = "عملیات موفق", text = "") {

        swal.fire({

            icon: "success",

            title,

            text,

            confirmButtonText: "باشه",

            customClass:{

                confirmButton:"btn btn-success",


            }

        });

    },

    error(title = "خطا", text = "") {

        swal.fire({

            icon: "error",

            title,

            text,

            confirmButtonText: "متوجه شدم",

            customClass:{

                confirmButton:"btn btn-danger",

            }

        });

    },



    warning(title = "هشدار", text = "") {

        swal.fire({

            icon: "warning",

            title,

            text,

            confirmButtonText: "باشه",

            customClass:{

                confirmButton:"btn btn-warning ms-3",

                cancelButton:"btn btn-outline-secondary"

            }
        });

    },

    info(title = "", text = "") {

        swal.fire({

            icon: "info",

            title,

            text,

            confirmButtonText: "باشه",

            customClass:{

                confirmButton:"btn btn-info ms-3",

                cancelButton:"btn btn-outline-secondary"

            }
        });

    },
    confirm(title, text, callback) {

        swal.fire({

            icon: "question",

            title,

            text,

            showCancelButton: true,

            confirmButtonText: "تایید",

            cancelButtonText: "انصراف",
            customClass:{

                confirmButton:"btn btn-success ms-3",

                cancelButton:"btn btn-outline-secondary"

            },
            reverseButtons: true

        }).then((result)=>{

            if(result.isConfirmed){

                callback();

            }

        });

    },



    // confirmDelete(callback) {
    //
    //     Swal.fire({
    //
    //         title: "حذف شود؟",
    //
    //         text: "این عملیات قابل بازگشت نیست.",
    //
    //         icon: "warning",
    //
    //         showCancelButton: true,
    //
    //         confirmButtonText: "بله، حذف شود",
    //
    //         cancelButtonText: "انصراف",
    //
    //         confirmButtonColor: "#DC3545",
    //
    //         cancelButtonColor: "#6C757D",
    //
    //         reverseButtons: true
    //
    //     }).then((result) => {
    //
    //         if (result.isConfirmed) {
    //
    //             callback();
    //
    //         }
    //
    //     });
    //
    // },







delete(url){

    swal.fire({

        icon: "warning",

        title: "حذف اطلاعات",

        text: "آیا از حذف اطلاعات مطمئن هستید؟",

        showCancelButton: true,

        confirmButtonText: "بله، حذف شود",

        cancelButtonText: "انصراف",
        customClass:{

            confirmButton:"btn btn-danger ms-3",

            cancelButton:"btn btn-outline-secondary"

        },

        // reverseButtons: true


    }).then((result)=>{

        if(result.isConfirmed){

            window.location.href = url;

        }

    });

}
};

/**
 * ==========================================
 * UniYar Admin Alerts FUNCTIONS AND USAGES
 * ==========================================
 */
//  myAlert.success(
//
//  "ذخیره شد",
//
//  "تغییرات با موفقیت ذخیره شدند."
//
//  );
//  myAlert.warning(
//
//  "توجه",
//
//  "ابتدا عنوان را وارد کنید."
//
//  );
//  myAlert.confirm(
//
//  "انتشار نمونه کار",
//
//  "از انتشار این نمونه کار مطمئن هستید؟",
//
//  function(){
//
//         console.log("YES");
//
//     }
//
//  );
//  myAlert.successRedirect(
//
//  "ذخیره شد",
//
//  "اطلاعات با موفقیت ذخیره شدند.",
//
//  "<?=URL?>admin/portfolio"
//
//  );
//
//
// // که خودش بعد از ۱.۵ ثانیه صفحه را رفرش یا Redirect می‌کند.
//  successRedirect(title,text,url){
//
//     swal.fire({
//
//         icon:"success",
//
//         title,
//
//         text,
//
//         timer:1500,
//
//         showConfirmButton:false
//
//     }).then(()=>{
//
//         window.location=url;
//
//     });
//
//}