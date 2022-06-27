function isiEdit(value, tipe, kode, view, defaultVal = "0") {
    var hasil = "";
    switch (tipe) {
        case "number":
            hasil =
                value == "" || value == null || value == undefined ? 0 : value;
            $(kode).val(hasil);
            $(kode).prop("readonly", view);
            break;
        case "text":
            hasil =
                value == "" || value == null || value == undefined
                    ? "-"
                    : value;
            $(kode).val(hasil);
            $(kode).prop("readonly", view);
            break;
        case "cbbl":
            hasil =
                value == "" || value == null || value == undefined
                    ? "-"
                    : value;
            $(kode).val(hasil);
            $(kode).prop("readonly", view);
            if (view) {
                $(kode).parent(".input-group").addClass("readonly");
            } else {
                $(kode).parent(".input-group").removeClass("readonly");
            }
            break;
        case "select":
            hasil =
                value == "" || value == null || value == undefined
                    ? defaultVal
                    : value;
            $(kode)[0].selectize.setValue(hasil);
            if (view) {
                $(kode)[0].selectize.lock();
            } else {
                $(kode)[0].selectize.unlock();
            }
            break;
        case "date":
            hasil =
                value == "" || value == null || value == undefined
                    ? "01/01/1990"
                    : value;
            $(kode).val(hasil);
            $(kode).prop("readonly", view);
            break;
        case "button":
            if (view) {
                $(kode).addClass("disabled");
            } else {
                $(kode).removeClass("disabled");
            }
            $(kode).prop("disabled", view);
            break;
    }
}

function sepNumX(x) {
    if (typeof x === "undefined" || !x) {
        return 0;
    } else {
        if (x < 0) {
            var x = parseFloat(x).toFixed(0);
        }

        var parts = x.toString().split(",");
        parts[0] = parts[0].replace(/([0-9])(?=([0-9]{3})+$)/g, "$1.");
        return parts.join(".");
    }
}

function showNotification(placementFrom, placementAlign, type, title, message) {
    $.notify(
        {
            title: title,
            message: message,
            target: "_blank",
        },
        {
            element: "body",
            position: null,
            type: type,
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: false,
            placement: {
                from: placementFrom,
                align: placementAlign,
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 4000,
            timer: 2000,
            url_target: "_blank",
            mouse_over: null,
            animate: {
                enter: "animated fadeInDown",
                exit: "animated fadeOutUp",
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: "class",
            template:
                '<div data-notify="container" class="col-11 col-sm-3 alert  alert-{0} " role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                "</div>" +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                "</div>",
        }
    );
}

function jumFilter() {
    var jum = $("[name^=inp-filter]").filter(function () {
        return this.value.trim() != "";
    }).length;
    if (jum > 0) {
        $("#jum-filter").text(jum);
        if ($("#jum-filter2").length > 0) {
            $("#jum-filter2").text(jum);
        }
    } else {
        $("#jum-filter").text("");
        if ($("#jum-filter2").length > 0) {
            $("#jum-filter2").text("");
        }
    }
}

function setHeightReport() {
    var header = $(".topbar").height();
    var subheader = $("#subFixbar").height();
    var content = window.innerHeight;
    var tinggi = content - header - subheader - 50;
    $("#content-lap").css("height", tinggi);
}

function setHeightForm() {
    var header = 70;
    var content = window.innerHeight;
    var title = 69;
    var height = content - header - title - 40;

    if ($("#saku-form").length > 0) {
        $(".form-body").css("height", height);
    }
    if ($(".card-body-footer").length > 0) {
        $(".card-body-footer").css("width", $(".form-body").width());
    }
}

function setWidthFooterCardBody() {
    if ($(".card-body-footer").length > 0) {
        if ($("#saku-form > .col-lg-6").length > 0) {
            var main_width = $(".main-menu").width();
            var main_pos = $(".main-menu").position();
            if (main_pos.left < 0) {
                main_width = 10;
            }
            $(".card-body-footer")
                .css("width", $("#saku-form > .col-lg-6").width() + "px")
                .css({ left: main_width });
        } else {
            $(".card-body-footer").css(
                "width",
                $(".container-fluid").width() + "px"
            );
        }
    }
}

function setHeightFormPOS() {
    var header = 70;
    var content = window.innerHeight;
    var height = content - header - 40;

    if ($(".form-pos-body").length > 0) {
        $(".form-pos-body").css("height", height);
    }
    if ($(".grid-table").length > 0) {
        $(".grid-table").css("height", height - 236);
    }
}

function storageChange(event) {
    if (event.key === "logged_in") {
        if (window.localStorage.getItem("logged_in") == "false") {
            window.localStorage.removeItem("esaku-form");
            window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
        }
    }
}

function logout() {
    msgDialog({
        id: null,
        type: "logout",
    });
}

function newForm() {
    $("#row-id").hide();
    $("#method").val("post");
    $("[id^=label]").each(function (e) {
        $(this).text("");
    });
    $("[class^=info-name]").each(function (e) {
        $(this).addClass("hidden");
    });
    $("[class^=input-group-text]:not(#filter-btn)").each(function (e) {
        $(this).text("");
    });
    $("[class^=input-group-prepend]").each(function (e) {
        $(this).addClass("hidden");
    });
    $("[class*='inp-label-']").each(function (e) {
        $(this).removeAttr("style");
    });
    $("[class^=info-code]").each(function (e) {
        $(this).text("");
    });
    $("[class^=simple-icon-close]").each(function (e) {
        $(this).addClass("hidden");
    });
    $("#id_edit").val("false");
    $('input[data-input="cbbl"]').val("");
    $("#btn-update").attr("id", "btn-save");
    $("#btn-save").attr("type", "submit");
    $("#form-tambah")[0].reset();
    $("#form-tambah").validate().resetForm();
    $("#id").val("");
    $("#saku-datatable").hide();
    $("#saku-form").show();
    setHeightForm();
    setWidthFooterCardBody();
}

function resetForm() {
    $("#row-id").hide();
    $("#method").val("post");
    $("[id^=label]").each(function (e) {
        $(this).text("");
    });
    $("[class^=info-name]").each(function (e) {
        $(this).addClass("hidden");
    });
    $("[class^=input-group-text]:not(#filter-btn)").each(function (e) {
        $(this).text("");
    });
    $("[class^=input-group-prepend]").each(function (e) {
        $(this).addClass("hidden");
    });
    $("[class*='inp-label-']").each(function (e) {
        $(this).removeAttr("style");
    });
    $("[class^=info-code]").each(function (e) {
        $(this).text("");
    });
    $("[class^=simple-icon-close]").each(function (e) {
        $(this).addClass("hidden");
    });
    $("#id_edit").val("");
    $('input[data-input="cbbl"]').val("");
    $("#btn-update").attr("id", "btn-save");
    $("#btn-save").attr("type", "submit");
    $("#form-tambah")[0].reset();
    $("#form-tambah").validate().resetForm();
    $("#id").val("");
}

function format_number(x) {
    var num = parseFloat(x).toFixed(0);
    num = sepNumX(num);
    return num;
}

function last_add(table, param, isi) {
    var rowIndexes = [];
    table.rows(function (idx, data, node) {
        if (data[param] === isi) {
            rowIndexes.push(idx);
        }
        return false;
    });
    table.row(rowIndexes).select();
    $(".selected td:eq(0)").addClass("last-add");
    console.log("last-add");
    setTimeout(function () {
        console.log("timeout");
        $(".selected td:eq(0)").removeClass("last-add");
        table.row(rowIndexes).deselect();
    }, 1000 * 60 * 10);
}

function generateTableServer(
    id,
    url,
    columnDefs,
    columns,
    url_sesi,
    byOrder = [],
    param = {}
) {
    var dataTable = $("#" + id).DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        ordering: false,
        length: 10,
        bLengthChange: false,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        ajax: {
            url: url,
            type: "POST",
            data: function (prm) {
                return $.extend({}, prm, param);
            },
        },
        deferRender: true,
        order: byOrder,
        columns: columns,
        columnDefs: columnDefs,
        drawCallback: function () {
            $($(".dataTables_wrapper .pagination li:first-of-type"))
                .find("a")
                .addClass("prev");
            $($(".dataTables_wrapper .pagination li:last-of-type"))
                .find("a")
                .addClass("next");

            $(".dataTables_wrapper .pagination").addClass("pagination-sm");
        },
        language: {
            paginate: {
                previous: "<i class='simple-icon-arrow-left'></i>",
                next: "<i class='simple-icon-arrow-right'></i>",
            },
            search: "_INPUT_",
            searchPlaceholder: "Search...",
            lengthMenu: "Items Per Page _MENU_",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
            infoFiltered: "(terfilter dari _MAX_ total entri)",
        },
    });

    return dataTable;
}

function showInpFilterBSheetServer(settings) {
    var par = settings.id;
    var header = settings.header;
    $target = settings.target1;
    $target2 = settings.target2;
    $target3 = settings.target3;
    $target4 = settings.target4;
    var parameter = settings.parameter;
    var toUrl = settings.url;
    var columns = settings.columns;
    var judul = settings.judul;
    var jTarget1 = settings.jTarget1;
    var jTarget2 = settings.jTarget2;
    var width = settings.width;

    var header_html = "";
    for (i = 0; i < header.length; i++) {
        header_html +=
            "<th style='width:" + width[i] + "'>" + header[i] + "</th>";
    }
    $(".c-bottom-sheet").removeClass("active");
    var content = `
    <div id="search-content">
        <div style="display: block;" class="search-header">
            <h6 class="title" style="padding-left: 1.8rem;"></h6>
            <ul class="nav nav-tabs col-12 hidden justify-content-end" style="margin-top:15px" role="tablist">
            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#list" role="tab" aria-selected="true"><span class="hidden-xs-down">Data</span></a></li>
            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#terpilih" role="tab" aria-selected="false"><span class="hidden-xs-down">Terpilih</span></a> </li>
            </ul>
        </div>
        <div class='separator'></div>
        <div class="search-body p-3" style="height: calc(75vh - 56px);position:sticky">
                    
        </div>
    </div>
    `;
    $("#content-bottom-sheet").html(content);

    $(".c-bottom-sheet__sheet").css({
        width: "50%",
        "margin-left": "25%",
        "margin-right": "25%",
    });
    var scrollsrc = document.querySelector(".search-body");
    var psscrollsrc = new PerfectScrollbar(scrollsrc);

    if (settings.multi != undefined) {
        var headerpilih_html = "";
        for (i = 0; i < header.length; i++) {
            headerpilih_html +=
                "<th style='width:" + width[i] + "'>" + header[i] + "</th>";
        }
        headerpilih_html += "<th style='width:10%'>Action</th>";
        var table =
            `
        <div class="tab-content tabcontent-border col-12 p-0">
            <div class="tab-pane active" id="list" role="tabpanel">
                <table class='' width='100%' id='table-search'><thead><tr>` +
            header_html +
            `</tr></thead>
                <tbody></tbody></table>
            </div>
            <div class="tab-pane" id="terpilih" role="tabpanel">
                <table class='' width='100%' id='table-search2'><thead><tr>` +
            headerpilih_html +
            `</tr></thead>
                <tbody></tbody></table>
            </div>
        </div>
        <button class='btn btn-primary float-right' id='btn-ok'>OK</button>`;
        $(".search-header").css("padding-bottom", "0");
        $(".search-header ul").removeClass("hidden");
    } else if (settings.multi2 != undefined) {
        var headerpilih_html = "";
        headerpilih_html +=
            "<th style='width:5%' id='checkbox_search'><input id='check-all_search' name='select_all_search' value='1' type='checkbox'></th>";
        for (i = 0; i < header.length; i++) {
            headerpilih_html +=
                "<th style='width:" + width[i] + "'>" + header[i] + "</th>";
        }
        var table =
            `<table class='' width='100%' id='table-search'><thead><tr>` +
            headerpilih_html +
            `</tr></thead>
        <tbody></tbody></table>
        <button class='btn btn-primary float-right' id='btn-ok'>OK</button>`;
        if (!$(".search-header ul").hasClass("hidden")) {
            $(".search-header ul").addClass("hidden");
            $(".search-header").css("padding-bottom", "1.75rem");
        }
    } else {
        var table =
            "<table class='' width='100%' id='table-search'><thead><tr>" +
            header_html +
            "</tr></thead>";
        if (!$(".search-header ul").hasClass("hidden")) {
            $(".search-header ul").addClass("hidden");
            $(".search-header").css("padding-bottom", "1.75rem");
        }
    }
    table += "<tbody></tbody></table>";

    $(".search-body").html(table);

    var searchTable = $("#table-search").DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        ordering: false,
        length: 10,
        order: [[0, "asc"]],
        sDom: '<"row view-filter"<"col-sm-12"<f>>>t<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        ajax: {
            url: toUrl,
            type: "POST",
            data: function (prm) {
                return $.extend({}, prm, parameter);
            },
        },
        deferRender: true,
        select: {
            style: "multi",
            selector: "td:first-child",
        },
        columns: columns,
        drawCallback: function () {
            $($(".dataTables_wrapper .pagination li:first-of-type"))
                .find("a")
                .addClass("prev");
            $($(".dataTables_wrapper .pagination li:last-of-type"))
                .find("a")
                .addClass("next");

            $(".dataTables_wrapper .pagination").addClass("pagination-sm");
        },
        language: {
            paginate: {
                previous: "<i class='simple-icon-arrow-left'></i>",
                next: "<i class='simple-icon-arrow-right'></i>",
            },
            search: "_INPUT_",
            searchPlaceholder: "Search...",
            lengthMenu: "Items Per Page _MENU_",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
            infoFiltered: "(terfilter dari _MAX_ total entri)",
        },
    });

    $("#table-search_filter input").off();
    $("#table-search_filter input").on("keyup", function (e) {
        var key = e.keyCode || e.key;
        if (key == 13) {
            searchTable.search(this.value).draw();
        }
    });

    searchTable.on("select.dt deselect.dt", function (e, dt, type, indexes) {
        var countSelectedRows = searchTable.rows({ selected: true }).count();
        var countItems = searchTable.rows().count();

        if (countItems > 0) {
            if (countSelectedRows == countItems) {
                $(
                    'thead .selectall-checkbox_search input[type="checkbox"]',
                    this
                ).prop("checked", true);
            } else {
                $(
                    'thead .selectall-checkbox_search input[type="checkbox"]',
                    this
                ).prop("checked", false);
            }
        }

        if (e.type === "select") {
            $(
                '.selectall-checkbox_search input[type="checkbox"]',
                searchTable.rows({ selected: true }).nodes()
            ).prop("checked", true);
        } else {
            $(
                '.selectall-checkbox_search input[type="checkbox"]',
                searchTable.rows({ selected: false }).nodes()
            ).prop("checked", false);
        }
    });

    searchTable.on("click", "thead .selectall-checkbox_search", function () {
        $('input[type="checkbox"]', this).trigger("click");
    });

    searchTable.on(
        "click",
        'thead .selectall-checkbox_search input[type="checkbox"]',
        function (e) {
            if (this.checked) {
                searchTable.rows().select();
            } else {
                searchTable.rows().deselect();
            }
            e.stopPropagation();
        }
    );
    $(".search-header .title").html(judul);
    $("#trigger-bottom-sheet").trigger("click");

    searchTable.columns.adjust().draw();

    $("#table-search tbody").on("click", "tr", function () {
        if ($(this).hasClass("selected")) {
            $(this).removeClass("selected");
        } else {
            searchTable.$("tr.selected").removeClass("selected");
            $(this).addClass("selected");

            var kode = $(this).closest("tr").find("td:nth-child(1)").text();
            var nama = $(this).closest("tr").find("td:nth-child(2)").text();
            if (kode == "No data available in table") {
                return false;
            }

            if (settings.onItemSelected != undefined) {
                var select_data = searchTable.row(this).data();
                if (typeof settings.onItemSelected === "function") {
                    settings.onItemSelected.call(this, select_data);
                }
            } else {
                var kode = $(this).closest("tr").find("td:nth-child(2)").text();
                var nama = $(this).closest("tr").find("td:nth-child(3)").text();
                if (kode == "No data available in table") {
                    return false;
                }

                if (jTarget1 == "val") {
                    $($target).val(kode);
                } else {
                    $("#" + par).css("border-left", 0);
                    $("#" + par).val(kode);
                    $($target).text(kode);
                    $($target).attr("title", nama);
                    $($target).parents("div").removeClass("hidden");
                }

                if (jTarget2 == "val") {
                    $($target2).val(nama);
                } else if (jTarget2 == "title") {
                    $($target2).attr("title", nama);
                    $($target2).removeClass("hidden");
                } else if (jTarget2 == "text2") {
                    $($target2).text(nama);
                } else {
                    var width =
                        $("#" + par).width() - $("#search_" + par).width() - 10;
                    var pos = $("#" + par).position();
                    var height = $("#" + par).height();
                    console.log(par);
                    $("#" + par).attr(
                        "style",
                        "border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important"
                    );
                    $($target2)
                        .width(
                            $("#" + par).width() -
                                $("#search_" + par).width() -
                                10
                        )
                        .css({ left: pos.left, height: height });
                    $($target2 + " span").text(nama);
                    $($target2).attr("title", nama);
                    $($target2).removeClass("hidden");
                    $($target2)
                        .closest("div")
                        .find(".info-icon-hapus")
                        .removeClass("hidden");
                }

                if ($target3 != "") {
                    $($target3).text(nama);
                }

                if ($target4 != "") {
                    if ($target4 == "custom") {
                        custTarget($target, $(this).closest("tr"));
                    }
                    $($target).closest("tr").find($target4).click();
                }
            }

            $(".c-bottom-sheet").removeClass("active");
        }
    });
}

function showInfoField(kode, isi_kode, isi_nama) {
    $("#" + kode).val(isi_kode);
    $("#" + kode).attr(
        "style",
        "border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important;color: #ffffff !important;"
    );
    $(".info-code_" + kode)
        .text(isi_kode)
        .parent("div")
        .removeClass("hidden");
    $(".info-code_" + kode).attr("title", isi_nama);
    $(".info-name_" + kode).removeClass("hidden");
    $(".info-name_" + kode).attr("title", isi_nama);
    $(".info-name_" + kode).css({ width: "68%", left: "30px" });
    $(".info-name_" + kode + " span").text(isi_nama);
    $(".info-name_" + kode)
        .closest("div")
        .find(".info-icon-hapus")
        .removeClass("hidden");
}

function reverseDate(date_str, separator = "-", newseparator = "/") {
    if (date_str == null || date_str == "") {
        var date = new Date();
        var month = "" + (date.getMonth() + 1);
        var day = "" + date.getDate();
        var year = date.getFullYear();

        if (month.length < 2) month = "0" + month;
        if (day.length < 2) day = "0" + day;
        return `${day}${newseparator}${month}${newseparator}${year}`;
    } else {
        var str = date_str.split(separator);

        return str[2] + newseparator + str[1] + newseparator + str[0];
    }
}

function reverseDateNew(date_str, separator, newseparator) {
    if (typeof separator === "undefined") {
        separator = "-";
    }
    date_str = date_str.split(" ");
    var str = date_str[0].split(separator);

    return str[2] + newseparator + str[1] + newseparator + str[0];
}

function sepNum(x) {
    var num = parseFloat(x).toFixed(0);
    var parts = num.toString().split(".");
    var len = num.toString().length;
    // parts[1] = parts[1]/(Math.pow(10, len));
    parts[0] = parts[0].replace(/(.)(?=(.{3})+$)/g, "$1.");
    return parts.join(",");
}

function toRp(num) {
    if (num < 0) {
        return "(" + sepNum(num * -1) + ")";
    } else {
        return sepNum(num);
    }
}

function toNilai(str_num) {
    var parts = str_num.split(".");
    number = parts.join("");
    number = number.replace("Rp", "");
    number = number.replace(",", ".");
    return +number;
}

function singkatNilai(num) {
    if (num < 0) {
        num = num * -1;
    }

    if (num >= 1000 && num < 1000000) {
        var str = "Rb";
        var pembagi = 1000;
    } else if (num >= 1000000 && num < 1000000000) {
        var str = "Jt";
        var pembagi = 1000000;
    } else if (num >= 1000000000 && num < 1000000000000) {
        var str = "M";
        var pembagi = 1000000000;
    } else if (num >= 1000000000000) {
        var str = "T";
        var pembagi = 1000000000000;
    }

    if (num < 0) {
        return parseFloat(num / pembagi).toFixed(0) * -1 + " " + str;
    } else if (num > 0 && num >= 1000) {
        return parseFloat(num / pembagi).toFixed(0) + " " + str;
    } else if (num > 0 && num < 1000) {
        return num;
    } else {
        return num;
    }
}

function LTrim(value) {
    if (typeof value != "string") return value;
    var re = /\s*((\S+\s*)*)/;
    return value.replace(re, "$1");
}
// Removes ending whitespaces
function RTrim(value) {
    if (typeof value != "string") return value;
    var re = /((\s*\S+)*)\s*/;
    return value.replace(re, "$1");
}

function trim(value) {
    return LTrim(RTrim(value));
}

// function terbilang(int) {
//     angka = [
//         "",
//         "satu",
//         "dua",
//         "tiga",
//         "empat",
//         "lima",
//         "enam",
//         "tujuh",
//         "delapan",
//         "sembilan",
//         "sepuluh",
//         "sebelas",
//     ];
//     int = Math.floor(int);
//     if (int < 12) return " " + angka[int];
//     else if (int < 20) return terbilang(int - 10) + " belas ";
//     else if (int < 100)
//         return terbilang(int / 10) + " puluh " + terbilang(int % 10);
//     else if (int < 200) return "seratus" + terbilang(int - 100);
//     else if (int < 1000)
//         return terbilang(int / 100) + " ratus " + terbilang(int % 100);
//     else if (int < 2000) return "seribu" + terbilang(int - 1000);
//     else if (int < 1000000)
//         return terbilang(int / 1000) + " ribu " + terbilang(int % 1000);
//     else if (int < 1000000000)
//         return terbilang(int / 1000000) + " juta " + terbilang(int % 1000000);
//     else if (int < 1000000000000)
//         return (
//             terbilang(int / 1000000) + " milyar " + terbilang(int % 1000000000)
//         );
//     else if (int >= 1000000000000)
//         return (
//             terbilang(int / 1000000) +
//             " trilyun " +
//             terbilang(int % 1000000000000)
//         );
// }

function terbilang(bilangan, curr=" Rupiah") {
    bilangan = parseInt(bilangan).toString();
    var angka = ['0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0'];
    var kata = ['','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan'];
    var tingkat = ['',' Ribu ',' Juta ',' Milyar ',' Triliun '];
    var kalimat = "";  
    var panjang_bilangan = bilangan.length;
    /* pengujian panjang bilangan */
    if (panjang_bilangan > 15) {
      kalimat = "Diluar Batas";
      return kalimat;
    }

    /* mengambil angka-angka yang ada dalam bilangan,
       dimasukkan ke dalam array */
    for (var i = 1; i <= panjang_bilangan; i++) {
      angka[i] = bilangan.substr(-i,1);
    } 
    var i = 1;
    var j = 0;
    var subkalimat,kata1,kata2,kata3;
    kalimat = "";
    /* mulai proses iterasi terhadap array angka */
    while (i <= panjang_bilangan) {
      subkalimat = "";
      kata1 = "";
      kata2 = "";
      kata3 = "";
      /* untuk ratusan */
      if (angka[i+2] != "0") {
        if (angka[i+2] == "1") {
          kata1 = " Seratus ";
        } else {
          kata1 = kata[angka[i+2]] + " Ratus ";
        }
      }

      /* untuk puluhan atau belasan */
      if (angka[i+1] != "0") {
        if (angka[i+1] == "1") {
          if (angka[i] == "0") {
            kata2 = " Sepuluh ";
          } else if (angka[i] == "1") {
            kata2 = " Sebelas ";
          } else {
            kata2 = kata[angka[i]] + " Belas ";
          }
        } else {
          kata2 = kata[angka[i+1]] + " Puluh ";
        }
      }

      /* untuk satuan */
      if (angka[i] != "0") {
        if (angka[i+1] != "1") {
          kata3 = kata[angka[i]];
        }
      }

      /* pengujian angka apakah tidak nol semua,
         lalu ditambahkan tingkat */
      if ((angka[i] != "0") || (angka[i+1] != "0") || (angka[i+2] != "0")) {
         subkalimat = kata1 + ""+kata2 + ""+kata3+""+tingkat[j];
      }
      /* gabungkan variabe sub kalimat (untuk satu blok 3 angka)
         ke variabel kalimat */
      kalimat = subkalimat + kalimat;
      i = i + 3;
      j = j + 1;

    }

    /* mengganti satu ribu jadi seribu jika diperlukan */
    if ((angka[5] == "0") && (angka[6] == "0")) {
         kalimat = kalimat.replace("Satu Ribu","Seribu");
    }
    kalimat=trim(kalimat) + curr;
    return trim(kalimat);
};

function getNamaBulan(no_bulan) {
    switch (no_bulan) {
        case 1:
        case "1":
        case "01":
            bulan = "Januari";
            break;
        case 2:
        case "2":
        case "02":
            bulan = "Februari";
            break;
        case 3:
        case "3":
        case "03":
            bulan = "Maret";
            break;
        case 4:
        case "4":
        case "04":
            bulan = "April";
            break;
        case 5:
        case "5":
        case "05":
            bulan = "Mei";
            break;
        case 6:
        case "6":
        case "06":
            bulan = "Juni";
            break;
        case 7:
        case "7":
        case "07":
            bulan = "Juli";
            break;
        case 8:
        case "8":
        case "08":
            bulan = "Agustus";
            break;
        case 9:
        case "9":
        case "09":
            bulan = "September";
            break;
        case 10:
        case "10":
        case "10":
            bulan = "Oktober";
            break;
        case 11:
        case "11":
        case "11":
            bulan = "November";
            break;
        case 12:
        case "12":
        case "12":
            bulan = "Desember";
            break;
        default:
            bulan = null;
    }

    return bulan;
}

function bulanSingkat(periode) {
    var no_bulan = periode.substr(4, 2);
    var tahun = periode.substr(2, 2);
    switch (no_bulan) {
        case 1:
        case "1":
        case "01":
            bulan = "Jan";
            break;
        case 2:
        case "2":
        case "02":
            bulan = "Feb";
            break;
        case 3:
        case "3":
        case "03":
            bulan = "Mar";
            break;
        case 4:
        case "4":
        case "04":
            bulan = "Apr";
            break;
        case 5:
        case "5":
        case "05":
            bulan = "Mei";
            break;
        case 6:
        case "6":
        case "06":
            bulan = "Jun";
            break;
        case 7:
        case "7":
        case "07":
            bulan = "Jul";
            break;
        case 8:
        case "8":
        case "08":
            bulan = "Agu";
            break;
        case 9:
        case "9":
        case "09":
            bulan = "Sep";
            break;
        case 10:
        case "10":
        case "10":
            bulan = "Okt";
            break;
        case 11:
        case "11":
        case "11":
            bulan = "Nov";
            break;
        case 12:
        case "12":
        case "12":
            bulan = "Des";
            break;
        default:
            bulan = "Des";
    }

    return bulan + "'" + tahun;
}

function clearInputFilter(par) {
    $("#" + par).val("");
    $("#" + par).attr("readonly", false);
    $("#" + par).attr(
        "style",
        "border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important"
    );
    $(".info-code_" + par)
        .parent("div")
        .addClass("hidden");
    $(".info-name_" + par).addClass("hidden");
    $("#" + par)
        .closest("div")
        .find(".info-icon-hapus")
        .addClass("hidden");
    $("#" + par).trigger("change");
}

function number_format2(number, decimal = 0, style = {}) {
    if (decimal == 0) {
        number = parseFloat(number);
    } else {
        number = parseFloat(number).toFixed(decimal);
    }

    if (isNaN(number)) {
        number = 0;
    }

    Object.assign(style, {
        minimumFractionDigits: decimal,
    });

    var formatter = new Intl.NumberFormat(["ban", "id"], style);

    return formatter.format(number);
}

function toMilyar(x, decimal = 0) {
    if (x.toString().length <= 9) {
        var nil = x / 1000000;
        return number_format(nil, decimal) + " Jt";
    } else {
        var nil = x / 1000000000;
        return number_format(nil, decimal) + " M";
    }
}

function toJuta(x, decimal = 0) {
    var nil = x / 1000000;
    return number_format(nil, decimal) + " Jt";
}

function showRptFilterBSheetServer(settings, idx, target1, tipe, aktif = null) {
    target = target1;
    var tmp = target.attr("id");
    tmp = tmp.split("-");
    var target2 = tmp[1];
    var target3 = tmp[1] + "name";

    var toUrl = settings.url[idx];
    var columns = settings.columns[idx];
    var parameter = settings.parameter[idx];
    var judul =
        "Daftar " +
        settings.nama[idx] +
        " <span class='modal-subtitle'></span>";
    pilih = settings.nama[idx];
    display = settings.display[idx];
    var field = eval("$" + settings.kode[idx]);
    var kunci = settings.kode[idx];
    var orderby = settings.orderby[idx];
    var width = settings.width[idx];
    var type = tipe;
    if (settings.pageLength != undefined) {
        if (settings.pageLength[idx] != undefined) {
            var pageLength = settings.pageLength[idx];
        } else {
            var pageLength = 10;
        }
    } else {
        var pageLength = 10;
    }

    var header_html = "";
    for (i = 0; i < settings.header[idx].length; i++) {
        header_html +=
            "<th style='" + width[i] + "'>" + settings.header[idx][i] + "</th>";
    }
    $(".c-bottom-sheet").removeClass("active");
    var content = `
    <div id="search-content">
        <div style="display: block;" class="search-header">
            <h6 class="title" style="padding-left: 1.8rem;"></h6>
            <ul class="nav nav-tabs col-12 hidden justify-content-end" style="margin-top:15px" role="tablist">
            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#list" role="tab" aria-selected="true"><span class="hidden-xs-down">Data</span></a></li>
            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#terpilih" role="tab" aria-selected="false"><span class="hidden-xs-down">Terpilih</span></a> </li>
            </ul>
        </div>
        <div class='separator'></div>
        <div class="search-body p-3" style="height: calc(75vh - 56px);position:sticky">
                    
        </div>
    </div>
    `;
    $("#content-bottom-sheet").html(content);

    $(".c-bottom-sheet__sheet").css({
        width: "50%",
        "margin-left": "25%",
        "margin-right": "25%",
    });
    var scrollsrc = document.querySelector(".search-body");
    var psscrollsrc = new PerfectScrollbar(scrollsrc);

    if (type == "range") {
        var table =
            "<table class='' width='100%' id='table-search'><thead><tr>" +
            header_html +
            "</tr></thead>";
        table +=
            "<tbody></tbody></table><table width='100%' id='table-search2'><thead><tr>" +
            header_html +
            "</tr></thead>";
        table += "<tbody></tbody></table>";
        if (!$(".search-header ul").hasClass("hidden")) {
            $(".search-header ul").addClass("hidden");
            $(".search-header").css("padding-bottom", "1.75rem");
        }
    } else if (type == "in") {
        var headerpilih_html = "";
        var width = ["25%", "70%", "5%"];
        for (i = 0; i < settings.headerpilih[idx].length; i++) {
            headerpilih_html +=
                "<th style='width:" +
                width[i] +
                "'>" +
                settings.headerpilih[idx][i] +
                "</th>";
        }

        var table =
            `
        <div class="tab-content tabcontent-border col-12 p-0">
            <div class="tab-pane active" id="list" role="tabpanel">
                <table class='' width='100%' id='table-search'><thead><tr>` +
            header_html +
            `</tr></thead>
                <tbody></tbody></table>
            </div>
            <div class="tab-pane" id="terpilih" role="tabpanel">
                <table class='' width='100%' id='table-search2'><thead><tr>` +
            headerpilih_html +
            `</tr></thead>
                <tbody></tbody></table>
            </div>
        </div>
        <button class='btn btn-primary float-right' id='btn-ok'>OK</button>`;

        $(".search-header").css("padding-bottom", "0");
        $(".search-header ul").removeClass("hidden");
    } else {
        var table =
            "<table class='' width='100%' id='table-search'><thead><tr>" +
            header_html +
            "</tr></thead>";
        table += "<tbody></tbody></table>";
        if (!$(".search-header ul").hasClass("hidden")) {
            $(".search-header ul").addClass("hidden");
            $(".search-header").css("padding-bottom", "1.75rem");
        }
    }

    table += "<tbody></tbody></table>";

    $(".search-body").html(table);

    $("#btn-ok").addClass("disabled");
    $("#btn-ok").prop("disabled", true);

    var searchTable = $("#table-search").DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        ordering: false,
        length: 10,
        sDom: '<"row view-filter"<"col-sm-12"<f>>>t<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        ajax: {
            url: toUrl,
            type: "POST",
            data: function (prm) {
                return $.extend({}, prm, parameter);
            },
        },
        columns: columns,
        order: orderby,
        drawCallback: function () {
            $($(".dataTables_wrapper .pagination li:first-of-type"))
                .find("a")
                .addClass("prev");
            $($(".dataTables_wrapper .pagination li:last-of-type"))
                .find("a")
                .addClass("next");

            $(".dataTables_wrapper .pagination").addClass("pagination-sm");
        },
        language: {
            paginate: {
                previous: "<i class='simple-icon-arrow-left'></i>",
                next: "<i class='simple-icon-arrow-right'></i>",
            },
            search: "_INPUT_",
            searchPlaceholder: "Search...",
            lengthMenu: "Items Per Page _MENU_",
        },
        pageLength: pageLength,
    });

    $(".search-header .title").html(judul);
    $("#trigger-bottom-sheet").trigger("click");
    searchTable.columns.adjust().draw();

    if (type == "range") {
        var searchTable2 = $("#table-search2").DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            ordering: false,
            length: 10,
            sDom: '<"row view-filter"<"col-sm-12"<f>>>t<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
            ajax: {
                url: toUrl,
                type: "POST",
                data: function (prm) {
                    return $.extend({}, prm, parameter);
                },
            },
            columns: columns,
            order: orderby,
            drawCallback: function () {
                $($(".dataTables_wrapper .pagination li:first-of-type"))
                    .find("a")
                    .addClass("prev");
                $($(".dataTables_wrapper .pagination li:last-of-type"))
                    .find("a")
                    .addClass("next");

                $(".dataTables_wrapper .pagination").addClass("pagination-sm");
            },
            language: {
                paginate: {
                    previous: "<i class='simple-icon-arrow-left'></i>",
                    next: "<i class='simple-icon-arrow-right'></i>",
                },
                search: "_INPUT_",
                searchPlaceholder: "Search...",
                lengthMenu: "Items Per Page _MENU_",
            },
            pageLength: pageLength,
        });

        $("#search-content .modal-subtitle").html("[Rentang Awal]");
        searchTable2.columns.adjust().draw();

        $("#table-search2_wrapper").addClass("hidden");

        $(
            "<input class='form-control mb-1' type='text' id='rentang-tag'>"
        ).insertAfter("#table-search_filter label");
        $(
            "<input class='form-control mb-1' type='text' id='rentang-tag2'>"
        ).insertAfter("#table-search2_filter label");
        $("#rentang-tag").tagsinput({
            cancelConfirmKeysOnEmpty: true,
            confirmKeys: [13],
            itemValue: "id",
            itemText: "text",
        });
        $("#rentang-tag2").tagsinput({
            cancelConfirmKeysOnEmpty: true,
            confirmKeys: [13],
            itemValue: "id",
            itemText: "text",
        });
        $("#rentang-tag").on("itemAdded", function (event) {
            $("#rentang-tag2").tagsinput("add", {
                id: event.item.id,
                text: event.item.text,
            });
        });

        $("#rentang-tag2").on("itemRemoved", function (event) {
            $("#rentang-tag").tagsinput("remove", {
                id: event.item.id,
                text: event.item.text,
            });
            var rowIndexes = [];
            searchTable.rows(function (idx, data, node) {
                if (data[kunci] === event.item.id) {
                    rowIndexes.push(idx);
                }
                return false;
            });
            searchTable.row(rowIndexes).deselect();

            $("#table-search_wrapper").removeClass("hidden");
            $("#table-search2_wrapper").addClass("hidden");
            $("#search-content .modal-subtitle").html("[Rentang Awal]");
        });
        $(".bootstrap-tagsinput").css({
            "text-align": "left",
            border: "0",
            "min-height": "41.2px",
        });
    } else if (type == "in") {
        var searchTable2 = $("#table-search2").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<f>>>t<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
            columns: columns,
            order: orderby,
            drawCallback: function () {
                $($(".dataTables_wrapper .pagination li:first-of-type"))
                    .find("a")
                    .addClass("prev");
                $($(".dataTables_wrapper .pagination li:last-of-type"))
                    .find("a")
                    .addClass("next");

                $(".dataTables_wrapper .pagination").addClass("pagination-sm");
            },
            language: {
                paginate: {
                    previous: "<i class='simple-icon-arrow-left'></i>",
                    next: "<i class='simple-icon-arrow-right'></i>",
                },
                search: "_INPUT_",
                searchPlaceholder: "Search...",
                lengthMenu: "Items Per Page _MENU_",
            },
            columnDefs: [
                {
                    targets: settings.headerpilih[idx].length - 1,
                    data: null,
                    defaultContent:
                        "<a class='hapus-item'><i class='simple-icon-trash' style='font-size:18px'></i></a>",
                },
            ],
            pageLength: pageLength,
        });
        searchTable2.columns.adjust().draw();
    }

    $("#table-search tbody").on("click", "tr", function () {
        if ($(this).hasClass("selected")) {
            $(this).removeClass("selected");
            if (type == "in") {
                var datain = searchTable.rows(".selected").data();
                if (datain.length > 1) {
                    $("#btn-ok").removeClass("disabled");
                    $("#btn-ok").prop("disabled", false);
                } else {
                    $("#btn-ok").addClass("disabled");
                    $("#btn-ok").prop("disabled", true);
                }
                searchTable2.clear().draw();
                if (typeof datain !== "undefined" && datain.length > 0) {
                    searchTable2.rows.add(datain).draw(false);
                }
            }
        } else {
            if (type == "range") {
                searchTable.$("tr.selected").removeClass("selected");
                searchTable2.$("tr.selected").removeClass("selected");
                $(this).addClass("selected");

                var kode = $(this).closest("tr").find("td:nth-child(1)").text();
                var nama = $(this).closest("tr").find("td:nth-child(2)").text();
                if (display == "kodename") {
                    $(target).val(kode + " - " + nama);
                } else if (display == "name") {
                    $(target).val(nama);
                } else {
                    $(target).val(kode);
                }

                $(target).trigger("change");
                field["from"] = kode;
                field["fromname"] = nama;

                $("#rentang-tag").tagsinput("add", {
                    id: kode,
                    text: "Rentang Awal :" + kode,
                });

                $("#table-search_wrapper").addClass("hidden");
                $("#table-search2_wrapper").removeClass("hidden");
                $("#search-content .modal-subtitle").html("[Rentang Akhir]");
            } else if (type == "in") {
                $(this).addClass("selected");
                var datain = searchTable.rows(".selected").data();
                if (datain.length > 1) {
                    $("#btn-ok").removeClass("disabled");
                    $("#btn-ok").prop("disabled", false);
                } else {
                    $("#btn-ok").addClass("disabled");
                    $("#btn-ok").prop("disabled", true);
                }
                searchTable2.clear().draw();
                if (typeof datain !== "undefined" && datain.length > 0) {
                    searchTable2.rows.add(datain).draw(false);
                }
            } else {
                searchTable.$("tr.selected").removeClass("selected");
                $(this).addClass("selected");

                var kode = $(this).closest("tr").find("td:nth-child(1)").text();
                var nama = $(this).closest("tr").find("td:nth-child(2)").text();
                if (display == "kodename") {
                    $(target).val(kode + " - " + nama);
                } else if (display == "name") {
                    $(target).val(nama);
                } else {
                    $(target).val(kode);
                }

                $(target).trigger("change");
                field[target2] = kode;
                field[target3] = nama;
                $(".c-bottom-sheet").removeClass("active");
            }
        }
    });

    $("#table-search2 tbody").on("click", "tr", function () {
        if (type == "range") {
            if ($(this).hasClass("selected")) {
                $(this).removeClass("selected");
            } else {
                searchTable.$("tr.selected").removeClass("selected");
                searchTable2.$("tr.selected").removeClass("selected");
                $(this).addClass("selected");

                var kode = $(this).closest("tr").find("td:nth-child(1)").text();
                var nama = $(this).closest("tr").find("td:nth-child(2)").text();
                if (display == "kodename") {
                    $(target).val(kode + " - " + nama);
                } else if (display == "name") {
                    $(target).val(nama);
                } else {
                    $(target).val(kode);
                }
                $(target).trigger("change");

                field["to"] = kode;
                field["toname"] = nama;
                console.log(field);

                $("#rentang-tag2").tagsinput("add", {
                    id: kode,
                    text: "Rentang akhir:" + kode,
                });

                onCloseBSheet(aktif, field, display);
                $(".c-bottom-sheet").removeClass("active");
            }
        }
    });

    $("#table-search2 tbody").on("click", ".hapus-item", function () {
        var kode = $(this).closest("tr").find("td:nth-child(1)").text();
        searchTable2.row($(this).parents("tr")).remove().draw();
        console.log("kode_akun=" + kode);
        var rowIndexes = [];
        searchTable.rows(function (idx, data, node) {
            if (data[kunci] === kode) {
                rowIndexes.push(idx);
            }
            return false;
        });
        searchTable.row(rowIndexes).deselect();
    });

    $("#search-content").on("click", "#btn-ok", function () {
        var datain = searchTable.cells(".selected", 0).data();
        console.log(datain.length);
        var kode = "";
        var nama = "";
        for (var i = 0; i < datain.length; i++) {
            if (i == 0) {
                kode += datain[i];
            } else {
                kode += "," + datain[i];
            }
        }
        $(target).val(kode);
        $(target).trigger("change");
        field[target2] = kode;
        field[target3] = kode;
        $(".c-bottom-sheet").removeClass("active");
    });
}

function generateRptFilterServer(id, settings) {
    $(id).on("change", ".sai-rpt-filter-type", function () {
        var type = $(this).val();

        var kunci = $(this)
            .closest("div.sai-rpt-filter-entry-row")
            .find(".kunci")
            .text();
        var field = eval("$" + kunci);
        var idx = settings.kode.indexOf(kunci);

        var target1 = $(this)
            .closest("div.sai-rpt-filter-entry-row")
            .find(".sai-rpt-filter-from input");
        var tmp = $(this)
            .closest("div.sai-rpt-filter-entry-row")
            .find("div > div > input")
            .last()
            .attr("class");
        var tmp = tmp.split(" ");
        datepicker = tmp.includes("datepicker");
        switch (type) {
            case "all":
                $aktif = "";
                $(this)
                    .closest("div.sai-rpt-filter-entry-row")
                    .find(".sai-rpt-filter-from")
                    .removeClass("col-md-3");
                $(this)
                    .closest("div.sai-rpt-filter-entry-row")
                    .find(".sai-rpt-filter-from")
                    .addClass("col-md-8");
                $(this)
                    .closest("div.sai-rpt-filter-entry-row")
                    .find(".sai-rpt-filter-from input")
                    .val("Menampilkan semua " + pilih);
                $(this)
                    .closest("div.sai-rpt-filter-entry-row")
                    .find(".sai-rpt-filter-to")
                    .addClass("hidden");
                $(this)
                    .closest("div.sai-rpt-filter-entry-row")
                    .find(".sai-rpt-filter-sampai")
                    .addClass("hidden");
                $(this)
                    .closest("div.sai-rpt-filter-entry-row")
                    .find(".input-group-text")
                    .removeClass("search-item");
                $(this)
                    .closest("div.sai-rpt-filter-entry-row")
                    .find(".input-group-text")
                    .text("");

                field.type = "all";
                field.from = "";
                field.to = "";
                field.fromname = "";
                field.toname = "";

                break;
            case "=":
            case "<=":
                $aktif = "";
                if (datepicker) {
                    showRptDatePickerBSheet(
                        settings,
                        idx,
                        target1,
                        type,
                        kunci
                    );
                } else {
                    showRptFilterBSheetServer(settings, idx, target1);
                }
                $(this)
                    .closest("div.sai-rpt-filter-entry-row")
                    .find(".sai-rpt-filter-from")
                    .removeClass("col-md-3");
                $(this)
                    .closest("div.sai-rpt-filter-entry-row")
                    .find(".sai-rpt-filter-from")
                    .addClass("col-md-8");
                $(this)
                    .closest("div.sai-rpt-filter-entry-row")
                    .find(".sai-rpt-filter-from input")
                    .val(field.fromname);
                $(this)
                    .closest("div.sai-rpt-filter-entry-row")
                    .find(".sai-rpt-filter-to")
                    .addClass("hidden");
                $(this)
                    .closest("div.sai-rpt-filter-entry-row")
                    .find(".sai-rpt-filter-sampai")
                    .addClass("hidden");
                $(this)
                    .closest("div.sai-rpt-filter-entry-row")
                    .find(".input-group-text")
                    .addClass("search-item");
                $(this)
                    .closest("div.sai-rpt-filter-entry-row")
                    .find(".input-group-text")
                    .text("ubah");
                field.type = type;
                field.from = field.from;
                field.to = "";
                field.fromname = field.fromname;
                field.toname = "";
                break;
            case "range":
                $aktif = $(this);
                if (datepicker) {
                    showRptDatePickerBSheet(
                        settings,
                        idx,
                        target1,
                        type,
                        kunci,
                        $aktif
                    );
                } else {
                    showRptFilterBSheetServer(
                        settings,
                        idx,
                        target1,
                        "range",
                        $aktif
                    );
                }

                break;
            case "in":
                $aktif = "";

                if (datepicker) {
                    showRptDatePickerBSheet(
                        settings,
                        idx,
                        target1,
                        type,
                        kunci
                    );
                } else {
                    showRptFilterBSheetServer(settings, idx, target1, "in");
                }
                $(this)
                    .closest("div.sai-rpt-filter-entry-row")
                    .find(".sai-rpt-filter-from")
                    .removeClass("col-md-3");
                $(this)
                    .closest("div.sai-rpt-filter-entry-row")
                    .find(".sai-rpt-filter-from")
                    .addClass("col-md-8");
                $(this)
                    .closest("div.sai-rpt-filter-entry-row")
                    .find(".sai-rpt-filter-from input")
                    .val("");
                $(this)
                    .closest("div.sai-rpt-filter-entry-row")
                    .find(".sai-rpt-filter-to")
                    .addClass("hidden");
                $(this)
                    .closest("div.sai-rpt-filter-entry-row")
                    .find(".sai-rpt-filter-sampai")
                    .addClass("hidden");
                $(this)
                    .closest("div.sai-rpt-filter-entry-row")
                    .find(".input-group-text")
                    .addClass("search-item");
                $(this)
                    .closest("div.sai-rpt-filter-entry-row")
                    .find(".input-group-text")
                    .text("ubah");

                field.type = "in";
                field.from = "";
                field.to = "";
                field.fromname = "";
                field.toname = "";

                break;
        }
    });

    $(id).on("click", ".search-item", function () {
        var kunci = $(this)
            .closest("div.sai-rpt-filter-entry-row")
            .find(".kunci")
            .text();
        var idx = settings.kode.indexOf(kunci);
        var target1 = $(this).closest(".input-group").find("input");

        var type = $(this)
            .closest("div.sai-rpt-filter-entry-row")
            .find(".sai-rpt-filter-type")[0]
            .selectize.getValue();
        var tmp = $(this)
            .closest("div.sai-rpt-filter-entry-row")
            .find("div > div > input")
            .last()
            .attr("class");
        var datepicker = tmp.split(" ");
        if (datepicker.includes("datepicker")) {
            showRptDatePickerBSheet(settings, idx, target1, type, kunci);
        } else {
            if (type == "in") {
                showRptFilterBSheetServer(settings, idx, target1, type);
            } else {
                showRptFilterBSheetServer(settings, idx, target1);
            }
        }
    });
}
