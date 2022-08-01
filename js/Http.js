function Http() {
}
Http.prototype.post = function (url,json) {
   return new Promise((resolve, reject) => {
        let xhr = new XMLHttpRequest();
        xhr.open("POST",url,true);
        xhr.setRequestHeader('Accept', 'application/json'); 
        xhr.onreadystatechange = function () {
            if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                // let res = JSON.parse(xhr.response);
                resolve(xhr.response);
            }
            if(DEBUG) {
                if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 500) {
                    $('body').empty();
                    $('body').append(xhr.response);
                }
            }
        };
        xhr.send(json);

   }); 
};