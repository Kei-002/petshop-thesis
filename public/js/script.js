$("#customer").change(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    const custId = $(this).val();

    $.ajax({
        type: "POST",
        url: "consults",
        data: {
            customerId: custId,
        },
        success: function (result) {
            $("#pet").empty();
            $("#pet").append(
                '<option selected disabled value="">Select</option>'
            );

            if (result && result?.status === "success") {
                result?.data?.map((pet) => {
                    const pets = `<option value='${pet?.id}'> ${pet?.pet_name} </option>`;
                    $("#pet").append(pets);
                });
            }
        },
        error: function (result) {
            console.log("error", result);
        },
    });
});