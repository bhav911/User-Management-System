document.getElementById('display_btn').addEventListener('click', function(){
  let show_btn = document.getElementById('display_btn');
  let table_div = document.getElementById('hidden_tbl');
  table_div.style.visibility = 'visible';
  show_btn.style.position = 'absolute';
  show_btn.style.visibility = 'hidden';
});

document.getElementById('man_add').addEventListener('click', function(){
  var fileInput = document.getElementById('file_add');
  if(!fileInput.value){
    window.location.href = 'addNewUser.html';
  }
  else{
    console.log('received');
  }
  return;
})


  //if anything in table gets clicked, event listener will activate
  var data_table = document.getElementById('data_table');
  data_table.addEventListener('click', function(event) {
  var target = event.target;
  let operation;
  let username = target.value;
  // to identify which button was clicked
  if (target.classList.contains('edit_btn')) {
    operation = "edit";
  }
  else if (target.classList.contains('dlt_btn')) {
    operation = "delete";
  }
  else{
    return;
  }
  //sending data(username) to php code to delete it in database
  var xhr = new XMLHttpRequest();
  if(operation === "delete"){
    xhr.open("POST", "delete.php", true);
    //removing row from wesite without need of server request
    var list = document.getElementById("data_table");
    var items = list.getElementsByTagName("td");
    function removeElementByValue(value) {
      for (var i = 0; i < items.length; i++) {
        if (items[i].textContent === value) {
          items[i].parentNode.parentNode.removeChild(items[i].parentNode);
          break; 
        }
      }
    }
    removeElementByValue(username);
  }
  else{ 
    window.location.href = `edit.php?username=${encodeURIComponent(username)}`;
    return;
  }
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  var data = "username=" + encodeURIComponent(username);
  xhr.send(data);
});

document.getElementById('search_bar').addEventListener('submit',function(event) {
  event.preventDefault(); // Prevent default form submission

  $.ajax({
    type: 'POST',
    url: 'search.php',
    data: { data: $(this).serialize() }, // Send form data
    success: function(response) {
      // Inject the response (HTML table rows) into the table's <tbody>
      $('#data_table').html(`<tr><th>Name</th><th>Username</th><th>Password</th><th>Email</th><th>Mobile Number</th><th>Birthdate</th><th>State</th><th>Gender</th><th>Edit</th><th>Delete</th><tr>${response}`);
    }
  });
});

