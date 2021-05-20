sessionStorage.setItem('firstVisit', '1');


$(document).ready(function () {
    // $("#thover").click(function () {
    //     $(this).fadeOut();
    //     $("#tpopup").fadeOut();
    // });
    //
    // $("#tclose").click(function () {
    //     $("#thover").fadeOut();
    //     $("#tpopup").fadeOut();
    // });
    let container = $("#tpopup");
    if (!sessionStorage.getItem('firstVisit') === "1")
    {
        container.hide();
    }
});
$(document).click(function (e) {
    let container = $("#tpopup");
    if (!container.is(e.target) && container.has(e.target).length === 0) {
        container.hide();
    }
});
