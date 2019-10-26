var maxId = -1;
generate_id();

function todoName() {
    var todoName = prompt("Nouvelle tâche à ajouter :");
    if (todoName)
        newTodo(todoName, -1);
}

function generate_id() {$.ajax({
    type: "POST",
    url: "select.php",
    success:function(response){
        var resJson = $.parseJSON(response);
        var keys = [];
        if (resJson[0])
            for(var i = 0; i < resJson.length; i++){
                var todo = resJson[i].split(";");
                keys.push(parseInt(todo[0]));
            }
          maxId = (keys.length === 0) ? -1 : Math.max(...keys);
    }
})};

function newTodo(todoName, id) {
    if (id === -1)
    {
        key = (maxId + 1).toString();
        maxId++;
    }
    else
        key = id;
    var prevTodo = $(".todo").val();
    var newTodo = $('<div class="todo" id="todo-'+key+'" onclick="delTodo('+ key + ')">' + todoName + '</div>');
    $('#ft_list').prepend(newTodo);
    if (id === -1)
        insertCsv(todoName, key);
}

function delTodo(key) {
    node = "#todo-" + key;
    if (confirm("Confirmer la suppression de la tâche")) {
        var toDel = $( node );
        toDel.remove();
        deleteTodo(key);
    }
}

function restoreSession() {$.ajax({
    type: "POST",
    url: "select.php",
    success:function(response){
        var resJson = $.parseJSON(response);
        if (resJson[0])
            for(var i = 0; i < resJson.length; i++){
                var todo = resJson[i].split(";");
                newTodo(todo[1], todo[0]);
            }
    }
})};

function deleteTodo(key) {
    $.post("delete.php",{id: key}, function(res) {
    });
}

function insertCsv(value, key) {
    $.post("insert.php",{todo: key + ";" + value}, function(res) {
    });
};