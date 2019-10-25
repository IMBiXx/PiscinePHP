function todoName() {
    var todoName = prompt("Nouvelle tâche à ajouter :");
    if (todoName)
        newTodo(todoName, -1);
}

function newTodo(todoName, key) {
    var newTodo = document.createElement("div");
    newTodo.setAttribute("class", "todo");
    newTodo.appendChild(document.createTextNode(todoName));
    var prevTodo = document.getElementsByClassName("todo");
    if (key === -1) {
        i = 0;
        key = 0;
        var save = Object.keys(localStorage);
        save.sort(function(a, b){return a-b});
        console.log(save);
        while (save[i]) {
            key = save[i];
            key++;
            console.log("add key: " + key + " save[i]: " + save[i]);
            i++;
        }
    }
    var todoId = "todo-" + key;
    newTodo.setAttribute("id", todoId);
    var click = "delTodo(" + key + ");";
    newTodo.setAttribute("onclick", click);
    if (prevTodo[0]) {
        prevTodo = prevTodo[0];
        var ft_list = prevTodo.parentNode;
        ft_list.insertBefore(newTodo, prevTodo);
    }
    else {
        document.getElementById("ft_list").appendChild(newTodo);
    }
        localStorage.setItem(key, todoName);
}

function delTodo(key) {
    node = "todo-" + key;
    if (confirm("Confirmer la suppression de la tâche")) {
        var toDel = document.getElementById(node);
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