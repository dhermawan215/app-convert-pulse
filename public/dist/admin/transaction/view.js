var Index = (function () {
    var csrf_token = $('meta[name="csrf_token"]').attr("content");
    var table;

    var handleDataTabelUser = function () {
        table = $("#tbl-transaction").DataTable({
            responsive: true,
            autoWidth: false,
            pageLength: 15,
            searching: true,
            paging: true,
            lengthMenu: [
                [15, 25, 50],
                [15, 25, 50],
            ],
            language: {
                info: "Show _START_ - _END_ from _TOTAL_ data",
                infoEmpty: "Show 0 - 0 from 0 data",
                infoFiltered: "",
                zeroRecords: "Data not found",
                loadingRecords: "Loading...",
                processing: "Processing...",
            },
            columnsDefs: [
                { searchable: false, target: [0, 1] },
                { orderable: false, target: 0 },
            ],
            processing: true,
            serverSide: true,
            ajax: {
                url: url + "/admin/transactions",
                type: "POST",
                data: {
                    _token: csrf_token,
                },
            },
            columns: [
                { data: "rnum", orderable: false },
                { data: "id", orderable: false },
                { data: "provider", orderable: false },
                { data: "rate", orderable: false },
                { data: "pulse_amount", orderable: false },
                { data: "total_pulse", orderable: false },
                { data: "payment", orderable: false },
                { data: "acount_number", orderable: false },
                { data: "acount_name", orderable: false },
                { data: "date", orderable: false },
                { data: "status", orderable: false },
                { data: "action", orderable: false },
            ],
            drawCallback: function (settings) {},
        });

        // btn refresh on click
        $("#btn-refresh").click(function (e) {
            e.preventDefault();
            table.ajax.reload();
        });
        buttonClick();
    };

    var buttonClick = function () {
        $(document).on("click", ".btn-chg", function () {
            const dataButtons = $(this).data("button");

            $.ajax({
                type: "POST",
                url: url + "/admin/transaction/status-info",
                data: {
                    _token: csrf_token,
                    qx: dataButtons,
                },
                dataType: "json",
                success: function (response) {
                    const stsData = response.data;

                    if (stsData !== null) {
                        if (stsData === "1") {
                            $("#default-radio-1").prop("checked", true);
                        } else if (stsData === "2") {
                            $("#default-radio-2").prop("checked", true);
                        } else {
                            $("#default-radio-3").prop("checked", true);
                        }
                    }
                },
            });
            handleChangeStatus(dataButtons);
        });
    };

    var handleChangeStatus = function (vx) {
        $(document).on("change", ".custom-radios", function () {
            var statusRs = $('input[name="status_transaction"]:checked').val();
            $.ajax({
                type: "POST",
                url: url + "/admin/transaction/change",
                data: {
                    _token: csrf_token,
                    qx: vx,
                    sts: statusRs,
                },
                dataType: "json",
                success: function (response) {
                    toastr.success(response.message);
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                },
                error: function (response) {
                    $.each(response.responseJSON, function (key, value) {
                        toastr.error(value);
                    });
                },
            });
        });
    };

    return {
        init: function () {
            handleDataTabelUser();
        },
    };
})();

$(document).ready(function () {
    Index.init();
});
