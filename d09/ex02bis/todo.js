function todoName() {
    var todoName = prompt("Nouvelle tâche à ajouter :");
    if (todoName)
        newTodo(todoName, -1);
}

function newTodo(todoName, key) {
    var prevTodo = $(".todo").val();
    if (key === -1) {
        i = 0;
        key = 0;
        var save = Object.keys(localStorage);
        save.sort(function(a, b){return a-b});
        while (save[i]) {
            key = save[i];
            key++;
            i++;
        }
    }
    var newTodo = $('<div class="todo" id="todo-'+key+'" onclick="delTodo('+ key + ')">' + todoName + '</div>');
    if (prevTodo)
        prevTodo.prepend(newTodo);
    else
        $('#ft_list').prepend(newTodo);
    localStorage.setItem(key, todoName);
}

function delTodo(key) {
    node = "#todo-" + key;
    if (confirm("Confirmer la suppression de la tâche")) {
        var toDel = $( node );
        toDel.remove();
        localStorage.removeItem(key);
    }
}

function restoreSession() {
    var todoName;
    var save = Object.keys(localStorage);
    save.sort(function(a, b){return a-b});
    for (var i = 0; save[i]; i++) {
        todoName = localStorage.getItem(save[i]);
        newTodo(todoName, save[i]);
    }
}