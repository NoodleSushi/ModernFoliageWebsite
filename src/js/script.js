

/**
 *
 * @function requestHandler
 * @description this method handles requests made by the frontend to the server
 * @param {*} type type of request e.g. POST, GET, PUT, DELETE, etc.
 * @param {*} url the php file to send the request to
 * @param {*} data an array of strings containing the name attributes of inputs to get data from.
 */
function requestHandler(type, url, data){
    data = getObjects(data);
    $.ajax({
        type: type,
        url: url,
        data: data,
        success:function(html){
            alert(html);
        }
    })
}

/**
 *
 * @function getObjects
 * @description this function gets the values of the input fields
 * @param {*} inputNames
 * @return {*} 
 */
function getObjects(inputNames){
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