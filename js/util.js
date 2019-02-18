/**
 * Jonathan Lucki
 * MMUNx
 * File: util.js
 * Purpose: Utility Javascript functions
 * Created: 09/02/19
 * Last Modified: 17/02/19
 */


/**
 * Makes an ajax call for the screen
 * @param url  URL of desired GET call
 * @param elementID  element ID to update
 */
function ajaxScreen(url,elementID) {

    //create XMLHttpRequest object
    var xmlhttp = new XMLHttpRequest();

    //set success function
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(elementID).innerHTML = this.responseText;
        }
    };

    //open connection
    xmlhttp.open('GET', url, true);

    //send http request
    xmlhttp.send();

}