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
    var today = date.getDate()+ '/' + (date.getMonth()+1) + ' : 18h';
    $('.today-date').html(today);

