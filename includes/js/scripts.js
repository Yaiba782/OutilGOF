/**
 * Created by Yaiba on 22/02/2016.
 */
    /*
    *
    * Initializes the search filter for the tables
    *
    * */
    $('.table-materiel ').filterTable();

    /*
    *
    * Sets today's date in a specific field
    *
    * */
    var date = new Date();
    if (date.getMonth()+1 <10){
        var month = '0'+ (date.getMonth()+1);
    }else{
        var month = (date.getMonth()+ 1);
    }

    var today = date.getDate()+ '/' + month + ' : 15h';
    $('.today-date').html(today);

