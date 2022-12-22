

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
    data = getObjects(data);
    if (callbackArgs==undefined) {
        $.ajax({
            type: type,
            url: url,
            data: data,
            success: callback()
        })
    } else if (callbackArgs) {
        $.ajax({
            type: type,
            url: url,
            data: data,
            success: callback(callbackArgs)
        })
    }
}
function redirect(url){
    window.location.href = url;
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