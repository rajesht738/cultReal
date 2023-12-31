$(document).ready(function () {
    $(".custom-select-image").on("click", function (e) {
        e.preventDefault(),
            $(this).closest(".image-box").find(".image_input").trigger("click");
    }),
        $(".image_input").on("change", function () {
            !(function (e) {
                if (e.files && e.files[0]) {
                    var i = new FileReader();
                    (i.onload = function (i) {
                        $(e)
                            .closest(".image-box")
                            .find(".preview_image")
                            .prop("src", i.target.result);
                    }),
                        i.readAsDataURL(e.files[0]);
                }
            })(this);
        });
});
