/**
 * Created by ChypRiotE on 21/02/2015.
 */
if ($('#tile-add-player-last').length) {
    $(function(){
        var nb =30;
        $.ajax({
            url: 'api/player',
            type: 'GET',
            dataType: 'json',
            data : 'last=' + nb,
            success: function(response, status){
                for (var i =0; response[i]; i++) {
                    $("#tile-add-player-last > .col-sm-offset-1").append(
                        response[i].name + '<br />'
                    );
                }
            },
            error: function(response, status){
                $("#tile-add-player-last").append('<div class="alert alert-danger" id="error-message">' +
                '<strong>Erreur :</strong> Impossible de récupérer les derniers ajouts.' +
                '</div><div class="clearfix"></div>');
            }
        });
    });
}
if ($('#tile-add-team-last').length){
    $(function(){
        var nb = 10;
        $.ajax({
            url: 'api/team',
            type: 'GET',
            dataType: 'json',
            data : 'last=' + nb,
            success: function(response, status){
                for (var i =0; response[i]; i++) {
                    $("#tile-add-team-last > .col-sm-offset-1").append(
                        response[i].name + '<br />'
                    );
                }
            },
            error: function(response, status){
                $("#tile-add-team-last").append('<div class="alert alert-danger" id="error-message">' +
                '<strong>Erreur :</strong> Impossible de récupérer les derniers ajouts.' +
                '</div><div class="clearfix"></div>');
            }
        });
    });
}
if ($('#tile-add-game-last').length) {
    $(function(){
        var nb = 10;
        $.ajax({
            url: 'api/game',
            type: 'GET',
            dataType: 'json',
            data : 'last=' + nb,
            success: function(response, status){
                for (var i =0; response[i]; i++) {
                    $("#tile-add-game-last > .col-sm-offset-1").append(
                        '<strong>' + response[i].date + '</strong> ' +
                        response[i].nameA + ' vs ' + response[i].nameB + '<br />'
                    );
                }
            },
            error: function(response, status){
                $("#tile-add-game-last").append('<div class="alert alert-danger" id="error-message">' +
                '<strong>Erreur :</strong> Impossible de récupérer les derniers ajouts.' +
                '</div><div class="clearfix"></div>');
            }
        });
    })
};
if ($('#formAddPlayer').length){
    $(function(){
        $.ajax({
            url: 'api/team',
            type: 'GET',
            dataType: 'json',
            success: function(response, status){
                for (var i =0; response[i]; i++) {
                    $("#inputTeam").append(
                        '<option value="' + response[i].id + '">' +
                        response[i].name + '</option>'
                    );
                }
            },
            error: function(){alert("error");}
        });
    });
}
if ($('#formAddGame').length){
    $(function(){
        $.ajax({
            url: 'api/team',
            type: 'GET',
            dataType: 'json',
            success: function(response, status){
                for (var i =0; response[i]; i++) {
                    $("#selectTeamA").append(
                        '<option value="' + response[i].id + '">' +
                        response[i].name + '</option>'
                    );
                    $("#selectTeamB").append(
                        '<option value="' + response[i].id + '">' +
                        response[i].name + '</option>'
                    );
                }
            },
            error: function(){alert("error");}
        });
    });
    $("#selectTeamA").change(function(){
        $("#labelTeamA").html($("#selectTeamA option:selected").text());
    });
    $("#selectTeamB").change(function(){
        $("#labelTeamB").html($("#selectTeamB option:selected").text());
    });
    $('#radioBtn a').on('click', function(){
        var sel = $(this).data('title');
        var tog = $(this).data('toggle');
        $('#'+tog).prop('value', sel);

        $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
        $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
    });
    $.getScript("assets/js/plugins/datepicker.min.js",function(){
        $('#datepick input').datepicker({
            format: "yyyy-mm-dd",
            clearBtn: true,	language: "fr",
            autoclose: true,
            weekStart: 1,
            todayHighlight: true
        });
    });
};
if ($('#tile-ladder').length){
    $(function(){
        $("#error-message").remove();
        $.ajax({
            url: 'api/ranking',
            type: 'GET',
            dataType: 'json',
            success: function(response, status){
                for (var i =0; response[i]; i++) {
                    $("#tile-ladder tbody").append('<tr' + (response[i].active == '1' ? ' class="team-active"' : ' class="team-inactive"') +
                        '>' +
                        '<td>' + (i+1) + '</td>' +
                        '<td>' + response[i].name + '</td>' +
                        '<td>' + response[i].played + '</td>' +
                        '<td>' + response[i].wins + '</td>' +
                        '<td>' + response[i].losses + '</td>' +
                        '<td>' + response[i].rating + '</td>' + '</tr>'
                    );
                }
            },
            error: function(response, status){
                $("#tile-ladder").append('<div class="alert alert-danger" id="error-message">' +
                '<strong>Error :</strong> Impossible de récupérer le classement. <a onclick="getRanking()">Réessayer</a>' +
                '</div><div class="clearfix"></div>');
            }
        });
    });
    $(".hider").click(function(){
        $(".team-inactive").fadeToggle();
        $(this).toggleClass("fa-eye").toggleClass("fa-eye-slash");
        if ($(this).parent().attr("title") == "Afficher les teams inactives")
            $(this).parent().attr("title", "Masquer les teams inactives");
        else
            $(this).parent().attr("title", "Afficher les teams inactives");
    });
};
if ($('#tile-ladder-results').length){
    $(function(){
        $.ajax({
            url: 'api/game',
            type: 'GET',
            dataType: 'json',
            data: 'last=15',
            success: function(response, status){
                for (var i =0; response[i]; i++) {
                    var nA = response[i].newA - response[i].ratingA;
                    var nB = response[i].newB - response[i].ratingB;
                    $("#tile-ladder-results").append(
                        '<div class="row">' +
                        '<div class="col-xs-2 col-sm-offset-1 col-md-2 col-md-offset-0">' + response[i].date + '</div>' +
                        '<div class="col-xs-10 col-sm-9 col-md-10">' +
                        '<span ' + (response[i].result == response[i].idA ? 'class="winner"' : '') +
                        '>' + response[i].nameA + '</span>' + ' (' + (nA<0?'':'+') + nA + ') vs ' +
                        '<span ' + (response[i].result == response[i].idB ? 'class="winner"' : '') +
                        '>' + response[i].nameB + '</span>' + ' (' + (nB<0?'':'+') + nB + ')' +
                        '</div>' +
                        '</div>'
                    );
                }
            },
            error: function(response, status){
                $("#tile-results-table .glickotile-content").append('<div class="alert alert-danger" id="error-message">' +
                '<strong>Erreur :</strong> Impossible de récupérer les matchs enregistrés.' +
                '</div><div class="clearfix"></div>');
            }
        });
    });
}
function displayTeam(id) {
    $.ajax({
        url : 'api/team',
        type : 'GET',
        dataType : 'json',
        data : 'id=' + id,
        success : function(response, status){
            $("#team-page").hide();
            $("#team-name").html(response.name);
            $("#team-rating").html(response.rating + ' Elo');
            $("#team-stats").html(response.wins + " - " + response.losses + " (" + (response.wins / response.played * 100).toFixed(0) + "%)");
            $("#team-logo").attr("src", "assets/img/logo/" + response.logo + ".jpg");
            $("#team-players-list").empty();
            var players = response.players;
            for(var i =0; players[i]; i++) {
                $("#team-players-list").append(
                    '<div class="col-md-6">' +
                    '<img src="http://lkimg.zamimg.com/images/medals/'+players[i].rank+'.png" ' +
                    'title="'+players[i].league+'" class="img-circle">' +
                    (players[i].current == 0 ? "<strike>" + players[i].name + '</strike>' : players[i].name) +
                    '</div>');
                if (i % 2) {$("#team-players-list").append('<div class="clearfix"></div>');}
            }
            $('#tile-team-results tbody').empty();
            var games = response.games;
            for (var j=0; games[j]; j++) {
                $("#tile-team-results tbody").append(
                    '<tr>' +
                    '<td>' + games[j].date + '</td>' +
                    '<td>' + games[j].adversaire + ' ('+ games[j].advRating +')</td>' +
                    '<td>' + (games[j].victory == "true" ? "Victoire" : "Défaite") + '</td>' +
                    '<td>' + games[j].teamRating + ' ('+ games[j].evolution +')</td>' +
                    '</tr>');
            }
            $("#team-page").fadeIn(500);
        },
        error: function(response, status){
            $("#team-page").prepend('<div class="alert alert-danger" id="error-message">' +
            '<strong>Erreur :</strong> Impossible de récupérer les informations de l\'équipe.' +
            '</div><div class="clearfix"></div>');
        }
    });
}
if ($('#tile-team-list').length){
    $(function(){
        $.ajax({
            url: 'api/team',
            type: 'GET',
            dataType: 'json',
            success: function(response, status){
                for (var i =0; response[i]; i++) {
                    if (i === 0) displayTeam(response[i].id);
                    $("#tile-team-list > div > ul").append(
                        '<li ' + (i === 0 ? 'class="active"' : '') + '>' +
                        '<a class="toggle-team" data-team="'+ response[i].id + '">' +
                        response[i].name + '</a> </li>'
                    );
                }
            },
            error: function(response, status){
                $("#tile-team-list .glickotile-content").append('<div class="alert alert-danger" id="error-message">' +
                '<strong>Erreur :</strong> Impossible de récupérer la liste des équipes.' +
                '</div><div class="clearfix"></div>');
            }
        });
        $("#tile-team-list").on("click", ".toggle-team", function(){
            $(this).parent().addClass("active").siblings().removeClass("active");
            displayTeam($(this).attr("data-team"));
        });
    });
};
if ($('#tile-results-table').length){
    $(function(){
        $.ajax({
            url: 'api/game',
            type: 'GET',
            dataType: 'json',
            success: function(response, status){
                $("#tile-results-table tbody").empty();
                for (var i =0; (response[i] || i != 15); i++) {
                    var nA = response[i].newA - response[i].ratingA;
                    var nB = response[i].newB - response[i].ratingB;
                    $("#tile-results-table tbody").append(
                        '<tr><td>'+ response[i].date +'</td>' +
                        '<td ' + (response[i].result == response[i].idA ? 'class="winner"' : '') +
                        '>' + response[i].nameA + '</td>' +
                        '<td>'+ response[i].ratingA + ' (' + (nA<0?'':'+') + nA + ')</td>' +
                        '<td ' + (response[i].result == response[i].idB ? 'class="winner"' : '') +
                        '>'  + response[i].nameB + '</td>' +
                        '<td>' + response[i].ratingB + ' (' + (nB<0?'':'+') + nB + ')</td>' +
                        '</tr>'
                    );
                }
            },
            error: function(response, status){
                $("#tile-results-table .glickotile-content").append('<div class="alert alert-danger" id="error-message">' +
                '<strong>Erreur :</strong> Impossible de récupérer les matchs enregistrés.' +
                '</div><div class="clearfix"></div>');
            }
        });
    });
};
$(document).ready(function() {
    if ($('footer').position().top < $(window).height()) {
        $('#content').css('min-height', ($(window).height() - $('header').height() -132) + 'px');
    }
    $('.navbar-toggler').on('click', function(event) {
        event.preventDefault();
        $(this).closest('.navbar-minimal').toggleClass('open');
        $(this).children().children().toggleClass("fa-list").toggleClass("fa-th-large");
    })

    //I am very lazy
    $(".team-inactive").fadeToggle();
    $(this).toggleClass("fa-eye").toggleClass("fa-eye-slash");
    if ($(this).parent().attr("title") == "Afficher les teams inactives")
        $(this).parent().attr("title", "Masquer les teams inactives");
    else
        $(this).parent().attr("title", "Afficher les teams inactives");
});
$( window ).resize(function() {
    if ($('footer').position().top < $(window).height()) {
        $('#content').css('min-height', ($(window).height() - $('header').height() -132) + 'px');
    }
});
