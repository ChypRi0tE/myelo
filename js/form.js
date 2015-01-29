$('#datepick input').datepicker({
    format: "yyyy-mm-dd",
    clearBtn: true,	language: "fr",
    autoclose: true,
    todayHighlight: true});

$('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);

    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');})
$("#selectTeamA").change(function(){
    $("#labelTeamA").html($("#selectTeamA option:selected").text());
});
$("#selectTeamB").change(function(){
    $("#labelTeamB").html($("#selectTeamB option:selected").text());
});