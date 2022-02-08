
//Create Users
(function ($) {
  $(document).on('click', '#create', function(){
    console.log("i am here");
    var first_name = $("#firstname").val();
		var last_name = $("#lastname").val();
		var email = $("#email").val();
		var password = $("#password").val();
    var designation = $("#designation").val();
    var permission_level = '';
    var dept = $("#dept").val();
    var storage = $("#storage").val();
    var totalfiles = document.getElementById('files').files.length;
    switch(designation){
      case "HOD":
        permission_level = 1;
      break;
      case "VC":
        permission_level = 1;
      break;
      case "ADMIN":
        permission_level = 4;
      break;
      case "SECRETARY":
        permission_level = 2;
      break;
      case "MANAGER":
        permission_level = 3;
      break;
      default:
        permission_level = 3;
      break;
    }

    if(first_name != "" && last_name != ""){

      if(designation == 'Admin'){
        permission_level = 3;
      }else{
        permission_level = 2;
      }

      var fd = new FormData();
      if (totalfiles > 0) {
         fd.append("files", document.getElementById('files').files[0]);
       }
      fd.append('request', 1);
      fd.append('firstname', first_name);
      fd.append('lastname', last_name);
      fd.append('email', email);
      fd.append('password', password);
      fd.append('designation',designation);
      fd.append('permission', permission_level);
      fd.append('dept', dept);
      fd.append('storage', storage);
      // console.log(document.getElementById('files').files[0]);
  
      // AJAX request
      $.ajax({
        url: 'createusers/createusers',
        type: 'post',
        data:fd,
        contentType: false,
        processData: false,
        dataType: 'json',
        beforeSend: function(){
          document.getElementById("create").innerHTML="<img src='assets/media/image/loading.gif' width='20px' height='20px'/> Processing";
          document.getElementById("create").disable='true';
        },
        success:function(response){
          if(response.status == 1){
            document.getElementById("output_text").innerHTML="New User successfully added!";
            alert(response.message);
            document.getElementById("create-user").reset();
          }else{     
              alert(response.message);               			
              document.getElementById("output_text").innerHTML="Oops!, we couldn't complete your request";
          }
        },
        complete: function(data){
          document.getElementById("create").innerHTML='Submit report';
          document.getElementById("create").disable='false';
        },

      });
    }
  })

  // Login Users
  $(document).on('click', '#login', function(){
    var email = $("#email").val();
    var password = $("#password").val();

    if(email != "" && password != ""){

      var fd = new FormData();

      fd.append('request', 3);
      fd.append('email', email);
      fd.append('password', password);

      $.ajax({
        url: 'login/auth',
        type: 'post',
        data:fd,
        contentType: false,
        processData: false,
        dataType: 'json',
        beforeSend: function(){
          document.getElementById("login").innerHTML="<img src='assets/media/image/loading.gif' width='20px' height='20px'> Processing";
          document.getElementById("login").disable = 'true';
        },
        success:function(response){
          if(response.status == 1){
            document.getElementById("invalid-text").innerHTML= '';       
            console.log('Authentication Successful');
            window.location.assign("../fileHub");
            document.getElementById("login-form").reset();
          }else{ 
            document.getElementById("invalid-text").innerHTML= response.message;                   			
            console.log('could not fetch response from server');
          }
        },
        complete: function(data){
          document.getElementById("login").innerHTML='Sign in';
          document.getElementById("login").disable='false';
          console.log("Query Completed!");
          // document.getElementById("invalid-text").innerHTML= '' ;
        },

      });
    }else{
      document.getElementById("inavild-text").innerHTML="Oops! empty fields detected.";
    }
  })
  // Update Users
  $(document).on('click', '#update', function(){
    var id =  $("#eid").val();
    var first_name = $("#efirstname").val();
		var last_name = $("#elastname").val();
		var email = $("#eemail").val();
		var password = $("#epassword").val();
    var designation = $("#edesignation").val();
    var storage = $("#estorage").val();
    var dept = $("#edept").val();

    if(id != "" && email != ""){

      var fd = new FormData();

      fd.append('request', 4);
      fd.append('id', id);
      fd.append('firstname', first_name);
      fd.append('lastname', last_name);
      fd.append('email', email);
      fd.append('password', password);
      fd.append('designation',designation);
      fd.append('dept',dept);
      fd.append('storage',storage);

      $.ajax({
        url: 'updateusers/edituser',
        type: 'post',
        data:fd,
        contentType: false,
        processData: false,
        dataType: 'json',
        beforeSend: function(){
          document.getElementById("update").innerHTML='<img src="assets/media/image/loading.gif" width="20px" height="20px"> Processing';
          document.getElementById("update").disable = 'true';
        },
        success:function(response){
          if(response.status == 1){      
            console.log('User Updated');
            $('#exampleModal').modal('hide');
            alert('User Data Updated');
            // document.getElementById("update-form").reset();
          }else{                    			
            console.log('could not fetch response from server' + response.message);
          }
        },
        complete: function(data){
          document.getElementById("update").innerHTML='Save Changes';
          document.getElementById("update").disable='false';
          console.log("ok");
        },

      });
    }else{
      document.getElementById("invalid-text").innerHTML="Oops! empty fields detected.";
      console.log("Blank Fields");
    }
  })
  //Upload Files
  // $(document).on('click', '#upload-file', function(){
  //   var total_files = document.getElementById('files').files.length;
  //   var file_status = 0;

  //   var fd = new FormData();
    

  //   if(total_files > 0){
  //     file_status = 1;
  //     for(var index = 0; index < total_files; index++){
  //       fd.append("files[]", document.getElementById('file_items').files[index]);
  //     }

  //     fd.append('request', 8);
  //     fd.append('file_status',file_status);

  //     $.ajax({
  //       url: 'file-manager/fileupload',
  //       type: 'post',
  //       data:fd,
  //       contentType: false,
  //       processData: false,
  //       dataType: 'json',
  //       beforeSend: function(){
  //         /*
  //           Create an html content above the file manager page to show progress
  //           and callback message
  //         */
  //         document.getElementById("upload-file").innerHTML='<img src="assets/media/image/loading.gif" width="20px" height="20px"> Processing';
  //         document.getElementById("upload-file").disable = 'true';
  //       },
  //       success:function(response){
  //         if(response.status == 1){      
  //           console.log('File(s) uploaded');
  //           document.getElementById("fileupload-form").reset();
  //         }else{                    			
  //           console.log('could not fetch response from server' + response.message);
  //         }
  //       },
  //       complete: function(data){
  //         document.getElementById("upload-file").innerHTML='<img src="assets/media/image/loading.gif" width="20px" height="20px"> Processing';
  //         document.getElementById("upload-file").disable='false';
  //         console.log("Done");
  //       },

  //     });
  //   }else{
  //     document.getElementById("invalid-text").innerHTML="Oops! empty fields detected.";
  //     console.log("Blank Fields");
  //   }
  // })

  //Update Files Orig
  $(document).on('submit', '#upload-file', function(){
    var total_files = document.getElementById('files').files.length;

    console.log(total_files);
    // var file_status = 0;

    // var fd = new FormData();
    

    // if(total_files > 0){
    //   file_status = 1;
    //   for(var index = 0; index < total_files; index++){
    //     fd.append("files[]", document.getElementById('file_items').files[index]);
    //   }

    //   fd.append('request', 8);
    //   fd.append('file_status',file_status);

    //   $.ajax({
    //     url: 'file-manager/fileupload',
    //     type: 'post',
    //     data:fd,
    //     contentType: false,
    //     processData: false,
    //     dataType: 'json',
    //     beforeSend: function(){
    //       /*
    //         Create an html content above the file manager page to show progress
    //         and callback message
    //       */
    //       document.getElementById("upload-file").innerHTML='<img src="assets/media/image/loading.gif" width="20px" height="20px"> Processing';
    //       document.getElementById("upload-file").disable = 'true';
    //     },
    //     success:function(response){
    //       if(response.status == 1){      
    //         console.log('File(s) uploaded');
    //         document.getElementById("fileupload-form").reset();
    //       }else{                    			
    //         console.log('could not fetch response from server' + response.message);
    //       }
    //     },
    //     complete: function(data){
    //       document.getElementById("upload-file").innerHTML='<img src="assets/media/image/loading.gif" width="20px" height="20px"> Processing';
    //       document.getElementById("upload-file").disable='false';
    //       console.log("Done");
    //     },

    //   });
    // }else{
    //   document.getElementById("invalid-text").innerHTML="Oops! empty fields detected.";
    //   console.log("Blank Fields");
    // }
  })


  //Add Folder
   $(document).on('click', '#add-folder', function(){
    var folder =  $("#folder").val();

    if(folder != ""){

      var fd = new FormData();

      fd.append('request', 9);
      fd.append('folder', folder);

      $.ajax({
        url: 'filemanager/addfolder',
        type: 'post',
        data:fd,
        contentType: false,
        processData: false,
        dataType: 'json',
        beforeSend: function(){
          document.getElementById("add-folder").innerHTML='<img src="assets/media/image/loading.gif" width="20px" height="20px"> Processing';
          document.getElementById("add-folder").disable = 'true';
        },
        success:function(response){
          if(response.status == 1){      
            console.log('Folder Added');
            $('#folderModal').modal('hide');
            document.getElementById("folder-form").reset();
          }else{                    			
            console.log('could not fetch response from server' + response.message);
          }
        },
        complete: function(data){
          document.getElementById("add-folder").innerHTML='Save Changes';
          document.getElementById("add-folder").disable='false';
          console.log("Query completed");
        },

      });
    }else{
      document.getElementById("invalid-feedback").innerHTML="Oops! empty fields detected.";
      console.log("Blank Fields");
    }
  })

  //SHARE FILES
  // $(document).on('click', '#share_file', function(){
  //   var file_id =  document.getElementById("file_id").innerHTML;
  //   var file_name = document.getElementById("file_name").innerHTML
	// 	var digi_id =document.getElementById("digi_id").innerHTML
	// 	var sender = document.getElementById("sender").innerHTML
	// 	var receiver = document.getElementById("receiver").innerHTML
  //   var request_signature = document.getElementById("request_signature").innerHTML
  //   var request_approval = document.getElementById("request_approval").innerHTML
  //   var comment = document.getElementById("comment").innerHTML
  //   var status = document.getElementById("status").innerHTML
  //   var date_signed = document.getElementById("date_signed").innerHTML
  //   var date_approved = document.getElementById("date_approved").innerHTML



  //   if(file_id != "" && file_name != "", uploaded_by !== "" && file_type !== ""){

  //     var fd = new FormData();

  //     fd.append('request', 4);
  //     fd.append('file_id', file_id);
  //     fd.append('digi_id', digi_id);
  //     fd.append('file_name', file_name);
  //     fd.append('sender', sender);
  //     fd.append('receiver', receiver);
  //     fd.append('request_signature',request_signature);
  //     fd.append('request_approval',request_approval);
  //     fd.append('comment',comment);
  //     fd.append('status',status);
  //     fd.append('date_signed',date_signed);
  //     fd.append('date_approved',date_approved);

  //     $.ajax({
  //       url: 'filemanager/ashare',
  //       type: 'post',
  //       data:fd,
  //       contentType: false,
  //       processData: false,
  //       dataType: 'json',
  //       beforeSend: function(){
  //         document.getElementById("update").innerHTML='<img src="assets/media/image/loading.gif" width="20px" height="20px"> Processing';
  //         document.getElementById("update").disable = 'true';
  //       },
  //       success:function(response){
  //         if(response.status == 1){      
  //           console.log('User Updated');
  //           alert("File Shared!");
  //           document.getElementById("update-form").reset();
  //         }else{                    			
  //           console.log('could not fetch response from server' + response.message);
  //         }
  //       },
  //       complete: function(data){
  //         document.getElementById("update").innerHTML='Save Changes';
  //         document.getElementById("update").disable='false';
  //         console.log("ok");
  //       },

  //     });
  //   }else{
  //     document.getElementById("invalid-text").innerHTML="Oops! empty fields detected.";
  //     console.log("Blank Fields");
  //   }
  // })

})(jQuery);

function fetchUser(id){
  // document.getElementById("user-msg").innerHTML="<p>Taddar!, i'M WORKING</p>"
  if(id !== ""){
    var fd = new FormData();
  
      fd.append('request', 2);
      fd.append('id', id);
      $.ajax({
        url: 'updateusers/idfetchuser',
        type: 'post',
        data:fd,
        contentType: false,
        processData: false,
        dataType: 'json',
        beforeSend: function(){
          document.getElementById("fetch-user").innerHTML = ""
          document.getElementById("fetch-user").innerHTML='<img src="assets/media/image/loading.gif" width="20px" height="20px"> Processing';
        },
        success:function(response){
          if(response.status == 1){
            $('#exampleModal').modal('show');
            console.log('great');
          }else{                    			
              console.log('could not fetch response from server');
          }
        },
        complete: function(data){
          document.getElementById("fetch-user").innerHTML="<i class='fa fa-external-link'></i>";
          $('#edesignation').val(data.responseJSON.designation);
          $('#efirstname').val(data.responseJSON.first_name);
          $('#elastname').val(data.responseJSON.last_name);
          $('#eemail').val(data.responseJSON.email);
          $('#epassword').val(data.responseJSON.password);
          $('#edept').val(data.responseJSON.dept);
          $('#estorage').val(data.responseJSON.storage);
          $('#eid').val(data.responseJSON.id);
        },

      });
  }
}
function deleteUser(id){
  if(id !== ""){
    var fd = new FormData();
    
    fd.append('request', 5);
    fd.append('id', id);
    $.ajax({
      url: 'updateusers/deleteuser',
      type: 'post',
      data:fd,
      contentType: false,
      processData: false,
      dataType: 'json',
      beforeSend: function(){
        document.getElementById("delete"+id).innerHTML = ""
        document.getElementById("delete"+id).innerHTML='<img src="assets/media/image/loading.gif" width="20px" height="20px"> Processing';
      },
      success:function(response){
        if(response.status == 1){
          $("#"+id).remove().fadeOut(2500);
          console.log(response.message);
          alert(response.message);
        }else{                    			
            console.log('could not resolve your request');
        }
      },
      complete: function(data){
        console.log('User Deleted')
      },

    });
  }
}
//Delete File
function deleteFile(id){
  if(id !== ""){

    var creator =  $("#creator"+id).val();

    var fd = new FormData();
    
    fd.append('request', 10);
    fd.append('id', id);
    fd.append('creator', creator);

    $.ajax({
      url: 'filemanager/d',
      type: 'post',
      data:fd,
      contentType: false,
      processData: false,
      dataType: 'json',
      beforeSend: function(){
        document.getElementById("delete"+id).innerHTML = ""
        document.getElementById("delete"+id).innerHTML='<img src="assets/media/image/loading.gif" width="20px" height="20px"> Processing';
      },
      success:function(response){
        if(response.status == 1){
          $("#"+id).remove().fadeOut(2500);
          console.log(response.message);
          alert(response.message);
        }else{                    			
            console.log('unable not complete your request');
        }
      },
      complete: function(data){
        console.log('File Deleted')
      },

    });
  }
}
function inspectFile(id){
  if(id !== ""){

    var fd = new FormData();
    
    fd.append('request', 11);
    fd.append('id', id);

    $.ajax({
      url: 'filemanager/i',
      type: 'post',
      data:fd,
      contentType: false,
      processData: false,
      dataType: 'json',
      beforeSend: function(){
        document.getElementById("status").innerHTML = ""
        document.getElementById("status").innerHTML='<img src="assets/media/image/loading.gif" width="20px" height="20px"> Processing';
      },
      success:function(response){
        if(response.status == 1){
          document.getElementById('file_name').innerHTML = (response.file_name);
          document.getElementById('file_size').innerHTML = (response.file_size);
          document.getElementById('file_type').innerHTML = (response.file_type);
          document.getElementById('file_id').innerHTML = (response.file_id);
          document.getElementById('category').innerHTML = (response.category);
          document.getElementById('date_uploaded').innerHTML = (response.date_added);
          document.getElementById('uploaded_by').innerHTML = (response.uploaded_by);
        }else{                    			
            alert('Data not found');
        }
      },
      complete: function(data){
        document.getElementById("status").innerHTML = "Done"
        console.log('Query completed');
        // $('#edesignation').val(data.responseJSON.file_name);
        // $('#edesignation').val(data.responseJSON.file_id);
      },

    });
  }
}

// //SHARE FILES
// function sharefiles(action){
//     var file_id =  document.getElementById("file_id").innerHTML;
//     var file_name = document.getElementById("file_name").innerHTML;
//     var receiver =  $("#receiver").val();
//     var request_signature = "";
//     var request_approval = "";
//     var comment = $("#comment").val();
//     var status = "pending";
//     var btn = "";
//     var btnout = "";
//     var url_t = "";
//     console.log(file_id);

//     switch(action){
//       case "request_signature":
//         request_signature = "requested";
//         console.log("signature");
//         btn = "requests";
//         break;
//       case "request_approval":
//         request_approval = "requested";
//         btn = "requesta";
//         break;
//       case "share":
//         status = "share";
//         btn = "share";
//         break;
//       default:
//         status = "share";
//         btn = "shared";
//         break;
//     }
//     console.log(btn);
//     if(file_id !== "" && uploaded_by !== "" && file_type !== "" && receiver !== "Select Receiver"){

//       //Split the action based on request
//       // if(request_approval == "requested"){
//       //  url_t = "filemanager/ashare";
//       // }
//       // if(request_signature == "requested"){
//       //   url_t = "digit";
//       // }
//       var fd = new FormData();

//       fd.append('request', 12);
//       fd.append('file_id', file_id);
//       fd.append('file_name', file_name);
//       fd.append('receiver', receiver);
//       fd.append('request_signature', request_signature);
//       fd.append('request_approval', request_approval);
//       fd.append('comment', comment);
//       fd.append('status', status);
//       $.ajax({
//         url: 'digit',
//         type: 'post',
//         data:fd,
//         contentType: false,
//         processData: false,
//         dataType: 'json',
//         beforeSend: function(){
//           btnout = document.getElementById(btn).innerHTML
//           document.getElementById(btn).innerHTML='<img src="assets/media/image/loading.gif" width="20px" height="20px"> Processing';
//           document.getElementById(btn).disable = 'true';
//         },
//         success:function(response){
//           if(response.status == 1){      
//             console.log('File Shared');
//             $('#share-modal').modal('hide');
//             toastr.options = {
//               timeOut: 3000,
//               progressBar: true,
//               showMethod: "slideDown",
//               hideMethod: "slideUp",
//               showDuration: 200,
//               hideDuration: 200
//             };
//             toastr.success('Signature Requested!');
//             // alert(response.message);
//             // document.getElementById("update-form").reset();
//           }else{        
//             toastr.options = {
//               timeOut: 3000,
//               progressBar: true,
//               showMethod: "slideDown",
//               hideMethod: "slideUp",
//               showDuration: 200,
//               hideDuration: 200
//             };
//             toastr.danger('Signature Request Failed!');            			
//             console.log('could not fetch response from server' + response.message);
//           }
//         },
//         complete: function(data){
//           document.getElementById(btn).innerHTML= btnout;
//           document.getElementById(btn).disable='false';
//           console.log("ok");
//         },

//       });
//     }else{
//       document.getElementById("invalid-text").innerHTML="Oops! empty fields detected.";
//       console.log("Blank Fields");
//     }
// }

//ADD FILES TO FOLDER
function fileToFolder(category, file_id){
  if(category !== "" && file_id !== ""){

    var fd = new FormData();
    
    fd.append('request', 15);
    fd.append('category', category);
    fd.append('file_id', file_id);

    $.ajax({
      url: 'filemanager/i',
      type: 'post',
      data:fd,
      contentType: false,
      processData: false,
      dataType: 'json',
      beforeSend: function(){
        document.getElementById("status").innerHTML = ""
        document.getElementById("status").innerHTML='<img src="assets/media/image/loading.gif" width="20px" height="20px"> Processing';
      },
      success:function(response){
        if(response.status == 1){
          document.getElementById('uploaded_by').innerHTML = (response.uploaded_by);
        }else{                    			
            alert('Data not found');
        }
      },
      complete: function(data){
        document.getElementById("status").innerHTML = "Done"
        console.log('Query completed');
        // $('#edesignation').val(data.responseJSON.file_name);
        // $('#edesignation').val(data.responseJSON.file_id);
      },

    });
  }
}