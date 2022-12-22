
//index.php
function submitLogin() {
    var form = document.getElementById("signinForm");
    if ($('#signinForm')[0].checkValidity()) {
        let data = getObjects(['email', 'password']);
        requestHandler('POST', '../src/php/signin_action.php', data, redirectJquery, 'home.php');
    }
}

//home.php

function getData(){
    requestHandler('GET', '../src/php/prod_list.php', null, populateDataCallback, null);
}

function populateDataCallback(data){
    data = JSON.parse(data);
    addToPage(data.products);
}

function addToPage(data){
    var html = '';
    console.log(data)
    data.forEach(element => {
        html += `<div class="card">
                    <img src="${element.image}" alt="${element.name}">
                    <h3>${element.name}</h3>
                    <p>${element.description}</p>
                    <p>${element.price}</p>
                    <button class="btn btn-primary" onclick="addToCart('${element.id}')">Add to Cart</button>
                </div>`;
    });
    $('#products').html(html);
}


/**
 * 
 * @function requestHandler
 * @description this method handles requests made by the frontend to the server
 * @param {*} type type of request e.g. POST, GET, PUT, DELETE, etc.
 * @param {*} url the php file to send the request to
 * @param {*} data an array of strings containing the name attributes of inputs to get data from.
 * @param {*} callback a function to be called after the request is successful
 * @param {*} callbackArgs arguments to be passed to the callback function
 */
function requestHandler(type, url, data, callback, callbackArgs) {
    if (!callback) {
        callback = function () {
            console.log("request completed");
        }
    }
    if (callbackArgs == undefined) {
        $.ajax({
            type: type,
            url: url,
            data: data,
            success: function (response) { callback(response) }
        })
    } else if (callbackArgs) {
        $.ajax({
            type: type,
            url: url,
            data: data,
            success: function (res) {
                var response = JSON.parse(res);
                if (response.status == 200) {
                    callback(callbackArgs)
                } else {
                    alert('You have entered an invalid email or password')
                    console.log(response)
                }
            }
        })
    }
}
function redirect(url) {
    if (url[1] == 'replace') {
        window.location.replace = url[0];
    }
    else {
        window.location.href = url[0];
    }
}

function redirectJquery(url) {
    jQuery(window).attr("location", url);
}

/**
 *
 * @function getObjects
 * @description this function gets the values of the input fields
 * @param {*} inputNames
 * @return {*} 
 */
function getObjects(inputNames) {
    var obj = {};
    inputNames.forEach(element => {
        obj[element] = $(`#${element}`).val();
    });
    return obj;
}

// function myAjax() {
    // $.ajax({
        //  type: "POST",
        //  url: 'your_url/ajax.php',
        //  data:{action:'call_this'},
        //  success:function(html) {
        //    alert(html);
        //  }
// 
    // });
// }