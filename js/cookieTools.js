//添加cookie
function addCookie(key, value, dayCount, path, domain) {
    let d = new Date();
    d.setDate(d.getDate() + dayCount);

    //escape（）：编码
    let str = `${key}=${escape(value)};expires=${d.toGMTString()}`;
    if (path != undefined) {
        str += `;path=${path}`;
    }

    if (domain != undefined) {
        str += `;domain=${domain}`;
    }
    document.cookie = str;
}


//获取cookie的值


function getCookie(key) {
    //document.cookie的示例： usernamet=hi; username=jzm; userpass=123
    var str = unescape(document.cookie); //unescape:解码
    //1、分割成数组
    let arr = str.split("; "); //arr=["usernamet=hi","username=jzm","userpass=123"];
    //2、循环arr，
    for (var i in arr) {
        if (arr[i].startsWith(key + "=")) {
            let [, value] = arr[i].split("="); //["username","jzm"]
            return value;
        }
    }
    return null;
}
removeCookie(key,value=1,dayCount=-1,path='/', domain)
//删除cookie
function removeCookie(key,value=1,dayCount=-1,path='/', domain) {
    addCookie(key, value,dayCount,path,domain);
}


