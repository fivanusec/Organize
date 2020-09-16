function disable(id) {
    $("#item" + id).prop('disabled', true);
    if ($("#item" + id).is(":checked")) {
        $("#text" + id).addClass(" disable");
    }
}