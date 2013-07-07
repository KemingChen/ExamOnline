var problem;
var sections;
var pointer;
var data;

function cut(){
    data = $("#input").val().replace(/[\r\n]/g, "");
    data = data.replace(/（'\d+ .{0,8}）/g, "\n")
    sections = data.match(/\([ABCD]\)[^\n]*/g);
    pointer = -1;
    look(1);
}

function look(add){
    pointer = pointer+add<sections.length&&pointer+add>=0 ? pointer+add : pointer;
    $("#iSegment").val("{0}/{1}".format(pointer+1, sections.length));
    $("#input").val(sections[pointer]);
    preview();
}

function preview(){
    var input = $("#input").val();
    console.log(input);
    problem = dealInput(input);
    
    var result = $("#result");
    result.empty();
    for(var key in problem){
        result.append("{0}: {1}<br />".format(key, problem[key]));
    }
}

function save(){
    param = {
        action: "save",
        ans: problem["ans"],
        problem: problem["problem"],
        option1: problem["option1"],
        option2: problem["option2"],
        option3: problem["option3"],
        option4: problem["option4"]
    };
    $.ajax({
        type: "POST",
        url: "Database.php",
        data: param
    }).done(function(msg) {
        $("#result").empty();
        $("#input").val('');
    });
}

function make(){
    if($("#filename").val().replace(/ /g, "").length == 0){
        alert("無檔名");
        return;
    }
    param = {
        action: "make",
        name: $("#filename").val()
    };
    $.ajax({
        type: "POST",
        url: "Database.php",
        data: param
    }).done(function(msg) {
        $("#result").empty();
        $("#input").val('');
        alert(msg);
    });
}

function clearTemp(){
    param = {
        action: "clear"
    };
    $.ajax({
        type: "POST",
        url: "Database.php",
        data: param
    }).done(function(msg) {
        $("#result").empty();
        $("#input").val('');
        alert("完成");
        console.log(msg);
    });
}

function dealInput(data){
    data = data.replace(/[\r\n]/g, "");
    result = [];
    result["ans"] = data.match(/\([ABCD]\)/)[0].replace(/[\(\)]/g, "");
    data = data.match(/\d+.[^]*/)[0];
    result["problem"] = data.match(/(\d+.[^]*)\(A\)/)[1];
    result["option1"] = data.match(/(\(A\)[^]*)\(B\)/)[1];
    result["option2"] = data.match(/(\(B\)[^]*)\(C\)/)[1];
    result["option3"] = data.match(/(\(C\)[^]*)\(D\)/)[1];
    result["option4"] = data.match(/(\(D\)[^]*)。/)[1];
    return result;
}