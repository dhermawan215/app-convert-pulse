var Index = (function () {
    var csrf_token = $('meta[name="csrf_token"]').attr("content");
    var handleAdd = function () {
        $("#form-add-rate").submit(function (e) {
            e.preventDefault();
            const form = $(this);
            let formData = new FormData(form[0]);

            $.ajax({
                url: `${url}/admin/rate-pricing/save`,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (responses) {
                    toastr.success(responses.message);

                    setTimeout(() => {
                        window.location.href = responses.url;
                    }, 2000);
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
            handleAdd();
        },
    };
})();

$(document).ready(function () {
    Index.init();
});
