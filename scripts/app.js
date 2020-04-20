$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
    $('.loader').show();

    loadData();

    // Search in Responsable list
    $('#search').keyup(function(e) {
        var keyWord = $(this).val().toLowerCase();
        $("tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(keyWord) > -1);
        });
    });
});

//load data from DB function
function loadData() {
    var row;
    $.ajax({
        type: "GET",
        url: './api/Admin.api.php',
        data: {
            mode: 'load',
        },
        dataType: 'json',
        success: function(data) {
            // row = JSON.stringify(data);
            row = data;
        }
    }).done(function() {
        for (let i = 0; i < row.length; i++) {
            let ligne = '<tr>';
            ligne += '<td>' + i + '</td>';
            ligne += '<td>' + row[i].cin + '</td>';
            ligne += '<td>' + row[i].Num_serie+ '</td>';
            ligne += '<td>' + row[i].nom + '</td>';
            ligne += '<td>' + row[i].prenom + '</td>';
            ligne += '<td>' + row[i].email +'</td>';
            ligne += '<td>' + row[i].sexe +'</td>';
            ligne += '<td><a href="#" onclick="editRespo(' + row[i].cin + ')" data-toggle="modal" data-target="#editResponsable" data-toggle="tooltip" data-placement="top" title="Modifier"><i class="fas fa-user-edit"></i></a>&nbsp;';
            ligne += '<a href="#" onclick="deleteRespo(' + row[i].cin + ')" data-toggle="tooltip" data-placement="top" title="Supprimer"><i class="fas fa-user-slash"></i></a></td>';
            ligne += '</tr>';
            $('#listRespo').append(ligne);
        }
    })

    $(document).ajaxComplete(function() {
        $('.loader').hide();
    })
}

//Add new Admin
$('#btValider').click(function() {
    let cin = $('#cin').val();
    let nom = $('#nom').val();
    let prenom = $('#prenom').val();
    let email = $('#email').val();
    let login = $('#login').val();
    let psw = $('#psw').val();
    let sexe = $('#sexe').val();
    $.ajax({
        type: "POST",
        url: './api/Admin.api.php',
        data: {
            mode: 'insert',
            cin: cin,
            nom: nom,
            prenom: prenom,
            email: email,
            login: login,
            psw: psw,
            sexe: sexe,
        },
        success: function() {
            swal('Nouveau Responsable', 'ajoutée avec succés', 'success')
                .then(() => {
                    location.reload();
                });
        }
    });

})

//Edit Responsable
function editRespo(id) {
    $('#idEdit').val(id);
    let row;
    $.ajax({
        type: "GET",
        url: "./api/Admin.api.php",
        data: {
            mode: 'loadOne',
            id: id,
        },
        dataType: 'json',
        success: function(response) {
            row = response;
        }
    }).done(function() {
        $('#numEdit').val(row.Num_serie);
        $('#cinEdit').val(row.cin);
        $('#nomEdit').val(row.nom);
        $('#prenomEdit').val(row.prenom);
        $('#emailEdit').val(row.email);
        $('#sexeEdit').val(row.sexe);
        $('#loginEdit').val(row.login);
        $('#pswEdit').val(row.psw);
    });
}

// Update Responsable
$('#btUpdateRespo').click(function() {
    let cin = $('#cinEdit').val();
    let nom = $('#nomEdit').val();
    let prenom = $('#prenomEdit').val();  
    let email = $('#emailEdit').val();
    let sexe = $('#sexeEdit').val();
    let login = $('#loginEdit').val();
    let psw = $('#pswEdit').val();
    $.ajax({
        type: "POST",
        url: './api/Admin.api.php',
        data: {
            mode: 'update',
            cin: cin,
            nom: nom,
            prenom: prenom,
            email: email,
            login: login,
            psw: psw,
            sexe: sexe,
        },
        success: function() {
            swal('Editer Responsable', 'Mise à jour effectuée avec succés', 'success')
                .then(() => {
                    location.reload();
                });
        }
    });

})

// Delete Responsable
function deleteRespo(id) {
    swal({
            title: "Etes-vous certain?",
            text: "Vous êtes sur le point de supprimer un Responsable !",
            icon: "warning",
            buttons: ["Annuler", "Confirmer"],
        })
        .then((willCancel) => {
            if (willCancel) {
                $.ajax({
                    type: "POST",
                    url: "./api/Admin.api.php",
                    data: {
                        mode: 'delete',
                        id: id,
                    },
                    success: function() {
                        swal('Supprimé !', 'Compte Responsable supprimé avec succées', 'success')
                            .then(() => {
                                location.reload();
                            });
                    },
                })
            } else {
                swal("Le compte Responsable n'a pas été supprimée");
            }
        });
}


$(".btn btn-danger btn-md float-right").click(function(){
swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Poof! Your imaginary file has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your imaginary file is safe!");
  }
});});
