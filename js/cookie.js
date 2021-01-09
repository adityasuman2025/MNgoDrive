function setCookie(name,value,mins)  {
    var now = new Date();
    var time = now.getTime();
    var expireTime = time + 60000 * mins;
    now.setTime(expireTime);
    var tempExp = 'Wed, 31 Oct 2012 08:50:17 GMT';

    document.cookie =  name + "=" + value + ";expires=" + now.toGMTString() + ";path=/";
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function eraseCookie(name)  {
    var now = new Date(); 
    document.cookie = name + '=; expires=' + now.toGMTString() + ";path=/";
}