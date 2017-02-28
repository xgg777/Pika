/**
 * ÃÌº”“ª––
 */
var addrowdirect = 0;
function addRow(obj, type, rowtypedata) {
    var table = $(obj);
    var ele = table.find("tbody").get(0);
    if(addrowdirect == 0) {
        $("#recordList").children().remove();
    }
    var row = table.find("tbody").get(0).insertRow(-1);
    row.className = 'hover';
    var typedata = rowtypedata[type];
    for(var i = 0; i <= typedata.length - 1; i++) {
        var cell = row.insertCell(i);
        cell.colSpan = typedata[i][0];
        var tmp = typedata[i][1];
        if(typedata[i][2]) {
            cell.className = typedata[i][2];
        }
        tmp = tmp.replace(/\{(\d+)\}/g, function($1, $2) {return addrow.arguments[parseInt($2) + 1];});
        cell.innerHTML = tmp;
    }
    addrowdirect++;
}