const statusColor = {
    INACTIVE: "badge-danger",
    ACTIVE: "badge-success",
    PENDING: "badge-warning",
};

$(".admin-toastr").trigger("click");

function toastr_alert(heading, msg, type) {
    new PNotify({
        title: heading,
        text: msg,
        icon: "icofont icofont-info-circle",
        type: type,
    });
}

function confirm_box_status(status, slug, url, _this, msg, table) {
    if (confirm("Do you really want to change status ?")) {
        let curr_status = $(_this).children().text();

        $(_this).children().text("Waiting...");
        $.ajax({
            url: url,
            type: "POST",
            data: {
                status: status,
                slug: slug,
                table: table,
                _token: csrf_token,
            },
            success: $.proxy(function (res) {
                if (res === "success") {
                    $(_this)
                        .parent()
                        .html(
                            `<a class="badge ${
                                statusColor[status]
                            } text-white cursor-pointer" onclick="confirm_box_status('${curr_status.toLowerCase()}','${slug}','${url}',this,'${msg}','${table}')"><strong>${status.toUpperCase()}</strong></a>`
                        );
                } else if (res === "error") {
                    toastr_alert(
                        "Error",
                        "Error occured in changing status",
                        "error"
                    );
                    $(_this).children().text(curr_status);
                }
                // if (res == "success") {
                //     if (status == "active") {
                //         $(_this).parent().html(`<a class="badge badge-success text-white cursor-pointer" onclick="confirm_box_status('inactive','${slug}','${url}',this,'${msg}','${table}')"><strong>Active</strong></a>`);
                //     }
                //     if (status == "inactive") {
                //         $(_this).parent().html(`<a class="badge badge-danger text-white cursor-pointer" onclick="confirm_box_status('active','${slug}','${url}',this,'${msg}','${table}')"><strong>Inactive</strong></a>`);
                //     }
                //     toastr_alert("Success",
                //         msg + " status has changed successfully",
                //         "success"
                //     );
                // } else if (res == "error") {
                //     toastr_alert(
                //         "Error",
                //         "Error occured in changing status",
                //         "error"
                //     );
                //     $(_this).children().text(curr_status);
                // }
            }, this),
            error: function () {
                toastr_alert(
                    "Error",
                    "Error occured in changing status",
                    "error"
                );
                $(_this).children().text(curr_status);
            },
        });
    }
}

$("body").on("click", ".delete-data", function (e) {
    e.preventDefault();
    let url = $(this).attr("href");
    if (confirm("Do you really want to delete this data ?")) {
        window.location.href = url;
    }
});

function banner_img_delete(id, key, url) {
    if (confirm("Do you really want to delete this image ?")) {
        window.location.href = base_url + url + "/" + id + "/" + key;
    }
}

$(".js-example-responsive").select2();

$(".project-table").DataTable();

$("#edit-cancel").on("click", function () {
    var c = $("#edit-btn").find("i");
    c.removeClass("icofont-close");
    c.addClass("icofont-edit");
    $(".view-info").show();
    $(".edit-info").hide();
});

$(".edit-info").hide();

$("#edit-btn").on("click", function () {
    var b = $(this).find("i");
    var edit_class = b.attr("class");
    if (edit_class == "icofont icofont-edit") {
        b.removeClass("icofont-edit");
        b.addClass("icofont-close");
        $(".view-info").hide();
        $(".edit-info").show();
    } else {
        b.removeClass("icofont-close");
        b.addClass("icofont-edit");
        $(".view-info").show();
        $(".edit-info").hide();
    }
});

$(".js-example-placeholder-multiple").select2({
    placeholder: "Select",
});

$(".multiple-select").select2({
    placeholder: "Select",
    tags: true,
});

$("select[class^='onChangeSelect']").select2({
    placeholder: "Select",
});

// function onChangeSelect(option, clas) {
//     $("." + clas)
//         .val(null)
//         .trigger("change");

//     $("." + clas)
//         .select2({
//             placeholder: "Select",
//         })
//         .html(option)
//         .trigger("change");
// }

var blog_img_count = 1;
$("body").on("click", ".add-blog-img", function () {
    $(this)
        .parent()
        .parent()
        .before(
            `<div class="form-group row"><div class="col-sm-10 col-xl-10"><label for="image" class="p-0">Image</label><input type="file" class="form-control" name="image[${blog_img_count}]"></div><div class="col-sm-2 col-xl-2"><label for="image" class="p-0 w-100">Remove</label><button type="button" class="btn btn-danger remove-blog-img"><i class="icofont icofont-minus m-0"></i></button></div></div>`
        );
    blog_img_count++;
});

$("body").on("click", ".remove-blog-img", function () {
    $(this).closest(".row").remove();
});

function blog_img_delete(url) {
    if (confirm("Do you really want to delete this image ?")) {
        window.location.href = url;
    }
}

const redirectPage = (url = "login") => {
    window.location.href = base_url + url;
};

const log = (data, param) => {
    console.log(data, param);
};

const getSubcategoryByCate = (_this, url) => {
    let options = "<option value=''> Select Sub Category </option>";
    $.ajax({
        url: url,
        type: "POST",
        data: {
            _token: csrf_token,
            id: $(_this).val(),
        },
        success: $.proxy(function (response) {
            res = JSON.parse(response);
            if (res.status === "login") {
                redirectPage();
            }
            if (res.status === "success") {
                $.each(res.data, function (i) {
                    options += `<option value='${this.id}'> ${this.subcate_name}</option>`;
                });
            } else if (res.status === "error") {
            }
            $(".getSubcategoryByCate").html(options);
        }, this),
    });
};
function getSubevent(url) {
    var event = $(".temp-event option:selected").val();

    $.ajax({
        url: url,
        type: "POST",
        data: { event: event, _token: csrf_token },
        success: $.proxy(function (response) {
            var res = JSON.parse(response);
            console.log(res);
            if (res.status == "success") {
                var newOption = [];
                $.each(res.data, function (i) {
                    newOption[i] = new Option(
                        this.sub_name,
                        this.id,
                        false,
                        false
                    );
                });
                onChangeSelect(newOption, "onChangeSelect-temp-subevent-event");
            } else if (res.status == "fail") {
                console.log("res");
            }
        }, this),
    });
}
