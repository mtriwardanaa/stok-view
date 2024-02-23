"use strict";
var KTUsersAddUser = (function () {
    const t = document.getElementById("kt_modal_add_user"),
        e = t.querySelector("#kt_modal_add_user_form"),
        n = new bootstrap.Modal(t);
    return {
        init: function () {
            (() => {
                var o = FormValidation.formValidation(e, {
                    fields: {
                        name: { validators: { notEmpty: { message: "Nama wajib diisi" } } },
                        join_date: { validators: { notEmpty: { message: "Tanggal masuk belum dipilih" } } },
                        salary: { validators: { notEmpty: { message: "Gaji wajib diisi" } } },
                        bank_account: { validators: { notEmpty: { message: "Bank wajib diisi" } } },
                        account_number: { validators: { notEmpty: { message: "No Rekening wajib diisi" } } },
                    },
                    plugins: { trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) },
                });
                const i = t.querySelector('[data-kt-users-modal-action="submit"]');
                i.addEventListener("click", (t) => {
                    t.preventDefault(),
                        o &&
                            o.validate().then(function (t) {
                                console.log("validated!"),
                                    "Valid" == t
                                        ? (i.setAttribute("data-kt-indicator", "on"),
                                          (i.disabled = !0),
                                          setTimeout(function () {
                                              i.removeAttribute("data-kt-indicator"),
                                                  (i.disabled = !1),
                                                  Swal.fire({ text: "Form has been successfully submitted!", icon: "success", buttonsStyling: !1, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn btn-primary" } }).then(
                                                      function (t) {
                                                          t.isConfirmed && n.hide();
                                                      }
                                                  );
                                          }, 2e3))
                                        : Swal.fire({
                                              text: "Ada kesalahan, mohon periksa kembali.",
                                              icon: "error",
                                              buttonsStyling: !1,
                                              confirmButtonText: "Ok, kembali!",
                                              customClass: { confirmButton: "btn btn-primary" },
                                          });
                            });
                }),
                    t.querySelector('[data-kt-users-modal-action="cancel"]').addEventListener("click", (t) => {
                        t.preventDefault(),
                            Swal.fire({
                                text: "Yakin ingin membatalkan?",
                                icon: "warning",
                                showCancelButton: !0,
                                buttonsStyling: !1,
                                confirmButtonText: "Ya, batalkan!",
                                cancelButtonText: "Tidak, kembali",
                                customClass: { confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light" },
                            }).then(function (t) {
                                if (t.value) {
                                    Swal.fire({ text: "Form telah dibatalkaffn!.", icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, kembali!", customClass: { confirmButton: "btn btn-primary" } }).then((e.reset(), n.hide()));
                                }
                            });
                    }),
                    t.querySelector('[data-kt-users-modal-action="close"]').addEventListener("click", (t) => {
                        t.preventDefault(),
                            Swal.fire({
                                text: "Yakin ingin membatalkan?",
                                icon: "warning",
                                showCancelButton: !0,
                                buttonsStyling: !1,
                                confirmButtonText: "Ya, batalkan!",
                                cancelButtonText: "Tidak, kembali",
                                customClass: { confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light" },
                            }).then(function (t) {
                                if (t.value) {
                                    Swal.fire({ text: "Form telah dibatalkaffn!.", icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, kembali!", customClass: { confirmButton: "btn btn-primary" } }).then((e.reset(), n.hide()));
                                }
                            });
                    });
            })();
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTUsersAddUser.init();
});
