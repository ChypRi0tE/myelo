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
$("#teamForm").submit(function(){
  if ($("#inputTeamA").val() == $("#inputTeamB").val()) {
    alert('boo');
    event.preventDefault();
  }
  $("span").text("valid!").show().fadeOut( 1000 );
});
$(function()
{
    $(document).on('click', '.btn-add', function(e)
    {
        e.preventDefault();
        var controlForm = $('#formFields'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);
            newEntry.addClass('col-md-offset-3');

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="fa fa-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
        $(this).parents('.entry:first').remove();

        e.preventDefault();
        return false;
    });
});