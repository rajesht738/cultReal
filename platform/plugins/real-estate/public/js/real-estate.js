$(document).ready(function () {
    $(document).on("change", "#type_id", function (e) {
        "rent" == $("#type_id").children("option:selected").data("code")
            ? $("#period")
                  .closest(".period-form-group")
                  .removeClass("hidden")
                  .fadeIn()
            : $("#period")
                  .closest(".period-form-group")
                  .addClass("hidden")
                  .fadeOut();
    }),
        $(document).on("change", "#never_expired", function (e) {
            !0 === $(e.currentTarget).is(":checked")
                ? $("#auto_renew")
                      .closest(".auto-renew-form-group")
                      .addClass("hidden")
                      .fadeOut()
                : $("#auto_renew")
                      .closest(".auto-renew-form-group")
                      .removeClass("hidden")
                      .fadeIn();
        }),
        $("body")
            .on("change", "#property-category", function () {
                var e = $(this);
                $("#property-sub-category").length < 1 ||
                    $.ajax({
                        url: e.data("url"),
                        data: { id: e.val() },
                        beforeSend: function () {
                            $("#property-sub-category").html(
                                '<option value="">' +
                                    $("#property-sub-category").data(
                                        "placeholder"
                                    ) +
                                    "</option>"
                            );
                        },
                        success: function (e) {
                            var t =
                                '<option value="">' +
                                $("#property-sub-category").data(
                                    "placeholder"
                                ) +
                                "</option>";
                            $.each(e.data, function (e, o) {
                                t +=
                                    '<option value="' +
                                    o.id +
                                    '">' +
                                    o.name +
                                    "</option>";
                            }),
                                $("#property-sub-category").html(t).select2();
                        },
                    });
            })
            .on("change", "select#filter_country_id", function () {
                var e = $(this);
                $.ajax({
                    url: $("#filter_state_id").data("url"),
                    data: { id: e.val() },
                    beforeSend: function () {
                        $("#filter_state_id").html(
                            '<option value="">' +
                                $("#filter_state_id").data("placeholder") +
                                "</option>"
                        ),
                            $("#filter_city_id").html(
                                '<option value="">' +
                                    $("#filter_city_id").data("placeholder") +
                                    "</option>"
                            );
                    },
                    success: function (e) {
                        var t =
                            '<option value="">' +
                            $("#filter_state_id").data("placeholder") +
                            "</option>";
                        $.each(e.data, function (e, o) {
                            t +=
                                '<option value="' +
                                o.id +
                                '">' +
                                o.name +
                                "</option>";
                        }),
                            $("#filter_state_id").html(t).select2();
                    },
                });
            })
            .on("change", "select#filter_state_id", function () {
                var e = $(this);
                $.ajax({
                    url: $("#filter_city_id").data("url"),
                    data: { id: e.val() },
                    beforeSend: function () {
                        $("#filter_city_id").html(
                            '<option value="">' +
                                $("#filter_city_id").data("placeholder") +
                                "</option>"
                        );
                    },
                    success: function (e) {
                        var t =
                            '<option value="">' +
                            $("#filter_city_id").data("placeholder") +
                            "</option>";
                        $.each(e.data, function (e, o) {
                            t +=
                                '<option value="' +
                                o.id +
                                '">' +
                                o.name +
                                "</option>";
                        }),
                            $("#filter_city_id").html(t).select2();
                    },
                });
            })
            .on("click", "button.btn-get-latitude-longitude", function (e) {
                e.preventDefault();
                var t = $(".main-form #location").val(),
                    o =
                        t +
                        ", " +
                        $(".main-form #city_id option:selected").text(),
                    a = $(this).data("key");
                "" !== t
                    ? fetch(
                          "https://maps.googleapis.com/maps/api/geocode/json?address=" +
                              o +
                              "&key=" +
                              a
                      )
                          .then(function (e) {
                              return e.json();
                          })
                          .then(function (e) {
                              if ("OK" === e.status) {
                                  var t = e.results[0].geometry.location.lat,
                                      o = e.results[0].geometry.location.lng;
                                  $(".main-form input#latitude").val(t),
                                      $(".main-form input#longitude").val(o);
                              } else toastr.error(void 0 !== window.trans.address_invalid ? window.trans.address_invalid : "Address invalid");
                          })
                    : toastr.error(
                          void 0 !== window.trans.please_enter_address
                              ? window.trans.please_enter_address
                              : "Please enter address"
                      );
            });
});
